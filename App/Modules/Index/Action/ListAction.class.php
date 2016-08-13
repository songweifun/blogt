<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 16/8/12
 * Time: 下午7:59
 */
class ListAction extends Action{
    public function index(){
        import('ORG.Util.Page');
        import('Class.category',APP_PATH);

        $id=(int)$_GET['id'];
        $cate=M('category')->order('sort')->select();
        $categoryIds=Category::getChildId($cate,$id);
        $categoryIds[]=$id;
        $where=array('cid'=>array('IN',$categoryIds));
        $count=M('blog')->where($where)->count();
        $Page=new Page($count,10);
        $limit=$Page->firstRow.','.$Page->listRows;
        $this->blogs=D('BlogView')->getBlogs($where,$limit);
        $this->page=$Page->show();
        $this->display();
    }
}