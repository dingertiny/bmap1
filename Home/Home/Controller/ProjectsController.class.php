<?php
namespace Home\Controller;
use Think\Controller;
class ProjectsController extends CommonController {
    
  public function index(){
      $m=M('Projects');
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



}