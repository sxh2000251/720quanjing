<?php /* Smarty version Smarty-3.1.7, created on 2017-11-12 08:34:17
         compiled from "C:/PHPWAMP_IN1/wwwroot/720quanjing/template\zz_theme\library\footer.lbi" */ ?>
<?php /*%%SmartyHeaderCode:110265a079709a27b62-32276862%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c202d994a4c6b856062df73d9149e93bb99f0489' => 
    array (
      0 => 'C:/PHPWAMP_IN1/wwwroot/720quanjing/template\\zz_theme\\library\\footer.lbi',
      1 => 1477898701,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '110265a079709a27b62-32276862',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_lang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a079709a5311',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a079709a5311')) {function content_5a079709a5311($_smarty_tpl) {?><style type="text/css">
.footer {
        height: 75px;
        font-size: 12px;
        clear: both;
        display: none
}
.footer ul {
	height: 75px;
	line-height: 75px;
}
.footer-logo {
	height: 75px;
	line-height: 75px;
}

.cooperative p{
	margin: 0;
}
.cooperative p:nth-child(1) {
	font-size: 12px;
}
.cooperative p:nth-child(2) {
	font-size: 9px;
}

.ab{
	position: absolute;
	bottom: 0;
}
@media (max-width:470px) {
.footer{ position: relative;height: 94px;}
.footer ul { margin-left: 5px;width: 200px;}
.footer ul li a { padding: 5px 2px;}
.footer-logo>a>img{ vertical-align: 14px;}
.footer-nav>li{ line-height: 50px;}
.cooperative>p>a>img{ width: 61px}
.cooperative{ width:100%;position: absolute;top: 8px;right: 7px;}
.hz{ text-align: center;}
.bq{ text-align: center;}

}
</style>
<footer class="footer">
 <div class="footer-warper">
  <div class="footer-logo"><a href="#"><img src="/static/images/logo.png"></a></div>
  <ul class="footer-nav">
   <li><a href="#" target="_blank">关于我们</a><a href="#" target="_blank">用户协议</a><a href="#" target="_blank">友情链接</a></li>
  </ul>
  <div class="cooperative" style="float:right">
   <p class="qq"><a target="blank" href="http://wpa.qq.com/msgrd?V=3&uin=<?php echo $_smarty_tpl->tpl_vars['_lang']->value['qq'];?>
&Site=<?php echo $_smarty_tpl->tpl_vars['_lang']->value['title'];?>
&Menu=yes"><img src="/static/images/qq_online.png" style="cursor:pointer;"></a></p>
   <div class="clearfix" style="height:5px"></div>
   <p class="hz">合作电话：<?php echo $_smarty_tpl->tpl_vars['_lang']->value['tel'];?>
 </p><p class="bq">Copyright&copy;2016 <?php echo $_smarty_tpl->tpl_vars['_lang']->value['title'];?>
 All Rights Reserved   <a style="color: #bfbfbf;text-decoration: underline;" href="#" target="_blank"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['icp'];?>
</a></p>
   </div>
  </div>
</footer>
<script language="JavaScript" type="text/javascript" src="/static/js/jquery.form.js"></script>
<script language="JavaScript" type="text/javascript" src="/static/js/bootbox.js"></script> 
<script language="JavaScript" type="text/javascript" src="/static/js/pager.js"></script> 
<script language="JavaScript" type="text/javascript" src="/static/js/common.js"></script>
<script language="JavaScript" type="text/javascript" src="/static/js/zui.js"></script>
<script>
	var f_resize_time;
	window.onload = function (){ 
		f_resize_time = setTimeout(resizeFooter,1000);
		// $(window).bind("resize",function(){
		// 	$("footer").hide();
		// 	if(f_resize_time) clearTimeout(f_resize_time);
		// 	f_resize_time = setTimeout(resizeFooter,100);
		// })
		$(document).bind("resize",function(){
			$("footer").hide();
			if(f_resize_time) clearTimeout(f_resize_time);
			f_resize_time = setTimeout(resizeFooter,100);
		})
	} 
	function resizeFooter(){
		if ($(window).height()>$(document.body).height()) {
			$("footer").addClass("ab").show();
		}else{
			$("footer").removeClass("ab").show();
		}
	}
</script>
</body>
</html><?php }} ?>