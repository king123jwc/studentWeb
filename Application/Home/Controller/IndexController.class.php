<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index(){
    	$model=M('Active');
    	$sql="select a.*,t.backfield from sw_active as a left join sw_teacherback as t on a.id=t.activeid where a.status=0 and a.isapproval=1";
    	$data=$model->query($sql);
    	// echo "<pre>";print_r($data);echo "</pre>";die();
    	$this->assign('data',$data);
        $this->display();
	}
    public function contact(){

        if(!empty($_POST)){
        	// print_r($_POST);die();
            $Model=D("Contact");
            if ($Model->create()) {
                if($Model->add()){
                    $this->success('添加留言成功',__CONTROLLER__.'/index');
                }else{
                    $this->error('添加留言失败',__CONTROLLER__.'/index');
                }
            }else{
                // 如果表单验证失败
//                die("创建失败");
                $this->error($Model->getError());
                // $roleModel->getError()获取模型失败的原因
                exit;
            }
        }
    }

    public function blog(){
    	$newmodel=M('Schoolnews');
    	$news=$newmodel->where('status=1')->select();
    	// print_r($news);die();
    	$this->assign('news',$news);
       	$this->display();
    }

    public function wqhd(){
    	$model=M('Active');
    	$sql="select * from sw_active where status=1 and isapproval=1";
    	$data=$model->query($sql);
    	// echo "<pre>";print_r($data);echo "</pre>";die();
    	$this->assign('data',$data);
    	$this->display();
    }

    public function portfolio(){
    	$model=M('Active');
    	$sql="select * from sw_active where status=0 and isapproval=1";
    	$data=$model->query($sql);
    	// echo "<pre>";print_r($data);echo "</pre>";die();
    	$this->assign('data',$data);
    	$this->display();
    }

    // 报名
    public function baoming(){
    	if (!empty($_GET)) {
    		// print_r($_GET);die();
    		if (!isset($_SESSION['userid'])) {
    			$this->error('请先登录','../../Admin/admin/admin');
	    	}else{
	    		$model=M('Active');
	    		$sql="select enterid from sw_active WHERE id=".$_GET['id'];
	    		$enterid=$model->query($sql);
	    		// print_r($enterid[0]['enterid']);
	    		// print_r($_SESSION['userid']);
	    		$_POST['enterid']=$enterid[0]['enterid'].$_SESSION['userid'].',';
	    		// echo $enterid;
	    		// die();
	    		$model->create();
	    		if ($model->where('id='.$_GET['id'])->save()) {
	    			$this->success('报名成功','portfolio');
	    		}else{
	    			$this->error('报名失败','portfolio');
	    		}
	    	}
    	}else{
    		$this->error('');
    	}
    	
    }
}
