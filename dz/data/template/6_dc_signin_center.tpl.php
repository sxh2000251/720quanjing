<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('center');?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z"> 
<a href="./" class="nvhm" title="��ҳ"><?php echo $_G['setting']['bbname'];?></a><em>&rsaquo;</em><a href="plugin.php?id=dc_signin">ÿ��ǩ��</a>
</div>
</div>

<div id="dcsignin" class="wp cl">
<div class="mn">
<ul class="tb cl"><?php if(is_array($signindh)) foreach($signindh as $sk => $sdh) { ?><li<?php if($sk==$action) { ?> class="a"<?php } ?>><a href="plugin.php?id=dc_signin&amp;action=<?php echo $sk;?>"><?php echo $sdh;?></a></li>
<?php } ?>
</ul><?php include template('dc_signin:'.$action)?></div>
<div class="sd">
<div class="login-info bm">
<div class="user-info"><img class="avatar" src="<?php echo $_G['setting']['ucenterurl'];?>/avatar.php?uid=<?php echo $_G['uid'];?>&size=middle"><p>�ۼ���ǩ����<?php echo $mysignin['days']?$mysignin['days']:0; ?>��</p><p class="m">������ǩ����<?php echo $mysignin['monthdays']?$mysignin['monthdays']:0; ?>��</p><p class="m">�ѻ��<?php echo $_G['setting']['extcredits'][$_G['cache']['plugin']['dc_signin']['extcredit']]['title'];?>��<?php echo $mysignin['credit']?$mysignin['credit']:0; ?>��</p></div>
</div>
<div class="bm bw0">
<div class="sign_div">
<div class="date-week">
<div class="date"><?php echo date(m); ?>.<?php echo date(d); ?></div>
<div class="week"><?php echo $_lang['weekarray'][date(w)]; ?></div>
</div>
<div title="���Ѿ�����ǩ��<?php echo $mysignin['condays']?$mysignin['condays']:0; ?>��" class="sign-num"><?php echo $mysignin['condays']?$mysignin['condays']:0; ?></div>
<?php if($mysignin['dateline']<$todaystime) { ?><a href="plugin.php?id=dc_signin:sign" onclick="showWindow('sign', this.href)">ǩ��</a><?php } else { ?><a href="javascript:;">��ǩ��</a><?php } ?>
</div>
</div>
<div class="bm">
<div class="bm_h cl">
<h2>ǩ��ͳ��</h2>
</div>
<div class="bm_c">
<ul class="xl">
<li><span class="y xi2 xg1"><?php echo $signinstats['todaycount'];?> ��</span>������ǩ��</li>
<li><span class="y xi2 xg1"><?php echo $signinstats['yestercount'];?> ��</span>���չ�ǩ��</li>
<li><span class="y xi2 xg1"><?php echo $signinstats['historymaxcount'];?> ��</span>��ʷ�����</li>
</ul>
</div>
</div>
<?php if($rmcopy['isrmcopy']&&empty($rmcopy['copytext'])) { } else { ?>
<div class="bm">
<div class="bm_h cl">
<h2>��Ȩ��Ϣ</h2>
</div>
<div class="bm_c">
<ul class="xl">
<li><?php if($rmcopy['copytext']) { ?><?php echo $rmcopy['copytext'];?><?php } else { ?><a href="http://addon.discuz.com/?@dc_signin.plugin" title="��Ȩ��Ϣ" target="_blank"><span style="font: bold 14px Arial; color: #fbb040;">��DC��</span><span style="font: bold 15px Verdana; color: #f15a29;">ÿ��ǩ��</span></a>&nbsp;<?php echo $version;?><span style="display:block;"><a href="http://addon.discuz.com/?@19418.developer">&copy;������</a>.</span><?php } ?></li>
</ul>
</div>
</div>
<?php } ?>
</div>
</div><?php include template('common/footer'); ?>