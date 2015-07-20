<?php
namespace Home\Model;
use Think\Model;
	class UserModel extends Model{

		//自动验证
		protected $_validate=array(
			//array('code','require','验证码必须填写!'),
			array('code','checkCode','验证码错误123!',0,'callback',1),
			//array('username','require','用户必须填写!'),
			//array('username','','用户已经存在',0,'unique',1),
			//array('username','/^\w{6,}$/','用户名必须6个字母以上',0,'regex',1),
			//array('password','require','密码必须填写!'),
			array('repasswordzc','passwordzc','确认密码不正确',0,'confirm'), 
		);

		//利用自动完成实现登录密码的md5加密
		/*protected $_auto=array(
				array('password','md5',1,'function'),
			);*/


		public function check_verify($code,$id=''){
			$verify=new \Think\Verify();
			return $verify->check($code,$id);
		}

		protected function checkCode($code){
			if(!$this->check_verify($code,$id)){
				return false;
			}else{
				return true;
			}
		}
	}

?>