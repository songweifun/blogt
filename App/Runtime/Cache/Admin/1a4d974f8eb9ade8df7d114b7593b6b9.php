<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/index.js"></script>
<link rel="stylesheet" href="__PUBLIC__/css/public.css" />
<link rel="stylesheet" href="__PUBLIC__/css/index.css" />
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<base target="iframe"/>
<head>
</head>
<body>
	<div id="top">
		<div class="menu">
			<a href="#">选择按钮</a>
			<a href="#">选择按钮</a>
			<a href="#">选择按钮</a>
			<a href="#">选择按钮</a>
			<a href="#">选择按钮</a>
		</div>
		<div class="exit">
			<a href="<?php echo U(GROUP_NAME.'/Login/logout');?>" target="_self">退出</a>
			<a href="http://bbs.houdunwang.com" target="_blank">获得帮助</a>
			<a href="http://www.houdunwang.com" target="_blank">后盾网</a>
		</div>
	</div>
	<div id="left">
		<dl>
			<dt>博文管理</dt>
			<dd><a href="<?php echo U(GROUP_NAME.'/Blog/index');?>">博文列表</a></dd>
			<dd><a href="<?php echo U(GROUP_NAME.'/Blog/addBlog');?>">添加博文</a></dd>
			<dd><a href="<?php echo U(GROUP_NAME.'/Blog/trash');?>">回收站</a></dd>

		</dl>

		<dl>
			<dt>属性管理</dt>
			<dd><a href="<?php echo U(GROUP_NAME.'/Attribute/index');?>">属性列表</a></dd>
			<dd><a href="<?php echo U(GROUP_NAME.'/Attribute/addAttr');?>">添加属性</a></dd>

		</dl>
		<dl>
			<dt>栏目管理</dt>
			<dd><a href="<?php echo U(GROUP_NAME.'/Category/index');?>">栏目列表</a></dd>
			<dd><a href="<?php echo U(GROUP_NAME.'/Category/addCategory');?>">添加栏目</a></dd>

		</dl>


		<dl>
			<dt>系统配置</dt>
			<dd><a href="<?php echo U(GROUP_NAME.'/System/setDb');?>">数据库配置</a></dd>

		</dl>
	</div>
	<div id="right">
		<iframe name="iframe" src="#"></iframe>
	</div>
</body>
</html>