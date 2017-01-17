<?php
// 二维数组定义按钮
// 名字最好特殊一点,不冲突

$_menu['学生平台']['修改学生资料']='../Student/changeData';
$_menu['学生平台']['查看评论']='../Student/usedComment';
$_menu['学生平台']['参与过的活动']='../Student/usedActivity';

$_menu['我的申请']['申请创建社团']='../Apply/createUnit';
$_menu['我的申请']['申请社团管理员']='../Apply/applyInfo';
$_menu['我的申请']['申请状态']='../Apply/applyStatus';


$_menu['社团管理']['社团资料修改']='../Unit/communityRevision';
$_menu['社团管理']['社团曾经活动']='../Unit/usedActivity';


$_menu['举办活动']['活动资料']='../Activity/activityData';
$_menu['举办活动']['活动申请']='../Activity/activityApply';
$_menu['举办活动']['活动状态']='../Activity/activityStatus';
$_menu['举办活动']['活动总结']='../Activity/activitySummary';


$_menu['教师平台']['注册教师']='../Teacher/teacher';
$_menu['教师平台']['修改教师资料']='../Teacher/changeData';
$_menu['教师平台']['教师参与活动']='../Teacher/usedActivity';
$_menu['教师平台']['教师活动评论']='../Teacher/usedComment';
$_menu['教师平台']['创建校级单位']='../Teacher/createUnit';
$_menu['教师平台']['管理社团']='../Teacher/tunit';
$_menu['教师平台']['发布活动']='../Teacher/active';
$_menu['教师平台']['活动批复']='../Teacher/pifu';


$_menu['申请回复']['未处理申请']='../Applyback/newApply';
$_menu['申请回复']['已处理申请']='../Applyback/handleApply';
$_menu['申请回复']['所有申请']='../Applyback/allApply';


$_menu['发布学校新闻']['通知处理']='../Notice/handleNotice';
$_menu['发布学校新闻']['发布通知']='../Notice/newNotice';
$_menu['发布学校新闻']['通知草稿箱']='../Notice/drafts';


$_menu['联系我们']['未处理留言']='../Menu/newMessage';
$_menu['联系我们']['已处理留言']='../Menu/handleMessage';
$_menu['联系我们']['留言箱']='../Menu/messageBox';

$_menu['删除']['删除未批准社团申请']='../Delall/deleteunit';
$_menu['删除']['删除未批准申请管理']='../Delall/deleteinfo';

//数组定义按钮和权限的关系
// 如果值是数组那么只要有一个权限就可以显示按钮
$_menuPri['学生平台']=array('schangedata','susedcomment','susedactivity');
$_menuPri['修改学生资料']='schangedata';
$_menuPri['查看评论']='susedcomment';
$_menuPri['参与过的活动']='susedactivity';


$_menuPri['我的申请']=array('createunit','applyinfo','applystatus');
$_menuPri['申请创建社团']='createunit';
$_menuPri['申请社团管理员']='applyinfo';
$_menuPri['申请状态']='applystatus';


$_menuPri['社团管理']=array('communityrevision','stusedactivity');
$_menuPri['社团资料修改']='communityrevision';
$_menuPri['社团曾经活动']='stusedactivity';

$_menuPri['举办活动']=array('activitydata','activityapply','activitystatus','activitysummary');
$_menuPri['活动资料']='activitydata';
$_menuPri['活动申请']='activityapply';
$_menuPri['活动状态']='activitystatus';   //是否批下来了
$_menuPri['活动总结']='activitysummary';


$_menuPri['教师平台']=array('tteacher','tchangedata','tusedactivity','tusedcomment','tcreateunit','tunit','tactive','tpifu');
$_menuPri['注册教师']='tteacher';
$_menuPri['修改教师资料']='tchangedata';
$_menuPri['教师参与活动']='tusedactivity';
$_menuPri['教师活动评论']='tusedcomment';
$_menuPri['创建校级单位']='tcreateunit';
$_menuPri['管理社团']='tunit';
$_menuPri['发布活动']='tactive';
$_menuPri['活动批复']='tpifu';



$_menuPri['申请回复']=array('newapply','handleapply','allapply');
$_menuPri['未处理申请']='newapply';
$_menuPri['已处理申请']='handleapply';
$_menuPri['所有申请']='allapply';


$_menuPri['发布学校新闻']=array('handlenotice','newnotice','drafts');
$_menuPri['通知处理']='handlenotice';
$_menuPri['发布通知']='newnotice';
$_menuPri['通知草稿箱']='drafts';


$_menuPri['联系我们']=array('newmessage','handlemessage','messagebox');
$_menuPri['未处理留言']='newmessage';
$_menuPri['已处理留言']='handlemessage';
$_menuPri['留言箱']='messagebox';


$_menuPri['删除']=array('deleteunit','deleteinfo');
$_menuPri['删除未批准社团申请']='deleteunit';
$_menuPri['删除未批准申请管理']='deleteinfo';

return array(
	'menuList' => $_menu,
	'menuPriList' => $_menuPri,
);




// 根据数组生成按钮
