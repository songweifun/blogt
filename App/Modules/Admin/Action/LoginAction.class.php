<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 16/8/4
 * Time: 下午8:12
 */

class LoginAction extends Action{
    public function index(){
        $this->display();
    }

    //生成验证码
    public function verify(){
        import('Class.Image',APP_NAME);
        Image::buildImageVerify();
    }

    //登录验证
    public  function login(){
        //p($_SESSION['verify']);echo '<br>';p(I('verify','','md5'));die;
        if($_SESSION['verify']!=I('code','','md5')){
            $this->error('验证码不正确',U(GROUP_NAME.'/Login/index'));
        }

        $user=M('user')->where(array('username'=>I('username')))->find();
        if(!$user || I('password','','md5')!=$user['password']) $this->error('用户名或密码不正确',U(GROUP_NAME.'/Login/index'));
        $data=array(
          'id'=>$user['id'],
            'logintime'=>time(),
            'loginip'=>get_client_ip()
        );

        M('user')->save($data);

        session('id',$user['id']);
        session('username',$user['username']);
        session('logintime',date('Y-m-d H:i:s',$user['logintime']));
        session('loginip',$user['loginip']);

        redirect(U(GROUP_NAME.'/Index/index'));
    }

    public function logout(){
        session_unset();
        session_destroy();
        redirect(U(GROUP_NAME.'/Index/index'));


    }
}