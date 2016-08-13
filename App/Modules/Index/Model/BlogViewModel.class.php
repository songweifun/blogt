<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 16/8/13
 * Time: 下午6:28
 */
class BlogViewModel extends ViewModel{
    public $viewFields = array(
        'blog'=>array(
            'id','title','time','click','summary',
            '_type'=>'LEFT'
        ),
        'category'=>array(
            'cname',
            '_on'=>'blog.cid=category.id'
        ),
    );

    public function getBlogs($where,$limit=10){
        return $this->where($where)->limit($limit)->order('time desc')->select();
    }
}