<?php
namespace Home\Controller;
use Think\Controller;
class RegisterController extends Controller {
    
    public function reg(){
    	$this->display();
    }


   //AJAX检测用户名是否被注册
    public function checkName(){
    	$usernamezc=$_GET['usernamezc'];
    	$user=M('User');
    	$where['username']=$usernamezc;
    	$count=$user->where($where)->count();
    	if($count){
    		echo '0';//用户已存在
    	}else{
    		echo '1';//用户不存在，可注册
    	}
    }


    //注册
    public function doReg(){
    	//dump($_POST);
    	/*$usernamezc=$_POST['usernamezc'];
    	$passwordzc=$_POST['passwordzc'];

    	$user=D('User');
    	$user->username=$usernamezc;
    	$user->password=$passwordzc;
    	$result=$user->add();
    	if($result){
    		echo "注册成功";
    	}else{
    		echo "注册失败";
    	}*/

    	$user=D('User');
    	/*if(!$user->create()){
    		$this->error($user->getError());
    	}*/
    	$usernamezc=$_POST['usernamezc'];
    	$passwordzc=$_POST['passwordzc'];
    	$user->create();
    	$user->username=$usernamezc;
    	$user->password=$passwordzc;
    	$lastId=$user->add();
    	
    	if($lastId){
    		$this->redirect('Login/loginbefore');
    		
    	}else{
    		$this->error('注册失败');
    	}


    }

    
  

}