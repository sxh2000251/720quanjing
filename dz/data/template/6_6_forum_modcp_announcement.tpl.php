<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); 
0
|| checktplrefresh('./template/default/forum/modcp_announcement.htm', './template/default/common/seditor.htm', 1512667129, '6', './data/template/6_6_forum_modcp_announcement.tpl.php', './template/dean_cg_160522', 'forum/modcp_announcement')
;?>
<div class="bm bw0 mdcp">
<?php if($op == 'edit') { ?>
<h1 class="mt">�༭����</h1>
<?php } else { ?>
<h1 class="mt">����</h1>
<?php } ?>
<div class="exfm">
<script src="<?php echo $_G['setting']['jspath'];?>calendar.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<form method="post" autocomplete="off" action="<?php echo $cpscript;?>?mod=modcp&action=announcement&op=<?php if($op == 'edit') { ?>edit<?php } else { ?>add<?php } ?>">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>">
<input type="hidden" name="id" value="<?php echo $announce['id'];?>">
<input type="hidden" name="displayorder" value="<?php echo $announce['displayorder'];?>">
<table cellspacing="0" cellpadding="0">
<tr>
<th width="15%">����:</th>
<td width="35%"><input type="text" name="subject" value="<?php echo $announce['subject'];?>" class="px" /></td>
<th width="15%">��������:</th>
<td width="35%">
<span class="ftid">
<select name="type" id="type" change="changeinput($('type').value)" class="ps">
<option value="0" <?php echo $announce['checked']['0'];?>>��������</option>
<option value="1" <?php echo $announce['checked']['1'];?>>��ַ����</option>
</select>
</span>
<script type="text/javascript">
function changeinput(v){
if(v == 0) {
$('annomessage').style.display = $('annomessage_editor').style.display = '';
$('anno_type_url').style.display = 'none';
} else {
$('annomessage').style.display = $('annomessage_editor').style.display = 'none';
$('anno_type_url').style.display = '';
}
}
</script>
</td>
</tr>
<tr>
<th width="15%">��ʼʱ��:</th>
<td width="35%" class="hasd">
<input type="text" onclick="showcalendar(event, this, false)" id="starttime" name="starttime" autocomplete="off" value="<?php echo $announce['starttime'];?>" class="px" tabindex="1" />
<a href="javascript:;" class="dpbtn" onclick="showselect(this, 'starttime', 1)">^</a>
</td>
<th width="15%">����ʱ��:</th>
<td width="35%" class="hasd cl">
<input type="text" onclick="showcalendar(event, this, false)" id="endtime" name="endtime" autocomplete="off" value="<?php echo $announce['endtime'];?>" class="px" tabindex="1" />
<a href="javascript:;" class="dpbtn" onclick="showselect(this, 'endtime', 1)">^</a>
</td>
</tr>
<tr>
<th>&nbsp;</th>
<td colspan="3">
<div class="tedt" id="annomessage_editor" <?php if($announce['checked']['1']) { ?> style="display:none"<?php } ?>>
<div class="bar"><?php $seditor = array('anno', array('bold', 'color', 'img', 'link'));?><script src="<?php echo $_G['setting']['jspath'];?>seditor.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<div class="fpd">
<?php if(in_array('bold', $seditor['1'])) { ?>
<a href="javascript:;" title="���ּӴ�" class="fbld"<?php if(empty($seditor['2'])) { ?> onclick="seditor_insertunit('<?php echo $seditor['0'];?>', '[b]', '[/b]');doane(event);"<?php } ?>>B</a>
<?php } if(in_array('color', $seditor['1'])) { ?>
<a href="javascript:;" title="����������ɫ" class="fclr" id="<?php echo $seditor['0'];?>forecolor"<?php if(empty($seditor['2'])) { ?> onclick="showColorBox(this.id, 2, '<?php echo $seditor['0'];?>');doane(event);"<?php } ?>>Color</a>
<?php } if(in_array('img', $seditor['1'])) { ?>
<a id="<?php echo $seditor['0'];?>img" href="javascript:;" title="ͼƬ" class="fmg"<?php if(empty($seditor['2'])) { ?> onclick="seditor_menu('<?php echo $seditor['0'];?>', 'img');doane(event);"<?php } ?>>Image</a>
<?php } if(in_array('link', $seditor['1'])) { ?>
<a id="<?php echo $seditor['0'];?>url" href="javascript:;" title="�������" class="flnk"<?php if(empty($seditor['2'])) { ?> onclick="seditor_menu('<?php echo $seditor['0'];?>', 'url');doane(event);"<?php } ?>>Link</a>
<?php } if(in_array('quote', $seditor['1'])) { ?>
<a id="<?php echo $seditor['0'];?>quote" href="javascript:;" title="����" class="fqt"<?php if(empty($seditor['2'])) { ?> onclick="seditor_menu('<?php echo $seditor['0'];?>', 'quote');doane(event);"<?php } ?>>Quote</a>
<?php } if(in_array('code', $seditor['1'])) { ?>
<a id="<?php echo $seditor['0'];?>code" href="javascript:;" title="����" class="fcd"<?php if(empty($seditor['2'])) { ?> onclick="seditor_menu('<?php echo $seditor['0'];?>', 'code');doane(event);"<?php } ?>>Code</a>
<?php } if(in_array('smilies', $seditor['1'])) { ?>
<a href="javascript:;" class="fsml" id="<?php echo $seditor['0'];?>sml"<?php if(empty($seditor['2'])) { ?> onclick="showMenu({'ctrlid':this.id,'evt':'click','layer':2});return false;"<?php } ?>>Smilies</a>
<?php if(empty($seditor['2'])) { ?>
<script type="text/javascript" reload="1">smilies_show('<?php echo $seditor['0'];?>smiliesdiv', <?php echo $_G['setting']['smcols'];?>, '<?php echo $seditor['0'];?>');</script>
<?php } } if(in_array('at', $seditor['1']) && $_G['group']['allowat']) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>at.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<a id="<?php echo $seditor['0'];?>at" href="javascript:;" title="@����" class="fat"<?php if(empty($seditor['2'])) { ?> onclick="seditor_menu('<?php echo $seditor['0'];?>', 'at');doane(event);"<?php } ?>>@����</a>
<?php } ?>
<?php echo $seditor['3'];?>
</div></div>
<div class="area">
<textarea name="message[0]" id="annomessage" class="pt" <?php if($announce['checked']['1']) { ?> style="display:none"<?php } ?> /><?php echo $announce['message'];?></textarea>
</div>
</div>
<input name="message[1]" id="anno_type_url" value="<?php echo $announce['message'];?>" class="px"<?php if($announce['checked']['0']) { ?> style="display:none"<?php } ?> />
</td>
</tr>
<tr>
<th>&nbsp;</th>
<td colspan="3">
<?php if($op == 'edit') { ?>
<button type="submit" name="submit" id="submit" class="pn" value="true"><strong>�༭</strong></button>
<button type="button" class="pn" onclick="location.href='<?php echo $cpscript;?>?mod=modcp&action=announcement'"><strong>����</strong></button>
<?php } else { ?>
<button type="submit" name="submit" id="submit" class="pn" value="true"><strong>��ӹ���</strong></button>
<?php } if($edit_successed) { ?>
�������ø�����ϣ����������<script type="text/JavaScript">setTimeout("window.location.replace('<?php echo $cpscript;?>?mod=modcp&action=announcement')", 2000);</script>
<?php } elseif($add_successed) { ?>
���������ϣ����������
<?php } ?>
</td>
</tr>
</tbody>
</table>
</form>
</div>

<?php if($op != 'edit') { ?>
<h2 class="mtm mbm">�����б�</h2>
<form method="post" autocomplete="off" action="<?php echo $cpscript;?>?mod=modcp&action=announcement&op=manage">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>">
<table id="list_announce" cellspacing="0" cellpadding="0" class="dt">
<thead>
<tr>
<th class="c">&nbsp;</th>
<th>˳��</th>
<th>����</th>
<th>����</th>
<th>��������</th>
<th>��ʼʱ��</th>
<th>����ʱ��</th>
<th>����</th>
</tr>
</thead><?php if(is_array($annlist)) foreach($annlist as $ann) { ?><tr <?php echo $ann['disabled'];?>>
<td><input type="checkbox" name="delete[]" class="pc" value="<?php echo $ann['id'];?>" <?php echo $ann['disabled'];?> /></td>
<td><input type="text" name="order[<?php echo $ann['id'];?>]" class="px" value="<?php echo $ann['displayorder'];?>" size="3" <?php echo $ann['disabled'];?> /></td>
<td><?php echo $ann['author'];?></td>
<td><?php echo $ann['subject'];?></td>
<td><?php if($ann['type'] == 1) { ?>����<?php } else { ?>����<?php } ?></td>
<td><?php echo $ann['starttime'];?></td>
<td><?php echo $ann['endtime'];?></td>
<td><a href="<?php echo $cpscript;?>?mod=modcp&action=announcement&op=edit&id=<?php echo $ann['id'];?>" class="xi2">�༭</a></td>
</tr>
<?php } ?>
<tr class="bw0_all">
<td><label for="chkall" onclick="checkall(this.form)"><input type="checkbox" name="chkall" id="chkall" class="pc" />ɾ?</label></td>
<td colspan="7">
<button type="submit" name="submit" id="submit" class="pn" value="true"><strong>�ύ</strong></button>
<?php if(!empty($delids)) { ?>
ѡ������ɾ����ϣ����������
<?php } ?>
</td>
</tr>
</table>
</form>
<?php } ?>
</div>

<script type="text/javascript" reload="1">
simulateSelect('type');
</script>