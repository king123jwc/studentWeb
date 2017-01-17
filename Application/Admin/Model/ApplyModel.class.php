<?php
namespace Admin\Model;
use Think\Model;

/**
 *
 */
class ApplyModel extends Model
{
    // 自动验证的规则$_validate
    protected $_validate = array(
        array('adminid' ,'','您已经是社团管理人员,不得重复申请',1,'unique',3),
    );
}