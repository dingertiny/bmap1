<?php
namespace Home\Controller;
use Think\Controller;
class SuggestfileController extends CommonController {
    
  public function index(){
      $m=M('Suggestfile');
      //分页
      $count=$m->count();
      $page=new \Think\Page($count,5);//实例化分页类 传入总记录数和每页显示的记录数
      
      $page->setConfig('header', '共%TOTAL_ROW%条记录&nbsp;第%NOW_PAGE%页/共%TOTAL_PAGE%页');
      $page->setConfig('prev', '上一页');
      $page->setConfig('next', '下一页');
      $page->setConfig('last', '末页');
      $page->setConfig('first', '首页');
      $page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');

      $show=$page->show();

     /* $arr=$m->relation(true)->limit($page->firstRow.','.$page->listRows)->select();*/
      $arr=$m->limit($page->firstRow.','.$page->listRows)->select();

      $this->assign('list',$arr);
      $this->assign('page',$show);

      $this->display();
  }

  public function dofileup(){
    $m=M('Suggestfile');
    //$m=$d->create();


    $upload=new \Think\Upload();//实例化上传类
    $upload->rootPath='./Public/Uploads/';
    $upload->exts=array('jpg','doc','png');


    $info=$upload->uploadOne($_FILES['filename']);//这个地方要注意：上传文件时注意接收的参数名    
    $m->time=time();


    if(!$info){
      $this->error($upload->getError());
    }else{
      $m->filename=$info['name'];
      $lastId=$m->add();

        if($lastId){
          $this->success('上传成功','index');
        }else{
          $this->error('上传失败');
        }
    }    
  }

  public function del(){
      $m=M('Suggestfile');
      $id=$_GET['id'];
      $count=$m->delete($id); //返回值是影响行数
      if($count>0){
        $this->success('数据删除成功');
      }else{
        $this->error('数据删除失败','index');
      }
    }


}