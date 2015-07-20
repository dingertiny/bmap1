<?php
namespace Home\Controller;
use Think\Controller;
class SchoolController extends Controller {
    

    public function schoolInfo(){
        //AJAX取出学校信息并传给前台
        $schools=M('Schools');

        $Query=$schools->getField('location',true);
      
       	$Query1=$schools->select();
      	
        $arr1=array();
        $arr2=array();
        $location=array();

        
        for($i=0;$i<count($Query);$i++){


           //$array=$schools->query("select ST_AsText('$Query[$i]["location"]')");     
           
            $array=$schools->query("select ST_AsText('$Query[$i]')");   
            $Query1[$i]["location"]= $array; 
    

           //	$replacements2=array();
           	//array_replace($Query, $replacements,$replacements2);
            //$location=$arr1[$i][0];
            //array_push($Query1, $location);
            
        }
       
     	
       $locationjson=json_encode($Query1);
       
       echo $locationjson;
            
    }


    public function searchSchool(){
        //echo "查询成功";
        $searchInfo=$_GET["searchInfo"];
       // dump($searchInfo);
        $m=M('Schools');
        $data['schoolname']=array('like','%'.$searchInfo.'%');
        $arr=$m->where($data)->select();
        $Query=$m->where($data)->getField('location',true);
       
        if($arr){
            
            for($i=0;$i<count($arr);$i++){
                $array=$m->query("select ST_AsText('$Query[$i]')");   
                $arr[$i]["location"]= $array; 
            }

            $arrjson=json_encode($arr);
            echo $arrjson;

        }else{
            echo 0;
        }
       

    }



}