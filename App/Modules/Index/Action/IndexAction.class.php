<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 16/8/12
 * Time: 下午5:08
 */
class IndexAction extends Action{
    //首页
    public function index(){
        //$redis=new Redis();
        //$redis->connect('127.0.0.1',6379);
        if(!$list=S('index_list')){
            echo 11111111111111111111111;
            $list=M('category')->where(array("pid"=>0))->order('sort')->select();
            $cate=M('category')->order('sort')->select();
            $db=M('blog');
            $field=array('id','title','time');

            import('Class.category',APP_PATH);
            foreach($list as $k=>$v){
                $childIds=Category::getChildId($cate,$v['id']);
                $childIds[]=$v['id'];
                $where=array('cid'=>array('IN',$childIds));
                $blogs=$db->field($field)->where($where)->order('time desc')->select();
                $list[$k]['blogs']=$blogs;

            }
            S('index_list',$list,10);
            //$redis->set('index_list',serialize($list),10);

        }
        //p($list);die;
        $this->list=$list;
        $this->display();

    }
}