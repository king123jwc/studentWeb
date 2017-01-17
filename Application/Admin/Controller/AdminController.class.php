<?php
namespace Admin\Controller;
use Think\Controller;
/**
 *  登陆页面
 */
class AdminController extends Controller
{
    public function admin(){
        if(!empty($_POST)){
            // 先来验证验证码是否正确
            $verify=new \Think\Verify();
            if (!$verify->check(I('post.checkcode'))) {
                $this->error('验证码不正确');  //第二个参数,是跳转的地址,如果不传则返回上一页
            }

            $adminModel = D('Admin');
            if (!$adminModel->login($_POST['num'],$_POST['password'])) {
                $this->error('学号或密码错误');
                exit;
            }else{
                $this->success('登陆成功',__MODULE__.'/Main/index');
                exit;
            }
        }
        $this->display();
    }

    public function authCode(){
        // 生成验证码
        $Verify = new \Think\Verify();
//        $Verify->useImgBg = true;
        $Verify->fontSize = 20;
        $Verify->length   = 4;
        $Verify->imageH  =50;  //验证码高度
        $Verify->imageW  =200; //验证码宽度
//        $Verify->codeSet = '';   //验证码只用数字
        $Verify->entry();
    }

//    注册账号
    public function sign(){
        if(!empty($_POST)) {
            $roleModel = D('Admin');
            // 接收表单并验证表单
            $salt = '1368';
            $_POST['password'] = md5(md5($_POST['password']).$salt);
            if ($roleModel->create()) {
//                echo $_POST['password'];
//                print_r($_POST);
//                die();
                if ($roleModel->add()) {

                    $this->success('注册成功', __CONTROLLER__ . '/admin');
                    exit;
                } else {
                    // 判断当前是否是调试模式,如果是调试模式就打印出sql语句
                    if (definded('APP_DEBUG')) {
//			tp中的给出的方法,查出上一条语句
                        echo "sql:" . $roleModel->getLastSql();
                    } else {
                        $this->error('发生未知错误,请重试');
                    }
                }
            } else {
                // 如果表单验证失败
                $this->error($roleModel->getError());
                // $roleModel->getError()获取模型失败的原因
                exit;
            }
        }
    }
}