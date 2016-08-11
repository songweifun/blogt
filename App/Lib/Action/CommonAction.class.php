<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 16/8/5
 * Time: 上午11:38
 */
class CommonAction extends Action{

    public function _initialize(){
        if(!isset($_SESSION['id'])){
            $this->error('没有登录',U('Admin/Login/index'));
        }
    }
}