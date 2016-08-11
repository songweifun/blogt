<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 16/8/8
 * Time: 下午10:26
 */
//import('ORG.Net.UploadFile');
include('UploadFile.class.php');
$config =   array(

    'autoSub'           =>  true,// 启用子目录保存文件
    'subType'           =>  'date',// 子目录创建方式 可以使用hash date custom
    'dateFormat'        =>  'Ymd',
);
$upload=new UploadFile($config);
$RootDir = $_SERVER['DOCUMENT_ROOT'];
$savePath=$RootDir.'/blogt/Uploads/';



if($upload->upload($savePath)){
    $info=$upload->getUploadFileInfo();
    $arr=explode('/',$info[0]['savename']);
    //使用的是外来的类
    include('Image.class.php');
    $image=new Image('../../../Uploads/');
    //$groundName='../../../Uploads/'.$info[0]['savename'];
    $groundName=$info[0]['savename'];
    //echo $groundName;
    //$image->water('../../../Uploads/20160809/3.jpg','logo.png');
    //$image->water($groundName,'../../../Data/logo.png');
    $image->waterMark($groundName,'../../../Data/logo.png',2,'');
    return json_encode(array(
        "state"=>"SUCCESS",
        "url"=>'/blogt/Uploads/'.$info[0]['savename'],
        'title'=>$arr[1],
        'original'=>$info[0]['name'],
        'type'=>$info[0]['extension'],
        'size'=>$info['0']['size'],
    ));

}else{
    return json_encode(array(
        'state'=>$upload->getErrorMsg()
    ));
}


/**
 * 得到上传文件所对应的各个参数,数组结构
 * array(
 *     "state" => "",          //上传状态，上传成功时必须返回"SUCCESS"
 *     "url" => "",            //返回的地址
 *     "title" => "",          //新文件名
 *     "original" => "",       //原始文件名
 *     "type" => ""            //文件类型
 *     "size" => "",           //文件大小
 * )
 * */
?>