<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    
    public function loginbefore(){ 
    	$this->display();
    }

    public function loginafter(){
        $this->display();
    }

    //登录
    public function doLogin(){
        //接受值
        //判断用户在数据库中是否存在
        //存在 允许登录
        //不存在 显示错误信息

        //echo I('post.username');

        //dump($_POST);
        $username=$_POST['username'];
        $password=$_POST['password'];
        $code=$_POST['code'];

       /* if(!$this->check_verify($code,$id)){
            $this->error('验证码错误！');
        }*/

        $m=M('User');
        $where['username']=$username;
        $where['password']=$password;

        $arr=$m->field('id')->where($where)->find();
        if($arr){
            $_SESSION['username']=$username;
            $_SESSION['id']=$arr['id'];
            $this->success('用户登录成功',U('Login/loginafter'));
        }else{
            $this->error('该用户不存在');
        }
      

    }


    //退出
    public function doLogout(){
        $_SESSION=array();
        if(isset($_COOKIE[session_name()])){
            setcookie(session_name(),'',time()-1,'/');
        }
        session_destroy();
        $this->redirect('Login/loginbefore');
    }



}