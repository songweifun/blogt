<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加博文</title>
    <script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
    <script type="text/javascript">
        var serverUrlUploader="<?php echo U(GROUP_NAME.'/Blog/runAddBlog');?>";
    </script>
    <script type="text/javascript" src="__PUBLIC__/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/bootstrap.css" />
    <script type="text/javascript" src="__ROOT__/Data/Ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="__ROOT__/Data/Ueditor/ueditor.all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/webuploader.css" />
    <script type="text/javascript" src="__PUBLIC__/js/webuploader.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/upload.js"></script>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css" />

    <script>
        $(function(){
            var ue = UE.getEditor('content',{
                initialFrameWidth:700,  //初始化编辑器宽度,默认1000
                initialFrameHeight:320  //初始化编辑器高度,默认320
            });
        })
    </script>


</head>
<body>

<form action="<?php echo U(GROUP_NAME.'/Blog/runAddBlog');?>" method="post" enctype="multipart/form-data">
    <table class="table table-bordered">
        <tr>
            <th colspan="2">添加博文</th>
        </tr>
        <tr>
            <td align="right">所属栏目</td>
            <td>
                <select name="cid" id="">
                    <option value="">请选择栏目</option>
                    <?php if(is_array($category)): foreach($category as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["html"]); echo ($v["cname"]); ?></option><?php endforeach; endif; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right">博文标题</td>
            <td>
                <input type="text" name="title">
            </td>
        </tr>
        <tr>
            <td align="right">博文属性</td>
            <td>
                <?php if(is_array($attribute)): foreach($attribute as $key=>$v): ?><input type="checkbox" name="aid[]" value="<?php echo ($v["id"]); ?>">&nbsp;<?php echo ($v["aname"]); ?>&nbsp;&nbsp;<?php endforeach; endif; ?>
            </td>
        </tr>
        <tr>
            <td align="right">博文内容</td>
            <td>
                <textarea name="content" id="content" cols="30" rows="10"></textarea>
            </td>
        </tr>
        <tr>
            <td align="right">上传</td>
            <td>
                <input type="file" name="file[]">
                <input type="file" name="file[]">
            </td>
        </tr>

        <tr>
            <td colspan="2">

                <div id="wrapper">
                    <div id="container">
                        <!--头部，相册选择和格式选择-->

                        <div id="uploader">
                            <div class="queueList">
                                <div id="dndArea" class="placeholder">
                                    <div id="filePicker"></div>
                                    <p>或将照片拖到这里，单次最多可选300张</p>
                                </div>
                            </div>
                            <div class="statusBar" style="display:none;">
                                <div class="progress">
                                    <span class="text">0%</span>
                                    <span class="percentage"></span>
                                </div><div class="info"></div>
                                <div class="btns">
                                    <div id="filePicker2"></div><div class="uploadBtn">开始上传</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </td>
        </tr>

        
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="添加博文" class="btn btn-primary">
            </td>
        </tr>
    </table>
</form>







</body>
</html>