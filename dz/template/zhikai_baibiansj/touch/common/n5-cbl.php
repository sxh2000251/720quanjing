<?php echo 'NVbing5��ҵģ�屣������������ģ������ϵNVbing5�ͷ�QQ��2474414433';exit;?>

<section class="sidebar">
<div class="n5-cbl">
    <div class="n5-cbltx">
        <a href="<!--{if $_G[uid]}-->home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1<!--{else}-->member.php?mod=logging&action=login<!--{/if}-->" class="n5-tx"><!--{avatar($_G[uid])}--></a>
		<a href="<!--{if $_G[uid]}-->home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1<!--{else}-->member.php?mod=logging&action=login<!--{/if}-->" class="n5-hym"><!--{if empty($_G['uid'])}-->�ο�<!--{/if}--><!--{if $_G['uid']}-->$_G['username']<!--{/if}-->��<script language="JavaScript">
                        var mess1="";
                        day = new Date( )
                        hr = day.getHours( )
                        if (( hr >= 0 ) && (hr <= 4 ))
                        mess1="ҹ��ã�"
                        if (( hr >= 4 ) && (hr < 7))
                        mess1="���Ϻã�"
                        if (( hr >= 7 ) && (hr < 12))
                        mess1="����ã�"
                        if (( hr >= 12) && (hr <= 13))
                        mess1="����ã�"
                        if (( hr >= 13) && (hr <= 18))
                        mess1="����ã�"
                        if (( hr >= 18) && (hr <= 19))
                        mess1="����ã�"
                        if ((hr >= 19) && (hr <= 23))
                        mess1="���Ϻã�"
                        document.write(mess1)
                        </script></a>
	</div>
	<div class="n5-cblxm">
	    <li class="shouye"><a href="forum.php?mod=guide">ȫվ��ҳ</a></li>
		<li class="luntan"><a href="forum.php?forumlist=1">��̳����</a></li>
		<li class="geren"><a href="<!--{if $_G[uid]}-->home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1<!--{else}-->member.php?mod=logging&action=login<!--{/if}-->">��������</a></li>
		<li class="sousuo"><a href="search.php?mod=forum">����һ��</a></li>
		<li class="shoucang"><a href="home.php?mod=space&uid={$_G[uid]}&do=favorite&view=me&type=thread">�ҵ��ղ�</a></li>
		<li class="zhuti"><a href="home.php?mod=space&uid={$_G[uid]}&do=thread&view=me">�ҵ�����</a></li>
		<li class="xiaoxi"><a href="home.php?mod=space&do=pm">�ҵ���Ϣ</a></li>
		<li class="ziliao"><a href="home.php?mod=space&uid={$_G[uid]}">�ҵ�����</a></li>
	</div>
	
</div>				
</section>

<script>
var jq = jQuery.noConflict(); 
jq( document ).ready(function() {
	jq.ajaxSetup({
		cache: false
	});
	jq( '.sidebar' ).simpleSidebar({
		settings: {
			opener: '#open-sb',
			wrapper: '.wrapper',
			animation: {
				duration: 500,
				easing: 'easeOutQuint'
			}
		},
		sidebar: {
			align: 'left',
			width: 250,
			closingLinks: 'a',
		}
	});
});
</script>
