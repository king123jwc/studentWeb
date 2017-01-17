<?php
namespace Admin\Controller;
use Tools\AdminController;
// use Think\Controller;

class StudentController extends AdminController {
//    修改学生资料
    public function changeData(){
        $this->chk_priv('schangedata');
        if(!empty($_POST)){
            $_POST['password']=md5(md5($_POST['password']).'1368');
            $model=M('Admin');
            $model->create();
            if($model->save()){
                $this->success('修改学生个人资料成功');
                exit();
            }else{
                $this->error('修改个人资料失败,请重新修改');
                exit();
            }
//            print_r($_POST);die();
        }
        $adminId=$_SESSION['userid'];
        $model=M('Admin');
        $data=$model->where('id='.$adminId)->find();
//        print_r($data);
//        die();
        $this->assign('adminId',$adminId);
        $this->assign('data',$data);
        $contactModel=M('Contact');
        $newcount=$contactModel->where('state=0')->count();
        $this->assign('newmessage',$newcount);
        $this->display();
    }


//    查看学生评论
    public function usedComment(){
        $this->chk_priv('susedcomment');

        $model=M('Activecomment');
        $adminId=$_SESSION['userid'];

        $count = $model->where('adminid='.$adminId)->count();
        $Page  = new \Tools\MyPage($count,5);// 实例化分页类
        $pageStr=$Page->fpage(array(2,3,4,5,6,7));
        if(!empty($_GET['page'])){
//            echo "jl;";die();
            $page=$_GET['page'];
            $pageNow=($page-1)*5;
            $pagerow=$count-$pageNow;
            if($pagerow>=5){
                $pagelist=5;
            }else{
                $pagelist=$pagerow;
            }
        }else{
            $pageNow=0;
            $pagelist=5;
        }
        $this->assign('pageStr',$pageStr);
        $sql="select d.activename,d.holdtime,c.* from sw_activecomment as c left join sw_active d on c.activeid=d.id WHERE c.adminid=$adminId ORDER BY c.id desc limit $pageNow,$pagelist";
        $data = $model->query($sql);
//            ->order("id")->limit($Page->firstRow.','.$Page->listRows)->select();
//         echo "sql:".$model->getLastSql();
//        print_r($data);
//        die();
        $this->assign('data',$data);// 赋值数据集

        $contactModel=M('Contact');
        $newcount=$contactModel->where('state=0')->count();
        $this->assign('newmessage',$newcount);
        $this->display();
    }


//    查看学生过去活动
    public function usedActivity(){
        $this->chk_priv('susedactivity');

        $model=M('Active');
        $active=$model->where("isapproval=1 AND enterid like '%,".$_SESSION['userid'].",%'")->select();
//        echo '<pre>';
//        print_r($active);
//        echo '</pre>';
        if(empty($active)){
            $this->assign('kon','您还没有参加任何活动,快去参加吧');
        }else{
          $sql="select a.*,b.classifyname,t.backfield,u.unitname from sw_active as a left join sw_activeclassify as b on a.classifyid=b.id left join sw_teacherback as t on a.id=t.activeid left join sw_unit as u on a.unitid=u.id where a.isapproval=1 AND a.enterid like '%,".$_SESSION['userid'].",%' order by a.id";
            $data = $model->query($sql);
            $this->assign('data',$data);
            $newmodel=M('Activecomment');
            $lv=array();
            foreach($data as $k=>$v){
                $lv[$v['id']][goods]=$newmodel->where('activeid='.$v['id'].' And goods=1')->count();
                $lv[$v['id']][bads]=$newmodel->where('activeid='.$v['id'].' And bads=1')->count();
                if($lv[$v['id']][goods]+$lv[$v['id']][bads]==0){
                    $lv[$v['id']][lv]=50;
                }else{
                    $lv[$v['id']][lv1]=round($lv[$v['id']][goods]/($lv[$v['id']][goods]+$lv[$v['id']][bads]),3)*100;
                }
                $lv[$v['id']][lv2]=round(100-$lv[$v['id']][lv1],3);
            }

            $this->assign('lv',$lv);
//            echo '<pre>';
//            print_r($lv);
//            echo '</pre>';
//            die();
        }

        $contactModel=M('Contact');
        $newcount=$contactModel->where('state=0')->count();
        $this->assign('newmessage',$newcount);
        $this->display();
    }



//    删除单个
    public function del($id=0){
        $this->chk_priv('susedcomment');
        if($id<=0){
            $this->error('请求不正确');
        }else{
            $model = M('Activecomment');
            // 根据ID删除记录
            if($model->delete($id)){
                $this->success('评论删除成功');
            }else{
                $this->error('评论删除失败');
            }
        }
    }

//    批量删除
    public function bdel(){
        $this->chk_priv('susedcomment');
//        print_r($_POST);
//        die();
        if (!isset($_POST['dbelid'])||empty($_POST['dbelid'])) {
            $this->error('必须选择要删除的留言');
        }else{
//            print_r($_POST);die();
            $model = M('Activecomment');
            // 把模型的基本信息在删除
            $ids=implode(',', $_POST['dbelid']);
//            var_dump($ids);die;
            if($model->where("id IN ($ids)")->delete()){
                $this->success('批量评论留言成功');
            }else{
                $this->error('批量评论留言失败');
            }

        }
    }

//    搜索联系人
    public function search(){
        $this->chk_priv('susedcomment');
        if(!empty($_GET['searchname'])){
//            echo $_GET['searchname'];die();
            $model=M('Activecomment');
            $adminId=$_SESSION['userid'];

            $count=$model->where("adminid=$adminId AND comment like '%".$_GET['searchname']."%'")->count();
            if($count==0){
                $this->error('没有搜索结果');
                exit();
            }

            $count = $model->where('adminid='.$adminId)->count();
            $Page  = new \Tools\MyPage($count,5);// 实例化分页类
            $pageStr=$Page->fpage(array(2,3,4,5,6,7));
            if(!empty($_GET['page'])){
//            echo "jl;";die();
                $page=$_GET['page'];
                $pageNow=($page-1)*5;
                $pagerow=$count-$pageNow;
                if($pagerow>=5){
                    $pagelist=5;
                }else{
                    $pagelist=$pagerow;
                }
            }else{
                $pageNow=0;
                $pagelist=5;
            }
            $this->assign('pageStr',$pageStr);
            $sql="select d.activename,d.holdtime,c.* from sw_activecomment as c left join sw_active d on c.activeid=d.id WHERE c.adminid=$adminId AND c.comment like '%".$_GET['searchname']."%' ORDER BY c.id desc limit $pageNow,$pagelist";
            $data = $model->query($sql);
//            ->order("id")->limit($Page->firstRow.','.$Page->listRows)->select();
//         echo "sql:".$model->getLastSql();
//        print_r($data);
//        die();

            $this->assign('data',$data);// 赋值数据集

            $contactModel=M('Contact');
            $newcount=$contactModel->where('state=0')->count();
            $this->assign('newmessage',$newcount);
            $this->display();
        }else{
            $this->error('搜索内容不能为空');
        }
    }
}