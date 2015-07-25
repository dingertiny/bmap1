<?php
namespace Home\Model;
use Think\Model;
	class SuggestfileModel extends Model{
		protected $_auto=array(
				//array(填充字段，填充内容，[填充条件，附加规则])
				//array('time','time',1,'function')//self::MODEL_INSERT
				/*array('uid','getId',1,'callback'),*/
			);

		/*protected function getId(){
			return $_SESSION['id'];
		}*/

		/*protected $_link = array(
        	'User'=>array(
           		'mapping_type'=> self::BELONGS_TO,//关联模型
            	'class_name' => 'User',//要关联的模型类名
            	'foreign_key'=>'uid',//关联的外键名称
            	'mapping_name'=>'user',//关联的映射名称，用于获取数据用
            	'mapping_fields'=>'username',//关联要查询的字段（只显示该字段）
            	'as_fields'=>'username',//直接把关联的字段值映射成数据对象中的某个字段
            	//'as_fields'=>'username:uname',//如果有冲突可改名字
          
            ),
        );*/
	}

?>