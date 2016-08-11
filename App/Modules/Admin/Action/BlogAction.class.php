<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 16/8/7
 * Time: 下午9:16
 */
class BlogAction extends CommonAction{

    /**
     * 博文列表
     */
    public function index(){
        $this->display();
    }
    /**
     * 添加博文
     */
    public function addBlog(){
        import('Class.Category',APP_PATH);
        $this->category=Category::oneDimensionalArray(M('category')->order('sort')->select());
        $this->attribute=M('attribute')->select();
        $this->display();

    }
    /**
     * 添加博文表单处理
     */
    public function runAddBlog(){
        import('ORG.Net.UploadFile');
        $config =   array(

            'autoSub'           =>  true,// 启用子目录保存文件
            'subType'           =>  'date',// 子目录创建方式 可以使用hash date custom
            'dateFormat'        =>  'Ymd',

        );
        $up=new UploadFile($config);
        if($up->upload('./Uploads/house/')){
            $this->success('上传成功');

        }else{
            $this->error($up->getErrorMsg(),U(GROUP_NAME.'/Blog/addBlog'));
        }
    }

    /**
     * 上传图片 服务器统一请求接口
     */
    public function uploadImageServer(){
        date_default_timezone_set("Asia/chongqing");
        error_reporting(E_ERROR);
        header("Content-Type: text/html; charset=utf-8");
        echo '{"imageActionName":"uploadimage","imageFieldName":"upfile","imageMaxSize":2048000,"imageAllowFiles":[".png",".jpg",".jpeg",".gif",".bmp"],"imageCompressEnable":true,"imageCompressBorder":1600,"imageInsertAlign":"none","imageUrlPrefix":"","imagePathFormat":"\/ueditor\/php\/upload\/image\/{yyyy}{mm}{dd}\/{time}{rand:6}","scrawlActionName":"uploadscrawl","scrawlFieldName":"upfile","scrawlPathFormat":"\/ueditor\/php\/upload\/image\/{yyyy}{mm}{dd}\/{time}{rand:6}","scrawlMaxSize":2048000,"scrawlUrlPrefix":"","scrawlInsertAlign":"none","snapscreenActionName":"uploadimage","snapscreenPathFormat":"\/ueditor\/php\/upload\/image\/{yyyy}{mm}{dd}\/{time}{rand:6}","snapscreenUrlPrefix":"","snapscreenInsertAlign":"none","catcherLocalDomain":["127.0.0.1","localhost","img.baidu.com"],"catcherActionName":"catchimage","catcherFieldName":"source","catcherPathFormat":"\/ueditor\/php\/upload\/image\/{yyyy}{mm}{dd}\/{time}{rand:6}","catcherUrlPrefix":"","catcherMaxSize":2048000,"catcherAllowFiles":[".png",".jpg",".jpeg",".gif",".bmp"],"videoActionName":"uploadvideo","videoFieldName":"upfile","videoPathFormat":"\/ueditor\/php\/upload\/video\/{yyyy}{mm}{dd}\/{time}{rand:6}","videoUrlPrefix":"","videoMaxSize":102400000,"videoAllowFiles":[".flv",".swf",".mkv",".avi",".rm",".rmvb",".mpeg",".mpg",".ogg",".ogv",".mov",".wmv",".mp4",".webm",".mp3",".wav",".mid"],"fileActionName":"uploadfile","fileFieldName":"upfile","filePathFormat":"\/ueditor\/php\/upload\/file\/{yyyy}{mm}{dd}\/{time}{rand:6}","fileUrlPrefix":"","fileMaxSize":51200000,"fileAllowFiles":[".png",".jpg",".jpeg",".gif",".bmp",".flv",".swf",".mkv",".avi",".rm",".rmvb",".mpeg",".mpg",".ogg",".ogv",".mov",".wmv",".mp4",".webm",".mp3",".wav",".mid",".rar",".zip",".tar",".gz",".7z",".bz2",".cab",".iso",".doc",".docx",".xls",".xlsx",".ppt",".pptx",".pdf",".txt",".md",".xml"],"imageManagerActionName":"listimage","imageManagerListPath":"\/ueditor\/php\/upload\/image\/","imageManagerListSize":20,"imageManagerUrlPrefix":"","imageManagerInsertAlign":"none","imageManagerAllowFiles":[".png",".jpg",".jpeg",".gif",".bmp"],"fileManagerActionName":"listfile","fileManagerListPath":"\/ueditor\/php\/upload\/file\/","fileManagerUrlPrefix":"","fileManagerListSize":20,"fileManagerAllowFiles":[".png",".jpg",".jpeg",".gif",".bmp",".flv",".swf",".mkv",".avi",".rm",".rmvb",".mpeg",".mpg",".ogg",".ogv",".mov",".wmv",".mp4",".webm",".mp3",".wav",".mid",".rar",".zip",".tar",".gz",".7z",".bz2",".cab",".iso",".doc",".docx",".xls",".xlsx",".ppt",".pptx",".pdf",".txt",".md",".xml"]}';
        //echo  json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents(__ROOT__."/Data/Ueditor/php/config.json")), true);
        //echo '{"state":"\u627e\u4e0d\u5230\u4e0a\u4f20\u6587\u4ef6","url":null,"title":null,"original":null,"type":null,"size":null}';
    }
}