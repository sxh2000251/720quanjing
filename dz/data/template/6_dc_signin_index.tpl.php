<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<style>
.mytips{margin-left:10px;}
.mytips b{color:#FF0000}
</style>
<div class="mtm pbm bbs">
<div class="mytips">
<?php if(!$mysignin) { ?>
<font style="color:#FF0000;font-weight: 700;">����δǩ�������Ͽ�ǩ����!</font>
<?php } else { if($mysignin['dateline']<$todaystime) { ?><h1 class="mt">�����컹δǩ��~~</h1><?php } ?>
<p>�𾴵�<b><?php echo $_G['username'];?></b> �����ۼ���ǩ��:  <b><?php echo $mysignin['days'];?></b> �� ������ǩ��:  <b><?php echo $mysignin['condays'];?></b> ��</p>
<p>���������ۼ�ǩ��:  <b><?php echo $mysignin['monthdays'];?></b> �� ����������ǩ��:  <b><?php echo $mysignin['monthcondays'];?></b> ��</p>
<p>���ϴ�ǩ��ʱ��: <b><?php echo dgmdate($mysignin['dateline']); ?></b></p>
<p>��Ŀǰ��õ��ܽ���Ϊ: <?php echo $_G['setting']['extcredits'][$_G['cache']['plugin']['dc_signin']['extcredit']]['title'];?> <b><?php echo $mysignin['credit'];?></b> ���ϴλ�õĽ���Ϊ: <?php echo $_G['setting']['extcredits'][$_G['cache']['plugin']['dc_signin']['extcredit']]['title'];?> <b><?php echo $mysignin['bcredit'];?></b> .</p>
<p>��Ŀǰ�ĵȼ�:  <b><?php echo $qdgroup[$mysignin['sgid']]['grouptitle'];?></b> ����ֻ����ǩ�� <b><?php echo $upgrade['dayslower']-$mysignin['days']; ?></b> ��Ϳ�����������һ���ȼ�:  <b><?php echo $upgrade['grouptitle'];?></b> .</p>
<?php } ?>
</div>
</div> 
<div class="mtm" style="margin-left:10px;"><?php echo $_G['cache']['plugin']['dc_signin']['notice'];?></div>