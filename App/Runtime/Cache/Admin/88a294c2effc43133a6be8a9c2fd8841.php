<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加属性</title>
    <link rel="stylesheet" href="__PUBLIC__/css/bootstrap.css">
</head>
<body>
<form action="<?php echo U(GROUP_NAME.'/Attribute/runAddAttr');?>" method="post">
    <table class="table">
        <tr>
            <td colsapn="2">
                添加属性
            </td>
        </tr>
        <tr>
            <td align="right">属性名称:</td>
            <td>
                <input type="text" name="aname">
            </td>
        </tr>
        <tr>
            <td align="right">颜色:</td>
            <td>
                <input type="text" name="color">
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="保存修改" class="btn btn-primary">
            </td>
        </tr>
    </table>
</form>
</body>
</html>