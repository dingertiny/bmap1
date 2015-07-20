<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller {
    public function verify(){
    	
    	$config=array(
    		'fontSize'=>20,
    		'length'=>4,
    		'useNoise'=>false,//是否有杂点
    		'imageH'=>45,
    		);

    	$verify=new \Think\Verify($config);
    	$verify->entry();
    }

}