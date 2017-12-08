e6.fn.simpleTree = function(opt){
	return this.each(function(){
		var TREE = this;
		var ROOT = e6('.root',this);
		var mousePressed = false;
		var mouseMoved = false;
		var dragMoveType = false;
		var dragNode_destination = false;
		var dragNode_source = false;
		var dragDropTimer = false;
		var ajaxCache = Array();
		TREE.option = {
			drag:		true,
			animate:	false,
			autoclose:	false,
			speed:		'fast',
			afterAjax:	false,
			afterMove:	false,
			afterClick:	false,
			afterDblClick:	false,
			afterContextMenu:	false,
			docToFolderConvert:false
		};
		TREE.option = e6.extend(TREE.option,opt);
		e6.extend(this, {getSelected: function(){
			return e6('span.active', this).parent();
		}});
		TREE.closeNearby = function(obj){
			e6(obj).siblings().filter('.folder-open, .folder-open-last').each(function(){
				var childUl = e6('>ul',this);
				var className = this.className;
				this.className = className.replace('open','close');
				if(TREE.option.animate){
					childUl.animate({height:"toggle"},TREE.option.speed);
				}else{
					childUl.hide();
				}
			});
		};
		TREE.nodeToggle = function(obj){
			var childUl = e6('>ul',obj);
			if(childUl.is(':visible')){
				obj.className = obj.className.replace('open','close');
				if(TREE.option.animate){
					childUl.animate({height:"toggle"},TREE.option.speed);
				}else{
					childUl.hide();
				}
			}else{
				obj.className = obj.className.replace('close','open');
				if(TREE.option.animate){
					childUl.animate({height:"toggle"},TREE.option.speed, function(){
						if(TREE.option.autoclose)TREE.closeNearby(obj);
						if(childUl.is('.ajax'))TREE.setAjaxNodes(childUl, obj.id);
					});
				}else{
					childUl.show();
					if(TREE.option.autoclose)TREE.closeNearby(obj);
					if(childUl.is('.ajax'))TREE.setAjaxNodes(childUl, obj.id);
				}
			}
		};
		TREE.setAjaxNodes = function(node, parentId, callback){
			if(e6.inArray(parentId,ajaxCache) == -1){
				ajaxCache[ajaxCache.length]=parentId;
				var url = e6.trim(e6('>li', node).text());
				if(url && url.indexOf('url:')){
					url=e6.trim(url.replace(/.*\{url:(.*)\}/i ,'$1'));
					e6.ajax({
						type: "GET",
						url: url,
						contentType:'html',
						cache:false,
						success: function(responce){
							node.removeAttr('class');
							node.html(responce);
							e6.extend(node,{url:url});
							TREE.setTreeNodes(node, true);
							if(typeof TREE.option.afterAjax == 'function'){
								TREE.option.afterAjax(node);
							}
							if(typeof callback == 'function'){
								callback(node);
							}
						}
					});
				}
			}
		};
		TREE.setTreeNodes = function(obj, useParent){
			obj = useParent? obj.parent():obj;
			e6('li>span', obj).addClass('text')
			.bind('selectstart', function() {
				return false;
			}).click(function(){
				e6('.active',TREE).attr('class','text');
				if(this.className=='text'){
					this.className='active';
				}
				if(typeof TREE.option.afterClick == 'function'){
					TREE.option.afterClick(e6(this).parent());
				}
				return false;
			}).dblclick(function(){
				mousePressed = false;
				TREE.nodeToggle(e6(this).parent().get(0));
				if(typeof TREE.option.afterDblClick == 'function'){
					TREE.option.afterDblClick(e6(this).parent());
				}
				return false;
			}).bind("contextmenu",function(){
				e6('.active',TREE).attr('class','text');
				if(this.className=='text'){
					this.className='active';
				}
				if(typeof TREE.option.afterContextMenu == 'function'){
					TREE.option.afterContextMenu(e6(this).parent());
				}
				return false;
			}).mousedown(function(event){
				mousePressed = true;
				cloneNode = e6(this).parent().clone();
				var LI = e6(this).parent();
				if(TREE.option.drag){
					e6('>ul', cloneNode).hide();
					e6('body').append('<div id="drag_container"><ul></ul></div>');
					e6('#drag_container').hide().css({opacity:'0.8'});
					e6('#drag_container >ul').append(cloneNode);
					e6("<img>").attr({id	: "tree_plus",src	: "source/plugin/e6_propaganda/image/plus.gif"}).css({width: "7px",display: "block",position: "absolute",left	: "5px",top: "5px", display:'none'}).appendTo("body");
					e6(document).bind("mousemove", {LI:LI}, TREE.dragStart).bind("mouseup",TREE.dragEnd);
				}
				return false;
			}).mouseup(function(){
				if(mousePressed && mouseMoved && dragNode_source){
					TREE.moveNodeToFolder(e6(this).parent());
				}
				TREE.eventDestroy();
			});
			e6('li', obj).each(function(i){
				var className = this.className;
				var open = false;
				var cloneNode=false;
				var LI = this;
				var childNode = e6('>ul',this);
				if(childNode.size()>0){
					var setClassName = 'folder-';
					if(className && className.indexOf('open')>=0){
						setClassName=setClassName+'open';
						open=true;
					}else{
						setClassName=setClassName+'close';
					}
					this.className = setClassName + (e6(this).is(':last-child')? '-last':'');
					if(!open || className.indexOf('ajax')>=0)childNode.hide();
					TREE.setTrigger(this);
				}else{
					var setClassName = 'doc';
					this.className = setClassName + (e6(this).is(':last-child')? '-last':'');
				}
			}).before('<li class="line">&nbsp;</li>')
			.filter(':last-child').after('<li class="line-last"></li>');
			TREE.setEventLine(e6('.line, .line-last', obj));
		};
		TREE.setTrigger = function(node){
			e6('>span',node).before('<img class="trigger" src="source/plugin/e6_propaganda/image/spacer.gif" border=0>');
			var trigger = e6('>.trigger', node);
			trigger.click(function(event){
				TREE.nodeToggle(node);
			});
			if(!e6.browser.msie){
				trigger.css('float','left');
			}
		};
		TREE.dragStart = function(event){
			var LI = e6(event.data.LI);
			if(mousePressed){
				mouseMoved = true;
				if(dragDropTimer) clearTimeout(dragDropTimer);
				if(e6('#drag_container:not(:visible)')){
					e6('#drag_container').show();
					LI.prev('.line').hide();
					dragNode_source = LI;
				}
				e6('#drag_container').css({position:'absolute', "left" : (event.pageX + 5), "top": (event.pageY + 15) });
				if(LI.is(':visible'))LI.hide();
				var temp_move = false;
				if(event.target.tagName.toLowerCase()=='span' && e6.inArray(event.target.className, Array('text','active','trigger'))!= -1){
					var parent = event.target.parentNode;
					var offs = e6(parent).offset({scroll:false});
					var screenScroll = {x : (offs.left - 3),y : event.pageY - offs.top};
					var isrc = e6("#tree_plus").attr('src');
					var ajaxChildSize = e6('>ul.ajax',parent).size();
					var ajaxChild = e6('>ul.ajax',parent);
					screenScroll.x += 19;
					screenScroll.y = event.pageY - screenScroll.y + 5;
					if(parent.className.indexOf('folder-close')>=0 && ajaxChildSize==0){
						if(isrc.indexOf('minus')!=-1)e6("#tree_plus").attr('src','source/plugin/e6_propaganda/image/plus.gif');
						e6("#tree_plus").css({"left": screenScroll.x, "top": screenScroll.y}).show();
						dragDropTimer = setTimeout(function(){
							parent.className = parent.className.replace('close','open');
							e6('>ul',parent).show();
						}, 700);
					}else if(parent.className.indexOf('folder')>=0 && ajaxChildSize==0){
						if(isrc.indexOf('minus')!=-1)e6("#tree_plus").attr('src','source/plugin/e6_propaganda/image/plus.gif');
						e6("#tree_plus").css({"left": screenScroll.x, "top": screenScroll.y}).show();
					}else if(parent.className.indexOf('folder-close')>=0 && ajaxChildSize>0){
						mouseMoved = false;
						e6("#tree_plus").attr('src','source/plugin/e6_propaganda/image/minus.gif');
						e6("#tree_plus").css({"left": screenScroll.x, "top": screenScroll.y}).show();
						e6('>ul',parent).show();
						TREE.setAjaxNodes(ajaxChild,parent.id, function(){
							parent.className = parent.className.replace('close','open');
							mouseMoved = true;
							e6("#tree_plus").attr('src','source/plugin/e6_propaganda/image/plus.gif');
							e6("#tree_plus").css({"left": screenScroll.x, "top": screenScroll.y}).show();
						});

					}else{
						if(TREE.option.docToFolderConvert){
							e6("#tree_plus").css({"left": screenScroll.x, "top": screenScroll.y}).show();
						}else{
							e6("#tree_plus").hide();
						}
					}
				}else{
					e6("#tree_plus").hide();
				}
				return false;
			}
			return true;
		};
		TREE.dragEnd = function(){
			if(dragDropTimer) clearTimeout(dragDropTimer);
			TREE.eventDestroy();
		};
		TREE.setEventLine = function(obj){
			obj.mouseover(function(){
				if(this.className.indexOf('over')<0 && mousePressed && mouseMoved){
					this.className = this.className.replace('line','line-over');
				}
			}).mouseout(function(){
				if(this.className.indexOf('over')>=0){
					this.className = this.className.replace('-over','');
				}
			}).mouseup(function(){
				if(mousePressed && dragNode_source && mouseMoved){
					dragNode_destination = e6(this).parents('li:first');
					TREE.moveNodeToLine(this);
					TREE.eventDestroy();
				}
			});
		};
		TREE.checkNodeIsLast = function(node){
			if(node.className.indexOf('last')>=0){
				var prev_source = dragNode_source.prev().prev();
				if(prev_source.size()>0){
					prev_source[0].className+='-last';
				}
				node.className = node.className.replace('-last','');
			}
		};
		TREE.checkLineIsLast = function(line){
			if(line.className.indexOf('last')>=0){
				var prev = e6(line).prev();
				if(prev.size()>0){
					prev[0].className = prev[0].className.replace('-last','');
				}
				dragNode_source[0].className+='-last';
			}
		};
		TREE.eventDestroy = function(){
			e6(document).unbind('mousemove',TREE.dragStart).unbind('mouseup').unbind('mousedown');
			e6('#drag_container, #tree_plus').remove();
			if(dragNode_source){
				e6(dragNode_source).show().prev('.line').show();
			}
			dragNode_destination = dragNode_source = mousePressed = mouseMoved = false;

		};
		TREE.convertToFolder = function(node){
			node[0].className = node[0].className.replace('doc','folder-open');
			node.append('<ul><li class="line-last"></li></ul>');
			TREE.setTrigger(node[0]);
			TREE.setEventLine(e6('.line, .line-last', node));
		};
		TREE.convertToDoc = function(node){
			e6('>ul', node).remove();
			e6('img', node).remove();
			node[0].className = node[0].className.replace(/folder-(open|close)/gi , 'doc');
		};
		TREE.moveNodeToFolder = function(node){
			if(!TREE.option.docToFolderConvert && node[0].className.indexOf('doc')!=-1){
				return true;
			}else if(TREE.option.docToFolderConvert && node[0].className.indexOf('doc')!=-1){
				TREE.convertToFolder(node);
			}
			TREE.checkNodeIsLast(dragNode_source[0]);
			var lastLine = e6('>ul >.line-last', node);
			if(lastLine.size()>0){
				TREE.moveNodeToLine(lastLine[0]);
			}
		};
		TREE.moveNodeToLine = function(node){
			TREE.checkNodeIsLast(dragNode_source[0]);
			TREE.checkLineIsLast(node);
			var parent = e6(dragNode_source).parents('li:first');
			var line = e6(dragNode_source).prev('.line');
			e6(node).before(dragNode_source);
			e6(dragNode_source).before(line);
			node.className = node.className.replace('-over','');
			var nodeSize = e6('>ul >li', parent).not('.line, .line-last').filter(':visible').size();
			if(TREE.option.docToFolderConvert && nodeSize==0){
				TREE.convertToDoc(parent);
			}else if(nodeSize==0){
				parent[0].className=parent[0].className.replace('open','close');
				e6('>ul',parent).hide();
			}
			if(e6('span:first',dragNode_source).attr('class')=='text'){
				e6('.active',TREE).attr('class','text');
				e6('span:first',dragNode_source).attr('class','active');
			}
			if(typeof(TREE.option.afterMove) == 'function'){
				var pos = e6(dragNode_source).prevAll(':not(.line)').size();
				TREE.option.afterMove(e6(node).parents('li:first'), e6(dragNode_source), pos);
			}
		};
		TREE.addNode = function(id, text, callback){
			var temp_node = e6('<li><ul><li id="'+id+'"><span>'+text+'</span></li></ul></li>');
			TREE.setTreeNodes(temp_node);
			dragNode_destination = TREE.getSelected();
			dragNode_source = e6('.doc-last',temp_node);
			TREE.moveNodeToFolder(dragNode_destination);
			temp_node.remove();
			if(typeof(callback) == 'function'){
				callback(dragNode_destination, dragNode_source);
			}
		};
		TREE.delNode = function(callback){
			dragNode_source = TREE.getSelected();
			TREE.checkNodeIsLast(dragNode_source[0]);
			dragNode_source.prev().remove();
			dragNode_source.remove();
			if(typeof(callback) == 'function'){
				callback(dragNode_destination);
			}
		};
		TREE.init = function(obj){
			TREE.setTreeNodes(obj, false);
		};
		TREE.init(ROOT);
	});
}

e6(function(){
	simpleTreeCollection = e6('.simpleTree').simpleTree({
		autoclose: true,
		afterClick:function(node){
		},
		afterDblClick:function(node){
		},
		afterMove:function(destination, source, pos){
		},
		afterAjax:function(){
		},
		animate:true
	});
});