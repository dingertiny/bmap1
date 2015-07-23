<?php
namespace Home\Controller;
use Think\Controller;
class SuggestController extends Controller {
    
  public function index(){
    $this->show();
  }

  public function dofileup(){
    $d=M('Suggestfile');
   // $d->create();


    $upload=new \Think\Upload();//实例化上传类
    $upload->rootPath='./Public/Uploads/';
    $upload->exts=array('jpg','doc','png');

    $info=$upload->uploadOne($_FILES['filename']);//这个地方要注意：上传文件时注意接收的参数名
    

    if(!$info){
      $this->error($upload->getError());
    }else{
      $d->filename=$info['savename'];
      $lastId=$d->add();

        if($lastId){
          $this->success('上传成功');
        }else{
          $this->error('上传失败');
        }
    }    
  }


}