<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 16/8/12
 * Time: 下午8:13
 */
class ShowAction extends Action{
    public function index(){
        //echo 'ccccccccccccccccccc';
        $id=(int)$_GET['id'];
        $where=array('id'=>$id);
        //M('blog')->where($where)->setInc('click');
        $field=array('id','title','content','time','click','cid');
       $this->blog=M('blog')->field($field)->where($where)->find();
        import('Class.category',APP_PATH);
        $cate=M('category')->order('sort')->select();

        $this->parents=Category::getParents($cate,$this->blog['cid']);
        $this->display();
    }

    public function clickNum(){
        $id=(int)$_GET['id'];
        $where=array('id'=>$id);
        $click=M('blog')->where($where)->getField('click');
        M('blog')->where($where)->setInc('click');


        echo 'document.write('.$click.')';
    }
    public function clickNum2(){

        $id=(int)$_GET['id'];
        $where=array('id'=>$id);

        $click=M('blog')->where($where)->getField('click')-1;
        echo 'document.write('.$click.')';

    }
}