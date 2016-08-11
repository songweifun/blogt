<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 16/8/5
 * Time: 下午4:45
 */
class SystemAction extends CommonAction{


    //数据库配置

    public function setDb(){
        $this->display();
    }

    //数据库配置表单处理
    public function setDbHandel(){
        //p(CONF_PATH);die;
        if(F('db',$_POST,CONF_PATH)){
            $this->success('数据库配置成功',U(GROUP_NAME.'/System/setDb'));
        }else{
            $this->error('您没有权限配置db.php',U(GROUP_NAME.'/System/setDb'));
        }
    }
}