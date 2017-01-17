<?php
namespace Admin\Controller;
use Tools\AdminController;
// use Think\Controller;

 class MainController extends AdminController {

     public function index(){
         $contactModel=M('Contact');
         $count=$contactModel->where('state=0')->count();
//         echo $count;die();
         $this->assign('newmessage',$count);
         $this->display();
     }

//     退出后台
     public function layout(){
         $_SESSION=array();
         $this->success('退出成功',__MODULE__.'/Admin/admin');
     }
 }