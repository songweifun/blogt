<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 16/8/7
 * Time: 下午6:52
 */
class AttributeAction extends CommonAction{

    /**
     * 属性列表
     */
    public function index(){
        $this->attribute=M('attribute')->select();
        //p($this->attribute);die;
        $this->display();
    }
    /**
     * 添加属性
     */
    public function addAttr(){
        $this->display();
    }
    /**
     * 添加属性表单处理
     */
    public function runAddAttr(){
        if(M('attribute')->add($_POST)){
            $this->success('添加属性成功',U(GROUP_NAME.'/Attribute/index'));
        }else{
            $this->error('添加失败');
        }
    }
}