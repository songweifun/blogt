<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 16/8/13
 * Time: 下午2:47
 */
class HotWidget extends Widget{
    public function render($data){
        $limit=$data['limit'];
        $field=array('id','title','click');
        $data['hotBlogs']=M('blog')->field($field)->order('click desc')->select();
        return $this->renderFile('',$data);
    }
}