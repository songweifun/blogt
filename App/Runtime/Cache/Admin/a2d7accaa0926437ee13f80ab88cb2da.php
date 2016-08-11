<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>栏目列表</title>
    <script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/bootstrap.css" />
</head>
<body>
<!--
<form action="<?php echo U(GROUP_NAME.'/Category/setSort');?>" method="post">
    <table class="table table-border">
        <tr>
            <th>栏目ID</th>
            <th>栏目名称</th>
            <th>栏目等级</th>
            <th>栏目排序<button type="submit" class="btn btn-primary btn-xs">重新排序</button></th>
            <th>操作</th>
        </tr>
        <?php if(is_array($category)): foreach($category as $key=>$v): ?><tr>
                <td><?php echo ($v["id"]); ?></td>
                <td><?php echo ($v["html"]); echo ($v["cname"]); ?></td>
                <td><?php echo ($v["level"]); ?></td>
                <td>
                    <input type="text" name="<?php echo ($v["id"]); ?>" value="<?php echo ($v["sort"]); ?>">
                </td>
                <td>
                    [<a href="<?php echo U(GROUP_NAME.'/Category/addCategory',array('pid'=>$v['id']));?>">添加子栏目</a>]
                    [<a href="">修改</a>]
                    [<a href="">删除</a>]
                </td>
            </tr><?php endforeach; endif; ?>
        <tr>
            <td colspan="5" align="center">

            </td>
        </tr>

    </table>
</form>
-->

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <?php if(is_array($category)): foreach($category as $key=>$v): ?><div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <ul class="list-inline">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo ($v["cname"]); ?>" aria-expanded="true" aria-controls="collapseOne">


                            <li><?php echo ($v["cname"]); ?></li>

                    </a>
                        <div style="margin-left: 100px;">
                        [<a href="<?php echo U(GROUP_NAME.'/Category/addCategory',array('pid'=>$v['id']));?>">添加子栏目</a>]
                        [<a href="">修改</a>]
                        [<a href="">删除</a>]
                        </div>

                </h4>
            </div>
            <div id="collapse<?php echo ($v["cname"]); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo ($v["cname"]); ?>">
                <div class="panel-body">
                    <table class="table table-border">
                        <tr>
                            <th>栏目ID</th>
                            <th>栏目名称</th>
                            <th>栏目等级</th>
                            <th>栏目排序<button type="submit" class="btn btn-primary btn-xs">重新排序</button></th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($v["child"])): foreach($v["child"] as $key=>$value): ?><tr>
                                <td><?php echo ($value["id"]); ?></td>
                                <td><?php echo ($value["cname"]); ?></td>
                                <td><?php echo ($value["level"]); ?></td>
                                <td>
                                    <input type="text" name="<?php echo ($value["id"]); ?>" value="<?php echo ($value["sort"]); ?>">
                                </td>
                                <td>
                                    [<a href="<?php echo U(GROUP_NAME.'/Category/addCategory',array('pid'=>$value['id']));?>">添加子栏目</a>]
                                    [<a href="">修改</a>]
                                    [<a href="">删除</a>]
                                </td>
                            </tr><?php endforeach; endif; ?>
                        </table>
                </div>
            </div>
        </div><?php endforeach; endif; ?>

</div>
</body>

</html>