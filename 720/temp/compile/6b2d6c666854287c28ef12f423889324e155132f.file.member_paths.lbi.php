<?php /* Smarty version Smarty-3.1.7, created on 2017-11-10 23:46:17
         compiled from "C:/PHPWAMP_IN1/wwwroot/720quanjing/template\default\library\member_paths.lbi" */ ?>
<?php /*%%SmartyHeaderCode:312035a05c9c9835606-92179496%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b2d6c666854287c28ef12f423889324e155132f' => 
    array (
      0 => 'C:/PHPWAMP_IN1/wwwroot/720quanjing/template\\default\\library\\member_paths.lbi',
      1 => 1482227914,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '312035a05c9c9835606-92179496',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module' => 0,
    'act' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a05c9c9888a8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a05c9c9888a8')) {function content_5a05c9c9888a8($_smarty_tpl) {?><style type="text/css">
.navbar{
margin-bottom:0;
}
.navbar-default .navbar-second li>a{
padding-top:7px;
padding-bottom:8px;
}
.navbar-default .navbar-second>.active>a, .navbar-default .navbar-second>.active>a:focus, .navbar-default .navbar-second>li>a:hover, .navbar-default .navbar-second>.active>a:hover{
background:none;
line-height:27px;
border-bottom:3px solid #4aab4e;
}
</style>
<div class="navbar" style="margin-bottom:20px;z-index:0;background:#fff;">
	<div class="container" style="line-height:45px">
		<div class="navbar-right navbar-default" style="background:none">
			<ul class="navbar-second nav navbar-nav">
				<?php if ($_smarty_tpl->tpl_vars['module']->value=='profile'||$_smarty_tpl->tpl_vars['module']->value=='passwd'||$_smarty_tpl->tpl_vars['module']->value=='bind'){?>
					<li <?php if ($_smarty_tpl->tpl_vars['module']->value=='profile'){?>class="active"<?php }?>><a href="/member/profile">作者资料</a></li>
					<li <?php if ($_smarty_tpl->tpl_vars['module']->value=='passwd'){?>class="active"<?php }?>><a href="/member/passwd">修改密码</a></li>
					<li <?php if ($_smarty_tpl->tpl_vars['module']->value=='bind'){?>class="active"<?php }?>><a href="/member/bind">社交绑定</a></li>
				<?php }else{ ?>
					<li <?php if ($_smarty_tpl->tpl_vars['module']->value=='pic'){?>class="active"<?php }?>><a href="/add/pic">发布作品</a></li>
					<li <?php if ($_smarty_tpl->tpl_vars['module']->value=='project'&&$_smarty_tpl->tpl_vars['act']->value=='list'){?>class="active"<?php }?>><a href="/member/project">全景图片</a></li>
					<li <?php if ($_smarty_tpl->tpl_vars['module']->value=='project'&&$_smarty_tpl->tpl_vars['act']->value=='videos'){?>class="active"<?php }?>><a href="/member/project?act=videos">全景视频</a></li>
					<li <?php if ($_smarty_tpl->tpl_vars['module']->value=='object_around'){?>class="active"<?php }?>><a href="/member/object_around">物体环视</a></li>
					<li <?php if ($_smarty_tpl->tpl_vars['module']->value=='mediares'){?>class="active"<?php }?>><a href="/member/mediares">素材管理</a></li>
					<li <?php if ($_smarty_tpl->tpl_vars['module']->value=='download'){?>class="active"<?php }?>><a href="/member/download">离线下载</a></li>
				<?php }?>
		  </ul>
		</div>
	</div>
</div><?php }} ?>