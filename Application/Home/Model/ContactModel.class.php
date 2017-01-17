<?php
namespace Home\Model;
use Think\Model;

/**
 *
 */
class ContactModel extends Model
{
    // 自动验证的规则$_validate
    protected $_validate = array(
        array('contactname','require','联系人姓名不能为空',1,'regex',3),
        array('contactway','require','联系方式不能为空',1,'regex',3),
        array('message','require','项目留言不能为空',1,'regex',3),
    );
}