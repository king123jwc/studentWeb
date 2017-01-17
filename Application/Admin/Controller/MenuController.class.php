<?php
namespace Admin\Controller;
use Tools\AdminController;
// use Think\Controller;

class MenuController extends AdminController {

//    新留言
    public function newMessage(){
        $this->chk_priv('newmessage');
        $contactModel=M('Contact');
        $newcount=$contactModel->where('state=0')->count();
        $where=1;
        $count = $contactModel->where('state=0')->count();
        $Page  = new \Tools\MyPage($count,5);// 实例化分页类
        $pageStr=$Page->fpage(array(2,3,4,5,6,7));
        $this->assign('pageStr',$pageStr);
        $data = $contactModel->where('state=0')->order("id desc")->limit($Page->firstRow.','.$Page->listRows)->select();
//         echo "sql:".$contactModel->getLastSql();
//        print_r($data);
//        die();
        $this->assign('data',$data);// 赋值数据集
        $this->assign('newmessage',$newcount);
        $this->display();
    }

//    已处理留言
    public function handleMessage(){
        $this->chk_priv('handlemessage');
        $boxModel=M('Contact');
        $newcount=$boxModel->where('state=0')->count();
        $count = $boxModel->where('state=1')->count();
        $Page  = new \Tools\MyPage($count,5);// 实例化分页类
        $pageStr=$Page->fpage(array(2,3,4,5,6,7));
        $this->assign('pageStr',$pageStr);
        $data = $boxModel->where('state=1')->order("id desc")->limit($Page->firstRow.','.$Page->listRows)->select();
//         echo "sql:".$boxModel->getLastSql();
//        print_r($data);
//        die();
        $this->assign('data',$data);// 赋值数据集
        $this->assign('newmessage',$newcount);
        $this->display();
    }

//    留言箱
    public function messageBox(){
        $this->chk_priv('messagebox');
        $boxModel=M('Contact');
        $newcount=$boxModel->where('state=0')->count();
        $where=1;
        $count = $boxModel->where($where)->count();
        $Page  = new \Tools\MyPage($count,5);// 实例化分页类
        $pageStr=$Page->fpage(array(2,3,4,5,6,7));
        $this->assign('pageStr',$pageStr);
        $data = $boxModel->order("id desc")->limit($Page->firstRow.','.$Page->listRows)->select();
//         echo "sql:".$boxModel->getLastSql();
//        print_r($data);
//        die();
        $this->assign('data',$data);// 赋值数据集
        $this->assign('newmessage',$newcount);
        $this->display();
    }

//    详情,处理留言
    public function edit($id=0){
        $this->chk_priv('messagebox');
        if($id<=0){
            $this->error('请求不正确');
        }else{
            $model=M('Contact');
            $data['state']=1;
            $model->where("id=$id")->save($data);
            $newcount=$model->where('state=0')->count();
            $data=$model->where("id=$id")->find();
//            print_r($data);die();
            $this->assign('newmessage',$newcount);
            $this->assign('data',$data);
            $this->display();
        }
    }

//    删除单个
    public function del($id=0){
        $this->chk_priv('messagebox');
        if($id<=0){
            $this->error('请求不正确');
        }else{
            $model = M('Contact');
            // 根据ID删除记录
            $model->delete($id);
            $this->success('留言删除成功');
        }
    }

//    批量删除
    public function bdel(){
        $this->chk_priv('messagebox');
//        print_r($_POST);
//        die();
        if (!isset($_POST['dbelid'])||empty($_POST['dbelid'])) {
            $this->error('必须选择要删除的留言');
        }else{
            $model = M('Contact');
            // 把模型的基本信息在删除
            $ids=implode(',', $_POST['dbelid']);
//            var_dump($ids);die;
            $model->where("id IN ($ids)")->delete();
            $this->success('批量删除留言成功');
        }
    }

//    搜索联系人
    public function search(){
        $this->chk_priv('messagebox');
        if(!empty($_GET['searchname'])){
//            echo $_POST['searchname'];
            $model=M('Contact');
            $newcount=$model->where('state=0')->count();
            $where="contactname like'%".$_GET['searchname']."%'";
            $count = $model->where($where)->count();
            if($count==0){
                $this->error('没有搜索结果');
            }
            $Page  = new \Tools\MyPage($count,5);// 实例化分页类
            $pageStr=$Page->fpage(array(2,3,4,5,6,7));
            $this->assign('pageStr',$pageStr);
            $data = $model->where($where)->order("id desc")->limit($Page->firstRow.','.$Page->listRows)->select();
//         echo "sql:".$model->getLastSql();
//        print_r($data);
//        die();
            $this->assign('data',$data);// 赋值数据集
            $this->assign('newmessage',$newcount);
            $this->display();
        }else{
            $this->error('搜索内容不能为空');
        }
    }

}