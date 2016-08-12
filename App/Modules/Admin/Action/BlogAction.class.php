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
        $this->blog=D('BlogRelation')->getBlogs(0);
        //p($blog);die;
        $this->display();
    }
    /**
     * 将博文移入回收站
     */
    public function toTrash(){
       $id=(int)$_GET['id'];
        $type=(int)$_GET['type'];
        $update=array(
          'id'=>$id,
          'isdel'=>$type
        );
        $msg=$type?'删除':'还原';
        if(M('blog')->save($update)){
            $this->success($msg.'成功',U(GROUP_NAME.'/Blog/index'));
        }else{
            $this->error($msg.'失败');
        }

    }
    /**
     * 博文回收站
     */
    public function trash(){
        $this->blog=D('BlogRelation')->getBlogs(1);

        $this->display('index');
    }
    /**
     *彻底删除
     */
    public function shiftDelete(){
        $id=(int)$_GET['id'];
        //echo $id;
        //D('BlogRelation')->relation('attribute')->delete($id);
        //$this->display('index');
        if(M('blog')->where(array('id'=>$id))->delete()){
            M('blog_attribute')->where(array('bid'=>$id))->delete();
            $this->success('已彻底删除',U(GROUP_NAME.'/Blog/trash'));
        }else{
            $this->success('彻底删除失败');
        }

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
        $up->upload('./Uploads/house/');
        /*if($up->upload('./Uploads/house/')){
            $this->success('上传成功');

        }else{
            $this->error($up->getErrorMsg(),U(GROUP_NAME.'/Blog/addBlog'));
        }*/

        $data=array(
            'title'=>I('title'),
            'content'=>I('content'),
            'time'=>time(),
            'click'=>I('click','intval'),
            'cid'=>I('cid','intval')
        );
        if($bid=M('blog')->add($data)){
            if(isset($_POST['aid'])) {
                $sql = "insert into 6d_blog_attribute(bid,aid) VALUES";
                foreach ($_POST['aid'] as $v) {
                    $sql .= "(" . $bid . "," . $v . "),";
                }
                $sql=rtrim($sql,',');
                //p($sql);die;
                M('blog_attribute')->query($sql);
            }
            $this->success('添加成功',U(GROUP_NAME.'/Blog/index'));
        }else{
            $this->error("添加失败");
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