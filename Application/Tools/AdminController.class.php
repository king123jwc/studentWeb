<?php

namespace Tools;
use Think\Controller;

/**
* 
*/
class AdminController extends Controller
{
	// 相当于构造函数(就是相当于已经调用了父类方法)---自动运行
	function _initialize(){

		// if (empty($_SESSION['usernum']) && $_SESSION['usernum']!=0) {
		if (empty($_SESSION['usernum'])) {
			// echo $_SESSION['usernum'];
			// die();
			$this->error('请先登录',__MODULE__.'/Admin/admin');
		}

		 $menuList = C('menuList');
         // 取出按钮与权限对应的数组
         $menuPriList = C('menuPriList');


//         $adminPris = explode(',', $_SESSION['action_list']);
// var_dump($adminPris);//这个数组是拿到的,是数据库里那张那张权限表里的,三个都是有的
//          echo $_SESSION['userroot'];
//         echo '<pre>';
//         print_r($menuList);
//         echo '</pre>';echo '<pre>';
//         print_r($menuPriList);//这个数组里少了两个
//         echo '</pre>';
//         echo $_SESSION['userroot'];
//         die();

         if($_SESSION['userroot'] != 0)
         {
             $adminPris = explode(',', $_SESSION['action_list']);
             foreach ($menuList as $k => $v)
             {
                 if(is_array($menuPriList[$k]))
                 {
                     $_arr = array_intersect($adminPris, $menuPriList[$k]);
                     // 如果没有这个按钮的权限就把按钮从数组中删除
                     if(empty($_arr))
                     {
                         unset($menuList[$k]);
                         // 如果删除了第一个按钮，那么直接循环第二个顶级按钮
                         continue ;
                     }
                 }
                 else
                 {
                     if(!in_array($menuPriList[$k], $adminPris))
                     {
                         unset($menuList[$k]);
                         // 如果删除了第一个按钮，那么直接循环第二个顶级按钮
                         continue ;
                     }
                 }
                 foreach ($v as $k1 => $v1)
                 {
                     // 先取出这个二组按钮需要的权限
                     if(!in_array($menuPriList[$k1], $adminPris))
                         unset($menuList[$k][$k1]);
                 }

             }

         }
//         echo $_SESSION['userroot'];
//         print_r($menuList);
//         die();
         $this->assign('menuList', $menuList);
	}

	// $priv 要验证的权限的名字
	function chk_priv($priv){
		// 从session中取出这个管理员的权限 //addrole,delrole
		// $_SESSION['action_list'];  //应该是以字符串的形式存在
		// 判断一个字符串是否在另一个字符串中出现
		// 函数:strpos 返回值:返回值是出现的位置,如果没有出现就返回false
		// 如果是第一个出现就返回0,所以必须要恒等于false  (===)


		// 总管理员拥有全部权限,不能修改权限
		if ($_SESSION['userroot']==0) {
			return TRUE;
		}

		// 问题:判断用户有没有add权限 (有addrole也会判断)
		// 解决方法:两边加个逗号判断即可  ,add,   ,addrole,
		if (strpos(','.$_SESSION['action_list'].',', ','.$priv.',') === FALSE) {
			$this->error('您没有这个权限');  //跳转(第二个参数不传就跳转到上一个页面)
			exit();
		}
	}
}