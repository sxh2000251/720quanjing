<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<div class="bm bw0 mdcp">
<?php if($op == 'edit' || $op == 'ban') { ?>
<h1 class="mt"><?php if($op == 'edit') { ?>�༭�û�<?php } else { ?>��ֹ�û�<?php } ?></h1>
<form method="post" autocomplete="off" action="<?php echo $cpscript;?>?mod=modcp&action=<?php echo $_GET['action'];?>&op=<?php echo $op;?>">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>">
<div class="exfm">
<table cellspacing="0" cellpadding="0">
<caption>
<?php if(!empty($error)) { if($error == 1) { ?>
�����������û������� UID �����û���Ȼ�������һ�������� UID �������û����ٶȸ�����׼ȷ
<?php } elseif($error == 2) { ?>
���û������ڻ򱻶��ᣬ����������
<?php } elseif($error == 3) { ?>
���������Ȩ�������û�
<?php if($_G['adminid'] == 1) { ?>
, <a href="admin.php?action=members&amp;operation=search&amp;username=<?php echo $usernameenc;?>&amp;submit=yes&amp;frames=yes" target="_blank" class="xi2"><u>���������������̨��������</u></a>
<?php } } } ?>
</caption>
<tr>
<th width="15%">�û���:</th>
<td width="85%"><input type="text" name="username" class="px" value="" size="20" /></td>
</tr>
<tr>
<th>UID:</th>
<td><input type="text" name="uid" class="px" value="" size="20" /> [��ѡ]</td>
</tr>
<tr>
<td>&nbsp;</td>
<td><button type="submit" name="submit" id="searchsubmit" class="pn" value="true"><strong>����</strong></button></td>
</tr>
</table>
</div>
</form>
<?php } if($op == 'edit' && $member && !$error) { ?>
<form method="post" autocomplete="off" action="<?php echo $cpscript;?>?mod=modcp&action=<?php echo $_GET['action'];?>&op=<?php echo $op;?>" class="schresult">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>">
<input type="hidden" name="username" value="<?php echo $_GET['username'];?>">
<input type="hidden" name="uid" value="<?php echo $_GET['uid'];?>">
<table cellspacing="0" cellpadding="0" class="tfm">
<tr>
<th>&nbsp;</th>
<td>
<table width="100%">
<tr>
<td width="10%" rowspan="2" class="avt"><?php echo avatar($member['uid'], 'small');; ?></td>
<td>
<p><a href="home.php?mod=space&amp;uid=<?php echo $member['uid'];?>" target="_blank" class="xi2"><?php echo $member['username'];?></a></p>
<p>UID: <?php echo $member['uid'];?></p>
<p><label><input type="checkbox" name="clearavatar" class="pc" value="1" />ɾ��ͷ��</label></p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<th>���ҽ���</th>
<td><textarea name="bionew" class="pt" rows="4" cols="80"><?php echo $member['bio'];?></textarea></td>
</tr>
<tr>
<th>����ǩ��</th>
<td><textarea name="signaturenew" class="pt" rows="4" cols="80"><?php echo $member['signature'];?></textarea></td>
</tr>
<tr>
<th>&nbsp;</th>
<td><button type="submit" name="editsubmit" id="submit" class="pn" value="true"><strong>�ύ</strong></button></td>
</tr>
</table>
</form>
<?php } if($op == 'ban' && $member && !$error) { ?>
<form method="post" autocomplete="off" action="<?php echo $cpscript;?>?mod=modcp&action=<?php echo $_GET['action'];?>&op=<?php echo $op;?>" class="schresult">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>">
<input type="hidden" name="username" value="<?php echo $_GET['username'];?>">
<input type="hidden" name="uid" value="<?php echo $_GET['uid'];?>">
<table cellspacing="0" cellpadding="0" class="tfm">
<tr>
<th>&nbsp;</th>
<td>
<table width="100%">
<tr>
<td width="10%" rowspan="2" class="avt"><?php echo avatar($member['uid'], 'small');; ?></td>
<td>
<p><a href="home.php?mod=space&amp;uid=<?php echo $member['uid'];?>" target="_blank" class="xi2"><?php echo $member['username'];?></a></p>
<p>UID: <?php echo $member['uid'];?></p>
<p><?php if($member['groupid'] == 4) { ?>��ֹ����<?php } elseif($member['groupid'] == 5) { ?>��ֹ����<?php } else { ?>����״̬<?php } ?> <?php if($member['banexpiry']) { ?>( ��Ч���� <?php echo $member['banexpiry'];?> )<?php } ?></p>
</td>
</tr>
</table>
</td>
</tr>
<?php if($clist) { ?>
<tr>
<th>Υ���¼</th>
<td style="padding-top: 0;">
<table cellspacing="0" cellpadding="0" class="dt">
<tr>
<td width="15%">������Ϊ</td>
<td width="15%">����ʱ��</td>
<td>��������</td>
<td width="15%">������</td>
</tr><?php if(is_array($clist)) foreach($clist as $crime) { ?><tbody id="<?php echo $crime['cid'];?>">
<tr>
<td>
<?php if($crime['action'] == 'crime_delpost') { ?>
ɾ������
<?php } elseif($crime['action'] == 'crime_warnpost') { ?>
��������
<?php } elseif($crime['action'] == 'crime_banpost') { ?>
��������
<?php } elseif($crime['action'] == 'crime_banspeak') { ?>
��ֹ����
<?php } elseif($crime['action'] == 'crime_banvisit') { ?>
��ֹ����
<?php } elseif($crime['action'] == 'crime_banstatus') { ?>
�����û�
<?php } elseif($crime['action'] == 'crime_avatar') { ?>
���ͷ��
<?php } elseif($crime['action'] == 'crime_sightml') { ?>
���ǩ��
<?php } elseif($crime['action'] == 'crime_customstatus') { ?>
����Զ���ͷ��
<?php } ?>
</td>
<td><?php echo dgmdate($crime[dateline]);?></td>
<td><?php echo $crime['reason'];?></td>
<td>
<a href="home.php?mod=space&amp;uid=<?php echo $crime['operatorid'];?>" class="xi2"><?php echo $crime['operator'];?></a>
</td>
</tr>
</tbody>
<?php } ?>
</table>
</td>
</tr>
<?php } ?>
<tr>
<th>���Ϊ:</th>
<td>
<?php if($member['groupid'] == 4 || $member['groupid'] == 5) { ?>
<label for="bannew_0" class="lb"><input type="radio" name="bannew" id="bannew_0" value="0" checked="checked" class="pr" />����״̬</label>
<?php } if($member['groupid'] != 4 && $_G['group']['allowbanuser']) { ?><label for="bannew_4" class="lb"><input type="radio" name="bannew" id="bannew_4" class="pr" value="4" <?php if($member['groupid'] != 4 && $member['groupid'] != 5) { ?>checked="checked"<?php } ?> />��ֹ����</label><?php } if($member['groupid'] != 5 && $_G['group']['allowbanvisituser']) { ?><label for="bannew_5" class="lb"><input type="radio" name="bannew" id="bannew_5" class="pr" value="5" <?php if($member['groupid'] != 4 && $member['groupid'] != 5 && !$_G['group']['allowbanuser']) { ?>checked="checked"<?php } ?> />��ֹ����</label><?php } ?>
</td>
</tr>
<tr>
<th>����:</th>
<td>
<p class="hasd cl">
<script src="<?php echo $_G['setting']['jspath'];?>calendar.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<input type="text" id="banexpirynew" name="banexpirynew" autocomplete="off" value="" class="px" tabindex="1" style="margin-right: 0; width: 100px;" />
<a href="javascript:;" class="dpbtn" onclick="showselect(this, 'banexpirynew', 1, 1)">^</a>
</p>
<p class="d">�������ý��Խ�ֹ���Ժͽ�ֹ���ʵĲ�����Ч</p>
</td>
</tr>
<tr>
<th valign="top">����:</th>
<td><textarea name="reason" class="pt" rows="4" cols="80"><?php echo $member['signature'];?></textarea></td>
</tr>
<tr>
<th>&nbsp;</th>
<td><button type="submit" name="bansubmit" id="submit" class="pn" value="true"><strong>�ύ</strong></button></td>
</tr>
</table>
</form>
<?php } if($op == 'ipban') { ?>
<h1 class="mt">��ֹ IP</h1>
<form method="post" autocomplete="off" action="<?php echo $cpscript;?>?mod=modcp&action=<?php echo $_GET['action'];?>&op=<?php echo $op;?>">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>">
<div class="exfm">
<table cellspacing="0" cellpadding="0">
<tr>
<th width="15%">����:</th>
<td width="85%">
<input type="text" name="ip1new" class="px" value="<?php echo $iptoban['0'];?>" size="2" maxlength="3"/> .
<input type="text" name="ip2new" class="px" value="<?php echo $iptoban['1'];?>" size="2" maxlength="3" /> .
<input type="text" name="ip3new" class="px" value="<?php echo $iptoban['2'];?>" size="2" maxlength="3" /> .
<input type="text" name="ip4new" class="px" value="<?php echo $iptoban['3'];?>" size="2" maxlength="3" />
&nbsp;&nbsp;* ��ʾ���� IP �Σ��� 192.168.*.* ��ʾ��ֹ������ 192.168 ��ͷ�� IP
</td>
</tr>
<tr>
<th width="15%">����:</th>
<td width="85%" class="hasd cl">
<script src="<?php echo $_G['setting']['jspath'];?>calendar.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<input type="text" id="validitynew" name="validitynew" autocomplete="off" value="" class="px" tabindex="1" style="width: 100px;" />
<a href="javascript:;" class="dpbtn" onclick="showselect(this, 'validitynew', 0, 1)">^</a>
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>
<button type="submit" name="ipbansubmit" id="submit" class="pn" value="true"><strong>�ύ</strong></button>
<?php if($adderror) { if($adderror == 1) { ?>
�������׼ IP ��ַ
<?php } elseif($adderror == 2) { ?>
���� IP ��ַʧ�ܣ��� IP ��ַ��Χ������Ŀǰ�� IP
<?php } elseif($adderror == 3) { ?>
���� IP ��ַʧ�ܣ��� IP ��ַ�Ѿ��ڽ�ֹ��Χ��
<?php } elseif($updatecheck || $deletecheck || $addcheck) { ?>
IP ��ַ���³ɹ������������
<?php } else { ?>
��ֻ�ܱ༭��ɾ���Լ���ӵ� IP ��ַ
<?php } } ?>
</td>
</tr>
</table>
</div>

<h2 class="mtm mbm">�ѽ�ֹ�� IP �б�</h2>
<table cellspacing="0" cellpadding="0" class="dt">
<thead>
<tr>
<th class="c">ɾ��</th>
<th>IP ��ַ</th>
<th>����λ��</th>
<th>������</th>
<th>��ʼʱ��</th>
<th>����ʱ��</th>
</tr>
</thead>
<?php if($iplist) { if(is_array($iplist)) foreach($iplist as $ip) { ?><tr>
<td><input type="checkbox" name="delete[]" class="pc" value="<?php echo $ip['id'];?>" <?php echo $ip['disabled'];?>></td>
<td><?php echo $ip['theip'];?></td>
<td><?php echo $ip['location'];?></td>
<td><?php echo $ip['admin'];?></td>
<td><?php echo $ip['dateline'];?></td>
<td class="hasd cl">
<input type="text" id="expirationnew[<?php echo $ip['id'];?>]" name="expirationnew[<?php echo $ip['id'];?>]" autocomplete="off" value="<?php echo $ip['expiration'];?>" class="px" tabindex="1"/>
<a href="javascript:;" class="dpbtn" onclick="showselect(this, 'expirationnew[<?php echo $ip['id'];?>]', 0, 1)">^</a>
</td>
</tr>
<?php } ?>
<tr class="bw0_all">
<td><label for="chkall" onclick="checkall(this.form)"><input type="checkbox" name="chkall" id="chkall" class="pc" />ȫѡ</label></td>
<td colspan="5"><button type="submit" name="ipbansubmit" id="submit" class="pn" value="true"><strong>�ύ</strong></button></td>
</tr>
<?php } else { ?>
<tr><td colspan="6"><p class="emp">��ǰû���ѽ�ֹ�� IP</p></td></tr>
<?php } ?>
</table>
</form>
<?php } ?>
</div>