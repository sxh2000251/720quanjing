<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<div class="bm bw0 mdcp">
<h1 class="mt">�������</h1>
<ul class="tb cl">
<li><a href="<?php echo $cpscript;?>?mod=modcp&action=thread&op=thread<?php echo $forcefid;?>" hidefocus="true">�������</a></li>
<li class="a"><a href="<?php echo $cpscript;?>?mod=modcp&action=thread&op=post<?php echo $forcefid;?>" hidefocus="true">���ӹ���</a></li>
<li><a href="<?php echo $cpscript;?>?mod=modcp&action=recyclebin<?php echo $forcefid;?>" hidefocus="true">�������վ</a></li>
<li><a href="<?php echo $cpscript;?>?mod=modcp&action=recyclebinpost<?php echo $forcefid;?>" hidefocus="true">��������վ</a></li>
</ul>
<script src="<?php echo $_G['setting']['jspath'];?>calendar.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<form method="post" autocomplete="off" action="<?php echo $cpscript;?>?mod=modcp&action=<?php echo $_GET['action'];?>&op=<?php echo $op;?>">
<input type="hidden" name="do" value="search">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>">
<div class="exfm">
<table cellspacing="0" cellpadding="0">
<tr>
<th width="15%">���ѡ��:</th>
<td width="35%">
<span class="ftid">
<select name="fid" id="fid" class="ps" width="168">
<option value="">��ѡ����</option><?php if(is_array($modforums['list'])) foreach($modforums['list'] as $id => $name) { ?><option value="<?php echo $id;?>" <?php if($id == $_G['fid']) { ?>selected<?php } ?>><?php echo $name;?></option>
<?php } ?>
</select>
</span>
</td>
<th width="15%">��������:</th>
<td width="35%">
<span class="ftid">
<select name="threadoption" id="threadoption" class="ps" width="168">
<option value="0" <?php echo $threadoptionselect['0'];?>>ȫ��</option>
<option value="1" <?php echo $threadoptionselect['1'];?>>��������</option>
<option value="2" <?php echo $threadoptionselect['2'];?>>����ظ���</option>
</select>
</span>
</td>
</tr>
<tr>
<th>��������:</th>
<td><input type="text" name="users" class="px" size="20" value="<?php echo $result['users'];?>" style="width: 180px"/></td>
<th>ʱ�䷶Χ:</th>
<td><input type="text" name="starttime" class="px" size="10" value="<?php echo $result['starttime'];?>" onclick="showcalendar(event, this)"/> ��
<?php if($_G['adminid'] == 1) { ?>
<input type="text" name="endtime" class="px" size="10" value="<?php echo $result['endtime'];?>" onclick="showcalendar(event, this)"/>
<?php } else { ?>
<input type="text" name="endtime" class="px" size="10" value="<?php echo $result['endtime'];?>" readonly="readonly" disabled="disabled" />
<?php if($_G['adminid'] == 2) { ?>
<br />��ֻ�ܲ������ 2 �ܵ�����
<?php } elseif($_G['adminid'] == 3) { ?>
<br />��ֻ�ܲ������ 1 �ܵ�����
<?php } } ?>
 </td>
</tr>
<tr>
<th>���ݹؼ���:</th>
<td><input type="text" name="keywords" class="px" size="20" value="<?php echo $result['keywords'];?>" style="width: 180px"/></td>
<th>���� IP:</th>
<td><input type="text" name="useip" class="px" value="<?php echo $result['useip'];?>" style="width: 180px" /></td>
</tr>
<?php if($posttableselect) { ?>
<tr>
<th>���ӷֱ�:</th>
<td colspan="3"><span class="ftid"><?php echo $posttableselect;?></span></td>
</tr>
<?php } ?>
<tr>
<td>&nbsp;</td>
<td colspan="3">
<button type="submit" name="searchsubmit" id="searchsubmit" class="pn" value="true"><strong>�ύ</strong></button>
</td>
</tr>
</table>
</div>
</form>
<?php if($error == 1) { ?>
<p class="xi1">�����������㣡������Ӧ���� �ؼ��֣��������߻��߷��� IP ��������һ������������</p>
<?php } elseif($error == 2) { ?>
<p class="xi1">ʱ�䷶Χ���󣡰���ֻ��ɾ���� 1 �ܵ����ӣ�������������ɾ�� 2 ���ڵ����ӣ�������ѡ��ʼʱ��</p>
<?php } elseif($error == 3) { ?>
<p class="xi1">������Ĺؼ��ֲ��Ϸ���ÿ���ؼ��������� 2 �����ֻ��� 4 ��Ӣ���ַ����</p>
<?php } elseif($error == 4) { ?>
<p class="xi1">��Ǹ������Ȩʹ������ɾ������</p>
<?php } elseif($do=='list' && empty($error)) { ?>
<h2 class="mtm mbm">��ǰ���: <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>" target="_blank" class="xi2"><?php echo $_G['forum']['name'];?></a>, ����������� <strong><?php echo $total;?></strong> ��</h2>
<?php if($postlist) { ?>
<div id="threadlist" class="tl">
<form method="post" autocomplete="off" name="moderate" id="moderate" action="<?php echo $cpscript;?>?mod=modcp&action=<?php echo $_GET['action'];?>&op=<?php echo $op;?>">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="fid" value="<?php echo $_G['fid'];?>" />
<input type="hidden" name="do" value="delete" />
<input type="hidden" name="posttableid" value="<?php echo $posttableid;?>" />
<table cellspacing="0" cellpadding="0">
<tr class="th">
<?php if($_G['group']['allowmassprune']) { ?><td width="40">&nbsp;</td><?php } ?>
<th>&nbsp;</th>
<td class="frm">���</td>
<td class="by">����</td>
</tr><?php if(is_array($postlist)) foreach($postlist as $post) { ?><tr>
<?php if($_G['group']['allowmassprune']) { ?><td><input type="checkbox" name="delete[]" class="pc" value="<?php echo $post['pid'];?>" /></td><?php } ?>
<th>
����: &nbsp;<a target="_blank" href="forum.php?mod=redirect&amp;goto=findpost&amp;pid=<?php echo $post['pid'];?>&amp;ptid=<?php echo $post['tid'];?><?php if($post['invisible'] == -2) { ?>&amp;modthreadkey=<?php echo $post['modthreadkey'];?><?php } ?>"><?php echo $post['tsubject'];?></a><br />
<span class="xg1"><?php echo $post['message'];?></span>
</th>
<td class="frm">
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $post['fid'];?>"><?php echo $post['forum'];?></a>
</td>
<td class="by">
<cite>
<?php if($post['authorid'] && $post['author']) { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $post['authorid'];?>" target="_blank"><?php echo $post['author'];?></a>
<?php } else { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $post['authorid'];?>" target="_blank">����</a>
<?php } ?>
</cite>
<em><?php echo $post['dateline'];?></em>
</td>
</tr>
<?php } ?>

<tr class="bw0_all">
<td colspan="<?php if($_G['group']['allowmassprune']) { ?>4<?php } else { ?>3<?php } ?>" class="ptm">
<?php if($multipage) { ?><?php echo $multipage;?><?php } if($postlist && $_G['group']['allowmassprune']) { ?>
<label for="chkall"><input type="checkbox" name="chkall" id="chkall" class="pc" onclick="checkall(this.form, 'delete')" />ɾ?</label>
<button type="submit" name="deletesubmit" id="deletesubmit" class="pn" value="true"><strong>ɾ��</strong></button>
<label for="nocredit"><input type="checkbox" name="nocredit" id="nocredit" class="pc" value="1" checked="checked" />�������û�����</label>
<?php } ?>
</td>
</tr>
</table>
</form>
</div>
<?php } } ?>
</div>
<script type="text/javascript" reload="1">
simulateSelect('fid');
simulateSelect('threadoption');
simulateSelect('posttableid');
</script>