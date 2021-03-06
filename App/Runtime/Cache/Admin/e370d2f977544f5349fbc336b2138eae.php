<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>数据库配置</title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/bootstrap.css" />
</head>
<body>
<form action="<?php echo U(GROUP_NAME.'/System/setDbHandel');?>" method="post">
    <table class="table table-bordered">
        <tr>
            <td colspan="2" align="right">数据库配置</td>
        </tr>
        <tr>
            <td align="right">数据库地址</td>
            <td>
                <input type="text" name="DB_HOST" value="<?php echo (C("DB_HOST")); ?>">
            </td>
        </tr>

        <tr>
            <td align="right">数据库名称</td>
            <td>
                <input type="text" name="DB_NAME" value="<?php echo (C("Db_name")); ?>">
            </td>
        </tr>
        <tr>
            <td align="right">数据库用户名</td>
            <td><input type="text" name="DB_USER" value="<?php echo (C("db_user")); ?>"></td>
        </tr>
        <tr>
            <td align="right">数据库密码</td>
            <td><input type="password" name="DB_PWD" value="<?php echo (C("db_pwd")); ?>"></td>
        </tr>
        <tr>
            <td align="right">数据表前缀</td>
            <td>
                <input type="text" name="DB_PREFIX" value="<?php echo (C("db_Prefix")); ?>">
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" class="btn btn-primary" value="保存修改"></td>
        </tr>
    </table>
</form>

</body>
</html>