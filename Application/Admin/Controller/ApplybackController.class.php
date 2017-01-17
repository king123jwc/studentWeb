<?php
namespace Admin\Controller;
use Tools\AdminController;
// use Think\Controller;

class ApplybackController extends AdminController {

//    新申请
    public function newApply(){
        $this->chk_priv('newapply');
        $model1=M('Unit');
//        echo $count;die();
        $sql1="select u.*,a.num,a.username,a.contactway from sw_unit as u left join sw_admin as a on u.proposer=a.id where u.level = 0 AND u.answerunitid=".$_SESSION['userid']." order by u.createtime desc";
        $data1=$model1->query($sql1);
//        echo '<pre>';
//        print_r($data1);
//        echo '</pre>';die();
        $this->assign('data1',$data1);

        $model2=M('Apply');
        $count2=$model2->where('status=0 AND answerunitid=1')->count();
//        echo $_SESSION['userid'];
//        echo $count2;die();
        $sql2="select u.unitname,a.num,a.username,a.contactway,b.* from sw_apply as b left join sw_admin as a on b.adminid=a.id left join sw_unit as u on u.id=b.unitid where b.status=0 AND b.answerunitid=".$_SESSION['userid']." order by b.createtime desc";
        $data2=$model2->query($sql2);
//        echo '<pre>';
//        print_r($data2);
//        echo '</pre>';die();
        $this->assign('data2',$data2);

        $contactModel=M('Contact');
        $newcount=$contactModel->where('state=0')->count();
        $this->assign('newmessage',$newcount);
        $this->display();
    }

//    已处理申请
    public function handleApply(){
        $this->chk_priv('handleapply');
        $model1=M('Unit');
//        echo $count;die();
        $sql1="select u.*,a.num,a.username,a.contactway from sw_unit as u left join sw_admin as a on u.proposer=a.id where u.level = 1 AND u.answerunitid=".$_SESSION['userid']." order by u.createtime desc";
        $data1=$model1->query($sql1);
//        echo '<pre>';
//        print_r($data1);
//        echo '</pre>';die();
        $this->assign('data1',$data1);

        $model2=M('Apply');
//        echo $_SESSION['userid'];
//        echo $count2;die();
        $sql2="select u.unitname,a.num,a.username,a.contactway,b.* from sw_apply as b left join sw_admin as a on b.adminid=a.id left join sw_unit as u on u.id=b.unitid where b.status=1 AND b.answerunitid=".$_SESSION['userid']." order by b.createtime desc";
        $data2=$model2->query($sql2);
//        echo '<pre>';
//        print_r($data2);
//        echo '</pre>';die();
        $this->assign('data2',$data2);

        $contactModel=M('Contact');
        $newcount=$contactModel->where('state=0')->count();
        $this->assign('newmessage',$newcount);
        $this->display();
    }

//    所有留言
    public function allApply(){
        $this->chk_priv('allapply');
        $model1=M('Unit');
//        echo $count;die();
        $sql1="select u.*,a.num,a.username,a.contactway from sw_unit as u left join sw_admin as a on u.proposer=a.id where u.answerunitid=".$_SESSION['userid']." order by u.createtime desc";
        $data1=$model1->query($sql1);
//        echo '<pre>';
//        print_r($data1);
//        echo '</pre>';die();
        $this->assign('data1',$data1);

        $model2=M('Apply');
//        echo $_SESSION['userid'];
//        echo $count2;die();
        $sql2="select u.unitname,a.num,a.username,a.contactway,b.* from sw_apply as b left join sw_admin as a on b.adminid=a.id left join sw_unit as u on u.id=b.unitid where b.answerunitid=".$_SESSION['userid']." order by b.createtime desc";
        $data2=$model2->query($sql2);
//        echo '<pre>';
//        print_r($data2);
//        echo '</pre>';die();
        $this->assign('data2',$data2);

        $contactModel=M('Contact');
        $newcount=$contactModel->where('state=0')->count();
        $this->assign('newmessage',$newcount);
        $this->display();
    }

//    详情,处理留言apply
    public function editApply($id=0){
        $this->chk_priv('allapply');
        $model=M('Apply');
        $amodel=M('Admin');
        if(!empty($_POST['status'])){
//            print_r($_POST);die();
            $adata['root'] = 2;
            $data['status']=$_POST['status'];
            $data['teachersay']=$_POST['teachersay'];
            if($model->where('id='.$_POST['id'])->data($data)->save() && $amodel->where('id='.$_POST['adminid'])->data($adata)->save()){
                $this->success('处理申请成功');
                exit;
            }else{
                $this->error('处理申请失败');
                exit;
            }

        }

        if($id<=0){
            $this->error('请求不正确');
        }else{
            $sql="select u.unitname,a.num,a.username,a.contactway,b.* from sw_apply as b left join sw_admin as a on b.adminid=a.id left join sw_unit as u on u.id=b.unitid where b.id=".$id;
            $data=$model->query($sql);
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';die();
            $this->assign('data',$data);

            $contactModel=M('Contact');
            $newcount=$contactModel->where('state=0')->count();
            $this->assign('newmessage',$newcount);
            $this->display();
        }
    }

    //    详情,处理留言unit
    public function editUnit($id=0){
        $this->chk_priv('allapply');
        $model=M('Unit');
        if(!empty($_POST['level'])){
//            print_r($_POST);die();
            $data['level']=$_POST['level'];
            $data['teachersay']=$_POST['teachersay'];
            if($model->where('id='.$_POST['id'])->data($data)->save()){
                $this->success('处理申请成功');
                exit;
            }else{
                $this->error('处理申请失败');
                exit;
            }

        }

        if($id<=0){
            $this->error('请求不正确');
        }else{
            $sql="select u.*,a.num,a.username,a.contactway from sw_unit as u left join sw_admin as a on u.proposer=a.id where u.id=".$id;
            $data=$model->query($sql);
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';die();
            $this->assign('data',$data);

            $contactModel=M('Contact');
            $newcount=$contactModel->where('state=0')->count();
            $this->assign('newmessage',$newcount);
            $this->display();
        }
    }

////    删除单个
//    public function del($id=0){
//        $this->chk_priv('messagebox');
//        if($id<=0){
//            $this->error('请求不正确');
//        }else{
//            $model = M('Contact');
//            // 根据ID删除记录
//            $model->delete($id);
//            $this->success('留言删除成功');
//        }
//    }
//
////    批量删除
//    public function bdel(){
//        $this->chk_priv('messagebox');
////        print_r($_POST);
////        die();
//        if (!isset($_POST['dbelid'])||empty($_POST['dbelid'])) {
//            $this->error('必须选择要删除的留言');
//        }else{
//            $model = M('Contact');
//            // 把模型的基本信息在删除
//            $ids=implode(',', $_POST['dbelid']);
////            var_dump($ids);die;
//            $model->where("id IN ($ids)")->delete();
//            $this->success('批量删除留言成功');
//        }
//    }
//
////    搜索联系人
//    public function search(){
//        $this->chk_priv('messagebox');
//        if(!empty($_GET['searchname'])){
////            echo $_POST['searchname'];
//            $model=M('Contact');
//            $newcount=$model->where('state=0')->count();
//            $where="contactname like'%".$_GET['searchname']."%'";
//            $count = $model->where($where)->count();
//            if($count==0){
//                $this->error('没有搜索结果');
//            }
//            $Page  = new \Tools\MyPage($count,5);// 实例化分页类
//            $pageStr=$Page->fpage(array(2,3,4,5,6,7));
//            $this->assign('pageStr',$pageStr);
//            $data = $model->where($where)->order("id desc")->limit($Page->firstRow.','.$Page->listRows)->select();
////         echo "sql:".$model->getLastSql();
////        print_r($data);
////        die();
//            $this->assign('data',$data);// 赋值数据集
//            $this->assign('newmessage',$newcount);
//            $this->display();
//        }else{
//            $this->error('搜索内容不能为空');
//        }
//    }
//
//    //    分页
//    public function fenye($model,$count,$size,$sql,$page){
//
//        $Page  = new \Tools\MyPage($count,$size);// 实例化分页类
//        $pageStr=$Page->fpage(array(2,3,4,5,6,7));
//        if($page!==0){
//            $pageNow=($page-1)*$size;
//            $pagerow=$count-$pageNow;
//            if($pagerow>=$size){
//                $pagelist=$size;
//            }else{
//                $pagelist=$pagerow;
//            }
//        }else{
//            $pageNow=0;
//            $pagelist=$size;
//        }
//        $this->assign('pageStr',$pageStr);
//        $sql=$sql." limit $pageNow,$pagelist";
//        $data = $model->query($sql);
//        return $data;
//    }

}