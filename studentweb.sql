# Host: localhost  (Version: 5.6.11)
# Date: 2016-03-02 15:45:57
# Generator: MySQL-Front 5.3  (Build 4.271)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "sw_active"
#

DROP TABLE IF EXISTS `sw_active`;
CREATE TABLE `sw_active` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unitid` int(11) NOT NULL DEFAULT '0' COMMENT '哪个社团举办',
  `activename` varchar(255) NOT NULL DEFAULT '' COMMENT '活动名称',
  `activeinfo` varchar(255) NOT NULL DEFAULT '' COMMENT '活动简介',
  `activecontact` varchar(255) NOT NULL DEFAULT '' COMMENT '活动内容',
  `people` varchar(255) NOT NULL DEFAULT '' COMMENT '活动负责人',
  `pic` varchar(255) NOT NULL DEFAULT '' COMMENT '活动图片',
  `thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '活动缩略图',
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `classifyid` int(11) NOT NULL DEFAULT '0' COMMENT '活动类型id',
  `holdtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '举办时间',
  `approvalunitid` int(11) NOT NULL DEFAULT '0' COMMENT '审批单位id',
  `fieldid` int(11) NOT NULL DEFAULT '0' COMMENT '申请场地id',
  `planname` varchar(255) NOT NULL DEFAULT '' COMMENT '策划名称',
  `planway` varchar(255) NOT NULL DEFAULT '' COMMENT '上传策划地址',
  `enterid` varchar(255) NOT NULL DEFAULT '' COMMENT '报名用户id',
  `status` tinyint(3) NOT NULL DEFAULT '0' COMMENT '活动状态(1结束)(0正在)(-1草稿箱)',
  `summary` text COMMENT '活动总结zip',
  `issummary` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否上传总结',
  `isapproval` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0没看1同意-1不准',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='活动表';

#
# Data for table "sw_active"
#

INSERT INTO `sw_active` VALUES (1,5,'阳光协会防风','hahahah','具体内容','张三,李四,王五','','Uploads/Apply/2016-02-28/thumb_56d25a7fd630b.jpg','2016-02-14 19:33:12',4,'2015-04-24 05:40:00',1,5,'策划','Uploads/Activity/2016-03-01/56d5865aa4d80.docx',',1,2,101,3,',0,'',0,1),(2,3,'青协活动','hahahah','具体内容','赵六','','Uploads/Apply/2016-02-28/thumb_56d25a7fd630b.jpg','2016-02-14 19:33:57',2,'0000-00-00 00:00:00',1,3,'策划','Uploads/Activity/2016-03-01/56d5865aa4d80.docx',',1,2,101,111111119,',0,'',0,1),(4,5,'商对策','我吃饭吃完rev热','为vc而为广泛V热过头如果让他霍比特人还不如','上次我','Uploads/Activity/2016-03-01/56d5865aa072f.jpg','Uploads/Activity/2016-03-01/thumb_56d5865aa072f.jpg','2016-03-01 20:08:58',4,'2016-03-23 00:00:00',7,0,'成为称为','Uploads/Activity/2016-03-01/56d5865aa4d80.docx','',1,'&lt;p style=&quot;line-height: 16px;&quot;&gt;&lt;img src=&quot;/Public/ueditor/dialogs/attachment/fileTypeImages/icon_rar.gif&quot;/&gt;&lt;a href=&quot;/Public/ueditor/php/upload/20160302/1456889231726806.zip&quot;&gt;锦成网考试助手 - 副本.zip&lt;/a&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;',1,1),(6,5,'撒现实的','成都成都等等','我的测vc额','我的错','Uploads/Activity/2016-03-01/56d587c9eba58.jpg','Uploads/Activity/2016-03-01/thumb_56d587c9eba58.jpg','2016-03-01 20:15:06',1,'2016-03-30 00:00:00',4,0,'单纯','Uploads/Activity/2016-03-01/56d587c9ef109.docx','',1,'',0,1),(7,5,'我','商务车',' 是对的单纯',' 陈','Uploads/Activity/2016-03-01/56d589df7f9e6.jpg','Uploads/Activity/2016-03-01/thumb_56d589df7f9e6.jpg','2016-03-01 20:23:59',3,'2016-03-01 00:00:00',3,0,'说的是','Uploads/Activity/2016-03-01/56d589df84037.docx','',-1,NULL,0,0),(8,1,'cw','cvcsdfvsfdvsf','vdvsvsfvsfvsfv','sfdvsfv','Uploads/Activity/2016-03-02/56d67744d5305.jpg','Uploads/Activity/2016-03-02/thumb_56d67744d5305.jpg','2016-03-02 13:16:53',4,'2016-03-16 17:30:00',0,0,'sdvcsdvsdvsd','Uploads/Activity/2016-03-02/56d67744d81e6.docx','',-1,NULL,0,0),(9,1,'cw','cvcsdfvsfdvsf','vdvsvsfvsfvsfv','sfdvsfv','Uploads/Activity/2016-03-02/56d677feedc2a.jpg','Uploads/Activity/2016-03-02/thumb_56d677feedc2a.jpg','2016-03-02 13:19:59',4,'2016-03-16 17:30:00',0,0,'sdvcsdvsdvsd','Uploads/Activity/2016-03-02/56d677fef0ef3.docx','',-1,NULL,0,0);

#
# Structure for table "sw_activeclassify"
#

DROP TABLE IF EXISTS `sw_activeclassify`;
CREATE TABLE `sw_activeclassify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classifyname` varchar(255) NOT NULL DEFAULT '' COMMENT '活动分类名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "sw_activeclassify"
#

INSERT INTO `sw_activeclassify` VALUES (1,'学风建设类'),(2,'素质拓展类'),(3,'社会公益类'),(4,'理想信念类'),(5,'理想信念类');

#
# Structure for table "sw_activecomment"
#

DROP TABLE IF EXISTS `sw_activecomment`;
CREATE TABLE `sw_activecomment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activeid` int(11) NOT NULL DEFAULT '0' COMMENT '活动id',
  `adminid` varchar(255) NOT NULL DEFAULT '' COMMENT '活动评论人员id',
  `comment` text NOT NULL COMMENT '活动评论',
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '评论创建时间',
  `goods` tinyint(3) NOT NULL DEFAULT '0' COMMENT '好评',
  `bads` tinyint(3) NOT NULL DEFAULT '0' COMMENT '差评',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='活动评论';

#
# Data for table "sw_activecomment"
#

INSERT INTO `sw_activecomment` VALUES (1,1,'1','hahaha我是1','2016-02-14 20:13:05',1,0),(2,1,'5','不错不错','2016-02-14 20:14:12',0,1),(3,2,'3','垃圾活动','2016-02-14 20:14:25',0,1),(4,2,'1','活动真懒','2016-02-14 20:14:55',0,1),(5,1,'6','不错不错','2016-02-14 20:14:12',1,0),(6,1,'1','hahaha我是1','2016-02-14 20:13:05',1,0),(7,2,'1','活动真懒','2016-02-14 20:14:55',0,1),(8,1,'1','hahaha我是1','2016-02-14 20:13:05',1,0),(9,2,'1','活动真懒','2016-02-14 20:14:55',0,1);

#
# Structure for table "sw_admin"
#

DROP TABLE IF EXISTS `sw_admin`;
CREATE TABLE `sw_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num` int(11) NOT NULL DEFAULT '0' COMMENT '学号',
  `username` varchar(255) NOT NULL DEFAULT '' COMMENT '昵称',
  `password` varchar(255) NOT NULL DEFAULT '0' COMMENT '密码',
  `info` varchar(255) NOT NULL DEFAULT '' COMMENT '具体信息(什么学院的/单位的)',
  `root` tinyint(3) NOT NULL DEFAULT '1' COMMENT '权限等级',
  `contactway` varchar(255) NOT NULL DEFAULT '' COMMENT '联系方式',
  `joinactive` varchar(255) NOT NULL DEFAULT '' COMMENT '参与活动',
  `unitid` varchar(255) NOT NULL DEFAULT '' COMMENT '隶属单位',
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

#
# Data for table "sw_admin"
#

INSERT INTO `sw_admin` VALUES (1,131901137,'admin','dfb62feac4ec1ceea61ee5dc3294d8b5','admin',0,'11111111110','1,2','','2016-02-12 22:12:42'),(2,101,'101','eb89f4e469d0bb2c04421d2e98f59412','111111',2,'11111111111','','','2016-02-13 14:55:00'),(3,10,'老师1','eb89f4e469d0bb2c04421d2e98f59412','111111',3,'11111111110','','','2016-02-13 14:56:49'),(4,123,'123','eb89f4e469d0bb2c04421d2e98f59412','111111',1,'11111111222','','','2016-02-13 15:01:46'),(5,1,'','eb89f4e469d0bb2c04421d2e98f59412','111111',1,'11111111119','','','2016-02-13 15:03:46'),(8,2,'2号学生','20ddb07fe26eec3fd6dc2a846ba5654f','1',2,'11111111123','','','2016-02-13 15:28:18'),(9,11,'老师2','eb89f4e469d0bb2c04421d2e98f59412','111111',3,'12311111110','','','2016-02-13 15:31:12');

#
# Structure for table "sw_apply"
#

DROP TABLE IF EXISTS `sw_apply`;
CREATE TABLE `sw_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adminid` int(11) NOT NULL DEFAULT '0' COMMENT '申请学生id',
  `adminpicthumb` varchar(255) NOT NULL DEFAULT '' COMMENT '申请人照片缩略图',
  `instruction` text NOT NULL COMMENT '申请说明',
  `unitid` int(11) NOT NULL DEFAULT '0' COMMENT '申请哪一个社团的管理员',
  `answerunitid` int(11) NOT NULL DEFAULT '0' COMMENT '回复单位id',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '申请状态(0没看/1通过/-1不通过)',
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `teachersay` text NOT NULL COMMENT '教师评语',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

#
# Data for table "sw_apply"
#

INSERT INTO `sw_apply` VALUES (1,1,'Uploads/Apply/2016-02-27/thumb_56d168075a36e.jpg','1号未批准',2,1,0,'2016-02-15 21:21:21','hahahah'),(4,1,'Uploads/Apply/2016-02-27/thumb_56d168075a36e.jpg','',2,1,1,'2016-02-27 16:28:51','hahahah'),(5,1,'Uploads/Apply/2016-02-27/thumb_56d168075a36e.jpg','1号第五次申请',2,4,-1,'2016-02-27 16:32:09','hahahah'),(6,1,'Uploads/Apply/2016-02-27/thumb_56d168075a36e.jpg','第七次申请',3,1,-1,'2016-02-27 17:10:31','hahahah'),(7,1,'Uploads/Apply/2016-02-28/thumb_56d2522586c52.jpg','sdvksdl',2,4,0,'2016-02-28 09:49:25','hahahah'),(8,4,'Uploads/Apply/2016-02-28/thumb_56d25a7fd630b.jpg','dssvsfd',2,1,0,'2016-02-28 10:25:38','hahahah'),(9,4,'Uploads/Apply/2016-02-28/thumb_56d25abf25d3e.jpg','sdcsdvc',2,1,-1,'2016-02-28 10:26:07','hahahah'),(10,1,'Uploads/Apply/2016-02-27/thumb_56d168075a36e.jpg','1号未批准',2,1,0,'2016-02-15 21:21:21',''),(11,1,'Uploads/Apply/2016-02-27/thumb_56d168075a36e.jpg','1号第五次申请',2,4,-1,'2016-02-27 16:32:09',''),(13,1,'Uploads/Apply/2016-02-27/thumb_56d168075a36e.jpg','1号未批准',2,1,1,'2016-02-15 21:21:21',''),(14,1,'Uploads/Apply/2016-02-27/thumb_56d168075a36e.jpg','1号第五次申请',2,4,-1,'2016-02-27 16:32:09',''),(15,1,'Uploads/Apply/2016-02-27/thumb_56d168075a36e.jpg','第七次申请',3,1,-1,'2016-02-27 17:10:31',''),(18,1,'Uploads/Apply/2016-02-27/thumb_56d168075a36e.jpg','1号第五次申请',2,4,-1,'2016-02-27 16:32:09',''),(20,1,'Uploads/Apply/2016-02-27/thumb_56d168075a36e.jpg','1号第五次申请',2,4,-1,'2016-02-27 16:32:09',''),(21,1,'Uploads/Apply/2016-02-27/thumb_56d168075a36e.jpg','第七次申请',3,1,-1,'2016-02-27 17:10:31',''),(25,1,'Uploads/Apply/2016-02-27/thumb_56d168075a36e.jpg','1号未批准',2,3,0,'2016-02-15 21:21:21',''),(26,1,'Uploads/Apply/2016-02-27/thumb_56d168075a36e.jpg','',2,3,1,'2016-02-29 16:28:51','教师第一次评语'),(27,1,'Uploads/Apply/2016-02-27/thumb_56d168075a36e.jpg','1号未批准',2,3,0,'2016-02-15 21:21:21','hahahah'),(28,1,'Uploads/Apply/2016-02-28/thumb_56d2522586c52.jpg','sdvksdl',2,4,0,'2016-02-28 09:49:25','hahahah'),(29,1,'Uploads/Apply/2016-02-27/thumb_56d168075a36e.jpg','1号未批准',2,1,0,'2016-02-15 21:21:21',''),(30,4,'Uploads/Apply/2016-02-28/thumb_56d25a7fd630b.jpg','dssvsfd',2,1,-1,'2016-02-28 10:25:04','hahahah');

#
# Structure for table "sw_campus"
#

DROP TABLE IF EXISTS `sw_campus`;
CREATE TABLE `sw_campus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campusname` varchar(255) DEFAULT NULL COMMENT '校区名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='校区表';

#
# Data for table "sw_campus"
#

INSERT INTO `sw_campus` VALUES (1,'荷花池校区'),(2,'文汇路校区'),(3,'瘦西湖校区'),(4,'淮海路校区'),(5,'扬子津西校区'),(6,'扬子津东校区'),(7,'江阳路南校区'),(8,'江阳路北校区');

#
# Structure for table "sw_contact"
#

DROP TABLE IF EXISTS `sw_contact`;
CREATE TABLE `sw_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contactname` char(32) NOT NULL DEFAULT '',
  `contactway` varchar(255) NOT NULL DEFAULT '',
  `subject` char(32) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `state` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

#
# Data for table "sw_contact"
#

INSERT INTO `sw_contact` VALUES (7,'test7','123','21','123','2016-01-29 19:30:13',0),(10,'test10','王菲','违法','请问','2016-01-29 19:33:14',1),(11,'test11','213','3254','rgtrhnjy6rjrbvjgbihsbgnbksgdhjbkgdlbhjdsgijbsdnbkfdsm vklfdjbdgrgtrhnjy6rjrbvjgbihsbgnbksgdhjbkgdlbhjdsgijbsdnbkfdsm vklfdjbdgrgtrhnjy6rjrbvjgbihsbgnbksgdhjbkgdlbhjdsgijbsdnbkfdsm vklfdjbdgrgtrhnjy6rjrbvjgbihsbgnbksgdhjbkgdlbhjdsgijbsdnbkfdsm vklfdjbdgrgtrhnjy6rjrbvjgbihsbgnbksgdhjbkgdlbhjdsgijbsdnbkfdsm vklfdjbdgrgtrhnjy6rjrbvjgbihsbgnbksgdhjbkgdlbhjdsgijbsdnbkfdsm vklfdjbdg','2016-01-29 19:33:15',1),(12,'test12','12','12','12','2016-01-29 19:35:28',1),(13,'test13','12333','4444','422','2016-01-30 16:31:15',1),(14,'test14','沃达丰','王菲','放到地方的地方地方地方','2016-01-30 16:31:39',0),(15,'xcjkvd','sdvsdvsdv','sdfvsd','sdvsdvsdv','2016-02-01 16:32:56',1);

#
# Structure for table "sw_role"
#

DROP TABLE IF EXISTS `sw_role`;
CREATE TABLE `sw_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rolename` varchar(255) NOT NULL DEFAULT '' COMMENT '身份名称',
  `rolelist` varchar(255) NOT NULL DEFAULT '' COMMENT '权限内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "sw_role"
#

INSERT INTO `sw_role` VALUES (1,'普通学生','schangedata,susedactivity,susedcomment,createunit,applyinfo,applystatus,'),(2,'社团管理人员','schangedata,susedcomment,susedactivity,communityrevision,stusedactivity,activitydata,activityapply,activitystatus,activitysummary,'),(3,'管理老师','tchangedata,tusedactivity,tactive,tusedcomment,tcreateunit,tunit,tpifu,newapply,handleapply,allapply,handlenotice,newnotice,drafts,');

#
# Structure for table "sw_schoolnews"
#

DROP TABLE IF EXISTS `sw_schoolnews`;
CREATE TABLE `sw_schoolnews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unitid` int(11) NOT NULL DEFAULT '0' COMMENT '发布单位',
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '发部时间',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '通知标题',
  `news` text NOT NULL COMMENT '通知内容',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '通知状态(是1否0发部)',
  `newpic` varchar(255) NOT NULL DEFAULT '' COMMENT '通知照片',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

#
# Data for table "sw_schoolnews"
#

INSERT INTO `sw_schoolnews` VALUES (4,6,'2016-03-01 13:38:20','是的从V是的','是的vc是但V舒服',1,'Uploads/notice/2016-02-29/thumb_56d44005ed767.jpg'),(5,3,'2016-02-29 23:40:44','山地车','是首都师范V',0,'Uploads/notice/2016-02-29/thumb_56d4407bb7ee8.jpg'),(6,1,'2016-02-29 20:53:21','秦皇岛搞好生产','是的从V产生的vs',1,'Uploads/notice/2016-02-29/thumb_56d43efc243db.jpg'),(8,6,'2016-02-29 20:53:46','四渡赤水','福成五丰V热管V热个人各大是V是但V',1,'Uploads/notice/2016-02-29/thumb_56d43f59dfd46.jpg'),(9,6,'2016-03-01 13:49:10','131901137','balabalabalabalahahahha',1,'Uploads/notice/2016-02-29/thumb_56d44005ed767.jpg'),(11,6,'2016-02-29 20:56:38','是的从V是的','是的vc是但V舒服',0,'Uploads/notice/2016-02-29/thumb_56d44005ed767.jpg'),(13,6,'2016-03-01 13:54:10','131901137','hhhhhahahah',0,'Uploads/notice/2016-03-01/thumb_56d52e81742f4.jpg'),(14,1,'2016-03-02 12:54:09','dcwcw','wefvewrfvreve',1,'Uploads/notice/2016-03-02/thumb_56d671f098e0f.jpg'),(15,1,'2016-03-02 12:54:19','wfcw','wefcwervwrevw',0,'Uploads/notice/2016-03-02/thumb_56d671fabbb03.jpg');

#
# Structure for table "sw_teacherback"
#

DROP TABLE IF EXISTS `sw_teacherback`;
CREATE TABLE `sw_teacherback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unitid` int(11) NOT NULL DEFAULT '0' COMMENT '教师单位id',
  `activeid` int(11) NOT NULL DEFAULT '0' COMMENT '活动id',
  `comment` text NOT NULL COMMENT '教师策划评论',
  `backfield` varchar(255) NOT NULL DEFAULT '' COMMENT '教师申请场地',
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '教师回复时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='教师回复';

#
# Data for table "sw_teacherback"
#

INSERT INTO `sw_teacherback` VALUES (1,1,1,'好好好','扬子津东区操场','2016-02-14 22:34:51'),(2,1,7,'好好好2号活动','文汇路食堂门口','2016-02-14 22:34:51'),(3,1,9,'','wdcdvcs','2016-03-02 13:19:59'),(4,5,1,'cxcsdvc',' sfdvsfd','2016-03-02 15:41:35'),(5,5,1,'cxcsdvc',' sfdvsfd','2016-03-02 15:41:47'),(6,5,1,'活动1 好','床上叠床','2016-03-02 15:42:23'),(7,5,1,'维C','成为地产','2016-03-02 15:44:43');

#
# Structure for table "sw_unit"
#

DROP TABLE IF EXISTS `sw_unit`;
CREATE TABLE `sw_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unitname` varchar(255) NOT NULL DEFAULT '' COMMENT '社团名称',
  `supervisorid` int(11) NOT NULL DEFAULT '0' COMMENT '社团单位负责人',
  `proposer` int(11) NOT NULL DEFAULT '0' COMMENT '申请人id',
  `peoplethumb` varchar(255) NOT NULL DEFAULT '' COMMENT '社团负责人图片',
  `unitinfo` text NOT NULL COMMENT '社团/单位介绍',
  `unitlogo` varchar(255) DEFAULT '' COMMENT '社团logo',
  `cehua` varchar(255) NOT NULL DEFAULT '' COMMENT '策划书上传',
  `cehuaname` varchar(255) NOT NULL DEFAULT '' COMMENT '策划书名称',
  `level` tinyint(3) NOT NULL DEFAULT '0' COMMENT '社团单位级别(批准是1(社团),老师是2,不批准是-1,刚刚申请是0)',
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '申请时间',
  `holdtime` date NOT NULL DEFAULT '0000-00-00' COMMENT '社团成立时间',
  `isfirst` int(1) NOT NULL DEFAULT '0' COMMENT '是否第一次修改时间',
  `teachersay` text NOT NULL COMMENT '教师评语',
  `answerunitid` int(11) NOT NULL DEFAULT '1' COMMENT '社团审批单位(人id)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COMMENT='隶属单位(学校)';

#
# Data for table "sw_unit"
#

INSERT INTO `sw_unit` VALUES (1,'校团委',3,0,'','这里是校团委啊balabalabalabalabala','','','',2,'2016-02-12 20:46:37','0000-00-00',0,'',1),(2,'校级阳光协会',101,1,'Uploads/Apply/unit/2016-02-27/thumb_56d1703a99b55.jpg','阳光啊','','Uploads/Apply/unit/2016-02-27/56d1703aa7230.docx','策划名称',-1,'2016-02-14 19:28:21','0000-00-00',0,'haohaoahohahahah',4),(3,'校级青年志愿者协会',2,1,'Uploads/Apply/unit/2016-02-27/thumb_56d1703a99b55.jpg','青协啊','','Uploads/Apply/unit/2016-02-27/56d1703aa7230.docx','策划名称',-1,'2016-02-14 19:29:38','0000-00-00',0,'',1),(4,'校财务处',9,0,'','财务处','','','',2,'2016-02-15 20:41:22','0000-00-00',0,'',9),(5,'信息工程旅行社',1,1,'Uploads/Apply/unit/2016-02-27/thumb_56d1703a99b55.jpg','信息工程xueyuanhahah','Uploads/Unit/logo/2016-03-01/thumb_56d5b9cad891d.jpg','Uploads/Apply/unit/2016-02-15/56c1e0d713c51.docx','',1,'2016-02-15 22:29:43','2016-12-05',1,'haohaoaho',9),(6,'X院团委 ',1,1,'Uploads/Apply/unit/2016-02-27/thumb_56d178d86f063.jpg','说的','','Uploads/Apply/unit/2016-02-27/56d178d87138c.doc','的',2,'2016-02-27 18:22:16','0000-00-00',0,'',9),(7,'商院哈哈哈哈',1,1,'Uploads/Apply/unit/2016-02-27/thumb_56d1703a99b55.jpg','','','Uploads/Apply/unit/2016-02-27/56d1703aa7230.docx','策划名称',1,'2016-02-27 17:45:30','2016-12-12',0,'hahahahhahahah',3),(8,'尚未形成',4,1,'Uploads/Apply/unit/2016-02-27/thumb_56d178d86f063.jpg','说的','','Uploads/Apply/unit/2016-02-27/56d178d87138c.doc','的',1,'2016-02-27 18:22:16','0000-00-00',0,'hahahah',1),(9,'sdcdvcdv',4,4,'Uploads/Apply/unit/2016-02-28/thumb_56d25a4578d88.jpg','wdvcsdv','','Uploads/Apply/unit/2016-02-28/56d25a457cff1.docx','cwdvwd',1,'2016-02-28 10:24:05','0000-00-00',0,'',4),(10,'',0,2,'Uploads/Apply/unit/2016-02-27/thumb_56d1703a99b55.jpg','','','Uploads/Apply/unit/2016-02-27/56d1703aa7230.docx','策划名称',-1,'2016-02-28 14:39:51','0000-00-00',0,'hahahah',3),(11,'商院哈哈哈哈',1,1,'Uploads/Apply/unit/2016-02-27/thumb_56d1703a99b55.jpg','','','Uploads/Apply/unit/2016-02-27/56d1703aa7230.docx','策划名称',-1,'2016-02-27 17:45:30','0000-00-00',0,'hahahahhahahah',3),(15,'尚未形成',1,1,'Uploads/Apply/unit/2016-02-27/thumb_56d178d86f063.jpg','说的','','Uploads/Apply/unit/2016-02-27/56d178d87138c.doc','的',0,'2016-02-27 18:22:16','0000-00-00',0,'hahahah',4),(16,'sdcdvcdv',4,4,'Uploads/Apply/unit/2016-02-28/thumb_56d25a4578d88.jpg','wdvcsdv','','Uploads/Apply/unit/2016-02-28/56d25a457cff1.docx','cwdvwd',0,'2016-02-28 10:24:05','0000-00-00',0,'',3),(18,'X院社联',4,4,'Uploads/Apply/unit/2016-02-28/thumb_56d25a4578d88.jpg','wdvcsdv','','Uploads/Apply/unit/2016-02-28/56d25a457cff1.docx','cwdvwd',2,'2016-02-28 10:24:05','0000-00-00',0,'',4),(19,'尚未形成',1,1,'Uploads/Apply/unit/2016-02-27/thumb_56d178d86f063.jpg','说的','','Uploads/Apply/unit/2016-02-27/56d178d87138c.doc','的',0,'2016-02-27 18:22:16','0000-00-00',0,'',4),(20,'sdcdvcdv',4,4,'Uploads/Apply/unit/2016-02-28/thumb_56d25a4578d88.jpg','wdvcsdv','','Uploads/Apply/unit/2016-02-28/56d25a457cff1.docx','cwdvwd',1,'2016-02-28 10:24:05','2012-12-23',0,'',3),(21,'sdcdvcdv',4,4,'Uploads/Apply/unit/2016-02-28/thumb_56d25a4578d88.jpg','wdvcsdv','','Uploads/Apply/unit/2016-02-28/56d25a457cff1.docx','cwdvwd',0,'2016-02-28 10:24:05','0000-00-00',0,'',4),(22,'尚未形成',1,1,'Uploads/Apply/unit/2016-02-27/thumb_56d178d86f063.jpg','说的','','Uploads/Apply/unit/2016-02-27/56d178d87138c.doc','的',0,'2016-02-27 18:22:16','0000-00-00',0,'hahahah',4),(23,'sdcdvcdv',4,4,'Uploads/Apply/unit/2016-02-28/thumb_56d25a4578d88.jpg','wdvcsdv','','Uploads/Apply/unit/2016-02-28/56d25a457cff1.docx','cwdvwd',0,'2016-02-28 10:24:05','0000-00-00',0,'hahahah',4),(24,'尚未形成',1,1,'Uploads/Apply/unit/2016-02-27/thumb_56d178d86f063.jpg','说的','','Uploads/Apply/unit/2016-02-27/56d178d87138c.doc','的',0,'2016-02-27 18:22:16','0000-00-00',0,'hahahah',1),(25,'sdcdvcdv',4,4,'Uploads/Apply/unit/2016-02-28/thumb_56d25a4578d88.jpg','wdvcsdv','','Uploads/Apply/unit/2016-02-28/56d25a457cff1.docx','cwdvwd',0,'2016-02-28 10:24:05','0000-00-00',0,'hahahahhahahah',9),(26,'尚未形成',1,1,'Uploads/Apply/unit/2016-02-27/thumb_56d178d86f063.jpg','说的','','Uploads/Apply/unit/2016-02-27/56d178d87138c.doc','的',0,'2016-02-27 18:22:16','0000-00-00',0,'hahahah',9),(27,'sdcdvcdv',4,4,'Uploads/Apply/unit/2016-02-28/thumb_56d25a4578d88.jpg','wdvcsdv','','Uploads/Apply/unit/2016-02-28/56d25a457cff1.docx','cwdvwd',0,'2016-02-28 10:24:05','0000-00-00',0,'hahahah',3),(28,'尚未形成',1,1,'Uploads/Apply/unit/2016-02-27/thumb_56d178d86f063.jpg','说的','','Uploads/Apply/unit/2016-02-27/56d178d87138c.doc','的',0,'2016-02-27 18:22:16','0000-00-00',0,'haohaoahohahahah',3),(29,'sdcdvcdv',4,4,'Uploads/Apply/unit/2016-02-28/thumb_56d25a4578d88.jpg','wdvcsdv','','Uploads/Apply/unit/2016-02-28/56d25a457cff1.docx','cwdvwd',0,'2016-02-28 10:24:05','0000-00-00',0,'',3),(30,'尚未形成',1,1,'Uploads/Apply/unit/2016-02-27/thumb_56d178d86f063.jpg','说的','','Uploads/Apply/unit/2016-02-27/56d178d87138c.doc','我是30',-1,'2016-02-27 18:22:16','0000-00-00',0,'社团第一次评论',1),(31,'sdcdvcdv',4,4,'Uploads/Apply/unit/2016-02-28/thumb_56d25a4578d88.jpg','wdvcsdv','','Uploads/Apply/unit/2016-02-28/56d25a457cff1.docx','cwdvwd',0,'2016-02-28 10:24:05','0000-00-00',0,'',1),(32,'尚未形成',1,1,'Uploads/Apply/unit/2016-02-27/thumb_56d178d86f063.jpg','说的','','Uploads/Apply/unit/2016-02-27/56d178d87138c.doc','的',0,'2016-02-27 18:22:16','0000-00-00',0,'hahahah',1),(33,'当初是的vc双方的',1,1,'Uploads/Apply/unit/2016-02-28/thumb_56d2a57cbb0b6.jpg','我但V吃的V发','','Uploads/Apply/unit/2016-02-28/56d2a57cbd3de.doc','但我vc的',0,'2016-02-28 15:45:01','0000-00-00',0,'',4),(34,'尚未形成',1,1,'Uploads/Apply/unit/2016-02-27/thumb_56d178d86f063.jpg','说的','','Uploads/Apply/unit/2016-02-27/56d178d87138c.doc','的',0,'2016-02-27 18:22:16','0000-00-00',0,'hahahah',1),(35,'尚未形成',1,1,'Uploads/Apply/unit/2016-02-27/thumb_56d178d86f063.jpg','说的','','Uploads/Apply/unit/2016-02-27/56d178d87138c.doc','的',0,'2016-02-27 18:22:16','0000-00-00',0,'haohaoaho',1),(36,'尚未形成',8,1,'Uploads/Apply/unit/2016-02-27/thumb_56d178d86f063.jpg','说的','','Uploads/Apply/unit/2016-02-27/56d178d87138c.doc','的',1,'2016-02-27 18:22:16','0000-00-00',0,'hahahah',1),(37,'sxwcw',1,1,'Uploads/Apply/unit/2016-03-01/thumb_56d5bc5c86649.jpg','cewcwcwd','','','',2,'2016-03-01 23:59:24','2016-03-28',0,'',1);
