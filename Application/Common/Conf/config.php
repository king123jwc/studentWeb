<?php
// 配置参考手册 附录-配置参考(所有能配置的项)
// 核心配置目录 
return array(
	// 'TMPL_ENGINE_TYPE' => 'PHP',  // 不使用TP的模板标签

	// 页面底部显示跟踪信息
	'SHOW_PAGE_TRACE'  =>  false,

	// 默认的首页面的控制器
	'DEFAULT_MODULE'  =>  'Home',
	//'配置项'=>'配置值'
	'DB_TYPE' =>'mysql',
	'DB_HOST' =>'localhost',
	'DB_NAME' =>'studentweb',  // 数据库名称
	'DB_USER' =>'root',
	'DB_PWD'  =>  '',  // 密码
    'DB_PORT' =>  '',  // 端口 默认3306
    'DB_PREFIX' =>  'sw_',  // 数据库表前缀
    "ERROR_PAGE"=>'/Public/404.html',

  //   'TMPL_ACTION_ERROR'     => 'error.html', 
 	// 'TMPL_ACTION_SUCCESS'   => 'success.html',

    'LOAD_EXT_CONFIG'=>'privilege, menus',// 加载扩展配置文件
);