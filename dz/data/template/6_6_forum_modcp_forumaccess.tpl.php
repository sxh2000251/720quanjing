<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<div class="bm bw0 mdcp">
<h1 class="mt">�û�Ȩ��</h1>
<div class="mbm">ͨ������£��û��ڰ���Ȩ���Ǹ��������û�������ģ��˴�����������ĳ���û���ĳ����Ȩ�ޡ�<br />ע��: �����ǻ���Ȩ�ޣ�һ����ֹ, ����Ȩ�޻�ͬʱ���н�ֹ��<br />ͼ��˵��: <img src="static/image/common/access_normal.gif" class="vm" /> Ĭ��Ȩ��&nbsp;&nbsp;&nbsp;&nbsp;<img src="static/image/common/access_disallow.gif" class="vm" /> ǿ�ƽ�ֹ&nbsp;&nbsp;&nbsp;&nbsp;<img src="static/image/common/access_allow.gif" class="vm" />ǿ������ </div>
<?php if($modforums['fids']) { ?>
<script type="text/javascript">
function chkallaccess(obj) {
$('new_post').checked
= $('new_post').disabled
= $('new_reply').checked
= $('new_reply').disabled
= $('new_postattach').checked
= $('new_postattach').disabled
= $('new_getattach').checked
= $('new_getattach').disabled
= $('new_getimage').checked
= $('new_getimage').disabled
= $('new_postimage').disabled
= obj.checked;
}

function disallaccess(obj) {
$('new_view').checked
= $('new_post').checked
= $('new_post').checked
= $('new_reply').checked
= $('new_postattach').checked
= $('new_getattach').checked
= $('new_getimage').checked
= $('new_postimage').disabled
= false;
$('customaccess').disabled
= $('new_view').disabled
= $('new_view').disabled
= $('new_post').disabled
= $('new_post').disabled
= $('new_reply').disabled
= $('new_postattach').disabled
= $('new_getattach').disabled
= $('new_getimage').disabled
= $('new_postimage').disabled
= obj.checked;
}

</script>
<form method="post" autocomplete="off" action="<?php echo $cpscript;?>?mod=modcp&action=<?php echo $_GET['action'];?>">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="op" value="<?php echo $op;?>" id="operation" />
<div class="exfm">
<table cellspacing="0" cellpadding="0">
<?php if($adderror || $successed) { ?>
<tr>
<th>&nbsp;</th>
<td>
<span class="rq"> *
<?php if($successed) { ?>
�û�Ȩ�޸��³ɹ�, ���������
<?php } elseif($adderror == 1) { ?>
���û������ڻ򱻶���
<?php } elseif($adderror == 2) { ?>
��Ǹ����û��Ȩ�޲���������Ա�������û���
<?php } elseif($adderror == 3) { ?>
����Ա���ô��û�ĳЩȨ��Ϊǿ�����������ܱ������Ա����Щ����
<?php } ?>
</span>
</td>
</tr>
<?php } ?>
<tr>
<th width="15%">���ѡ��:</th>
<td width="80%">
<span class="ftid">
<select name="fid" id="fid" class="ps" width="108"><?php if(is_array($modforums['list'])) foreach($modforums['list'] as $id => $name) { ?><option value="<?php echo $id;?>" <?php if($id == $_G['fid']) { ?>selected="selected"<?php } ?>><?php echo $name;?></option>
<?php } ?>
</select>
</span>
</td>
</tr>
<tr>
<th>�û���:</th>
<td>
<input type="text" size="20" value="<?php echo $new_user;?>" name="new_user" class="px" /> &nbsp;&nbsp;
</td>
</tr>
<tr>
<th>Ȩ�ޱ��:</th>
<td>
<label for="deleteaccess" class="lb"><input type="checkbox" value="1" name="deleteaccess" id="deleteaccess" onclick="disallaccess(this)" class="pc" />�ָ�Ĭ��</label>
<span id="customaccess">
<label for="new_view" class="lb"><input type="checkbox" value="-1" name="new_view" id="new_view" onclick="chkallaccess(this)" class="pc" />��ֹ�鿴����</label>
<label for="new_post" class="lb"><input type="checkbox" value="-1" name="new_post" id="new_post" class="pc" />��ֹ��������</label>
<label for="new_reply" class="lb"><input type="checkbox" value="-1" name="new_reply" id="new_reply" class="pc" />��ֹ����ظ�</label>
<label for="new_getattach" class="lb"><input type="checkbox" value="-1" name="new_getattach" id="new_getattach" class="pc" />��ֹ���ظ���</label>
<label for="new_getimage" class="lb"><input type="checkbox" value="-1" name="new_getimage" id="new_getimage" class="pc" />��ֹ�鿴ͼƬ</label>
<label for="new_postattach" class="lb"><input type="checkbox" value="-1" name="new_postattach" id="new_postattach" class="pc" />��ֹ�ϴ�����</label>
<label for="new_postimage" class="lb"><input type="checkbox" value="-1" name="new_postimage" id="new_postimage" class="pc" />��ֹ�ϴ�ͼƬ</label>
</span>
</td>
</tr>
<tr>
<td></td>
<td><button type="submit" class="pn" name="addsubmit" value="true"><strong>�ύ</strong></button></td>
</tr>
</table>
</div>
<script type="text/javascript">
<?php if(!empty($deleteaccess)) { ?>
var obj = $('deleteaccess');
obj.checked = true;
disallaccess(obj);
<?php } elseif(!empty($new_view)) { ?>
var obj = $('new_view');
obj.checked = true;
chkallaccess(obj);
<?php } ?>
</script>
</form>
<?php } ?>
<div class="ptm pbm cl">
<div class="y pns">
<form method="post" autocomplete="off" action="<?php echo $cpscript;?>?mod=modcp&action=<?php echo $_GET['action'];?>&op=<?php echo $op;?>">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>">
�û���: <input type="text" name="suser" class="px vm" value="<?php echo $suser;?>" onclick="this.value='';" />&nbsp;
<select name="fid" class="ps vm">
<option>ȫ�����</option>
<?php echo $forumlistall;?>
</select>&nbsp;
<button type="submit" name="searchsubmit" id="searchsubmit" class="pn vm" value="true"><strong>����</strong></button>
</form>
</div>
<h2>�����û�</h2>
</div>

<table id="list_member" cellspacing="0" cellpadding="0" class="dt">
<thead>
<tr>
<th>��Ա</th>
<th>���</th>
<th>�������</th>
<th>��������</th>
<th>�ظ�����</th>
<th>���ظ���</th>
<th>�鿴ͼƬ</th>
<th>�ϴ�����</th>
<th>�ϴ�ͼƬ</th>
<th>����ʱ��</th>
<th>����</th>
</tr>
</thead>
<?php if($list['data']) { if(is_array($list['data'])) foreach($list['data'] as $access) { ?><tr>
<td><?php if($users[$access['uid']] != '') { ?><a href="home.php?mod=space&amp;uid=<?php echo $access['uid'];?>" target="_blank" class="xi2"><?php echo $users[$access['uid']];?></a><?php } else { ?>UID <?php echo $access['uid'];?><?php } ?></td>
<td><?php echo $access['forum'];?></td>
<td><?php echo $access['allowview'];?></td>
<td><?php echo $access['allowpost'];?></td>
<td><?php echo $access['allowreply'];?></td>
<td><?php echo $access['allowgetattach'];?></td>
<td><?php echo $access['allowgetimage'];?></td>
<td><?php echo $access['allowpostattach'];?></td>
<td><?php echo $access['allowpostimage'];?></td>
<td><?php echo $access['dateline'];?></td>
<td><?php if($users[$access['adminuser']] != '') { ?><a href="home.php?mod=space&amp;uid=<?php echo $access['adminuser'];?>" target="_blank" class="xi2"><?php echo $users[$access['adminuser']];?></a><?php } else { ?>UID <?php echo $access['adminuser'];?><?php } ?></td>
</tr>
<?php } } else { ?>
<tr><td colspan="11"><p class="emp">��ǰû������Ȩ���û�</p></td></tr>
<?php } ?>
</table>
<?php if(!empty($list['pagelink'])) { ?><div class="pgs cl mtm"><?php echo $list['pagelink'];?></div><?php } ?>
</div>
<script type="text/javascript" reload="1">
if($('fid')) {
simulateSelect('fid');
}
</script>