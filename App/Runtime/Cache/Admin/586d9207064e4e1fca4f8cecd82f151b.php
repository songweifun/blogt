<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加栏目</title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/bootstrap.css" />
</head>
<body>
<form action="<?php echo U(GROUP_NAME.'/Category/addCategoryHandel');?>" method="post">
    <table class="table table-bordered">
        <tr>
            <td align="right">栏目名称</td>
            <td><input type="text" name="cname"></td>
        </tr>
        <tr>
            <td align="right">排序</td>
            <td><input type="text" name="sort" value="100"></td>
        </tr>
        <input type="hidden" name="pid" value="<?php echo ($pid); ?>">
        <tr>
            <td align="center" colspan="2"><input type="submit" class="btn btn-primary" value="添加栏目"></td>
        </tr>
    </table>
</form>

</body>
</html>