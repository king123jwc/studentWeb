<?php
// 二维数组定义按钮
// 名字最好特殊一点,不冲突
// $_menu['角色管理']['角色列表']='../Role/lst';
// $_menu['角色管理']['添加角色']='../Role/add';
// $_menu['模型管理']['添加模型']='../Model/add';
// $_menu['模型管理']['模型列表']='../Model/lst';
// $_menu['管理员管理']['管理员列表']='../AdminUser/lst';
// $_menu['管理员管理']['添加管理员']='../AdminUser/add';
// $_menu['栏目管理']['添加栏目']='../Category/add';
// $_menu['栏目管理']['栏目列表']='../Category/lst';
// $_menu['模型管理']['添加模型']='../Model/add';
// $_menu['模型管理']['模型列表']='../Model/lst';

$_menu['学生平台']['修改学生资料']='../Student/changeData';
$_menu['学生平台']['查看评论']='../Student/usedComment';
$_menu['学生平台']['查看参与的活动']='../Student/usedActivity';


$_menu['申请社团管理员']['申请说明']='../Apply/applyInfo';
$_menu['申请社团管理员']['申请状态']='../Apply/applyStatus';


$_menu['社团管理']['社团资料修改']='../Unit/communityRevision';
$_menu['社团管理']['社团曾经活动']='../Unit/usedActivity';


$_menu['举办活动']['活动资料']='../Activity/activityData';
$_menu['举办活动']['活动申请']='../Activity/activityApply';
$_menu['举办活动']['活动状态']='../Activity/activityStatus';
$_menu['举办活动']['活动总结']='../Activity/activitySummary';


$_menu['教师平台']['修改教师资料']='../Teacher/changeData';
$_menu['教师平台']['查看评论']='../Teacher/usedComment';
$_menu['教师平台']['查看参与的活动']='../Teacher/usedActivity';


$_menu['申请回复']['未处理申请']='../Applyback/newApply';
$_menu['申请回复']['已处理申请']='../Applyback/handleApply';
$_menu['申请回复']['所有申请']='../Applyback/allApply';


$_menu['发布学校通知']['通知处理']='../Notice/handlenotice';
$_menu['发布学校通知']['发布通知']='../Notice/newNotice';
$_menu['发布学校通知']['通知草稿箱']='../Notice/drafts';


$_menu['联系我们']['未处理留言']='../Menu/newMessage';
$_menu['联系我们']['已处理留言']='../Menu/handleMessage';
$_menu['联系我们']['留言箱']='../Menu/messageBox';

//数组定义按钮和权限的关系
// 如果值是数组那么只要有一个权限就可以显示按钮
$_menuPri['学生平台']=array('changedata','usedactivity','usedcomment');
$_menuPri['修改学生资料']='changedata';
$_menuPri['查看评论']='usedcomment';
$_menuPri['查看参与的活动']='usedactivity';


$_menuPri['申请社团管理员']=array('applyinfo','applystatus');
$_menuPri['申请说明']='applyinfo';
$_menuPri['申请状态']='applystatus';


$_menuPri['社团管理']=array('communityrevision','usedactivity');
$_menuPri['社团资料修改']='communityrevision';
$_menuPri['社团曾经活动']='usedactivity';


$_menuPri['举办活动']=array('activitydata','activityapply','activitystatus','activitysummary');
$_menuPri['活动资料']='activitydata';
$_menuPri['活动申请']='activityapply';
$_menuPri['活动状态']='activitystatus';   //是否批下来了
$_menuPri['活动总结']='activitysummary';


$_menuPri['教师平台']=array('changedata','usedactivity','usedcomment');
$_menuPri['修改教师资料']='changedata';
$_menuPri['查看参与的活动']='usedactivity';
$_menuPri['查看评论']='usedcomment';


$_menuPri['申请回复']=array('newapply','handleapply','allapply');
$_menuPri['未处理申请']='newapply';
$_menuPri['已处理申请']='handleapply';
$_menuPri['所有申请']='allapply';


$_menuPri['发布学校通知']=array('handlenotice','newnotice','drafts');
$_menuPri['通知处理']='handlenotice';
$_menuPri['发布通知']='newnotice';
$_menuPri['通知草稿箱']='drafts';


$_menuPri['联系我们']=array('newmessage','handlemessage','messagebox');
$_menuPri['未处理留言']='newmessage';
$_menuPri['已处理留言']='handlemessage';
$_menuPri['留言箱']='messagebox';


return array(
	'menuList' => $_menu,
	'menuPriList' => $_menuPri,
);




// 根据数组生成按钮