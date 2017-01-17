<?php
namespace Admin\Controller;
use Tools\AdminController;
// use Think\Controller;

class DelallController extends AdminController {

//    删除未批准社团申请
    public function deleteUnit(){
        $this->chk_priv('deleteunit');
        $model=M('Unit');
        $count=$model->where('level=-1')->count();
//        echo $count;
        $sql="select u.*,a.num,a.username,a.contactway from sw_unit as u left join sw_admin as a on u.proposer=a.id where u.level = -1";
        if(!empty($_GET['page'])){
            $page=$_GET['page'];
        }else{
            $page=0;
        }
        $data=$this->fenye($model,$count,5,$sql,$page);
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';die();
        $this->assign('data',$data);

        $contactModel=M('Contact');
        $newcount=$contactModel->where('state=0')->count();
        $this->assign('newmessage',$newcount);
        $this->display();
    }

//  删除未批准申请管理
    public function deleteInfo(){
        $this->chk_priv('deleteinfo');
        $model=M('Apply');
        $count=$model->where('status=-1')->count();
//        echo $count;die();
        $sql="select u.unitname,a.num,a.username,a.contactway,b.* from sw_apply as b left join sw_admin as a on b.adminid=a.id left join sw_unit as u on u.id=b.unitid where b.status=-1";
        if(!empty($_GET['page'])){
            $page=$_GET['page'];
        }else{
            $page=0;
        }
        $data=$this->fenye($model,$count,5,$sql,$page);
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';die();
        $this->assign('data',$data);

        $contactModel=M('Contact');
        $newcount=$contactModel->where('state=0')->count();
        $this->assign('newmessage',$newcount);
        $this->display();
    }

//    分页
    public function fenye($model,$count,$size,$sql,$page){

        $Page  = new \Tools\MyPage($count,$size);// 实例化分页类
        $pageStr=$Page->fpage(array(2,3,4,5,6,7));
        if($page!==0){
            $pageNow=($page-1)*$size;
            $pagerow=$count-$pageNow;
            if($pagerow>=$size){
                $pagelist=$size;
            }else{
                $pagelist=$pagerow;
            }
        }else{
            $pageNow=0;
            $pagelist=$size;
        }
        $this->assign('pageStr',$pageStr);
        $sql=$sql." limit $pageNow,$pagelist";
        $data = $model->query($sql);
        return $data;
    }


    //    删除单个
    public function delinfo($id=0){
        $this->chk_priv('deleteinfo');
        if($id<=0){
            $this->error('请求不正确');
        }else{
            $model = M('Apply');
            // 根据ID删除记录
            $model->delete($id);
            $this->success('删除成功',"deleteinfo");
        }
    }

    //    删除单个
    public function delunit($id=0){
        $this->chk_priv('deleteunit');
        if($id<=0){
            $this->error('请求不正确');
        }else{
            $model = M('Unit');
            // 根据ID删除记录
            $model->delete($id);
            $this->success('删除成功',"deleteunit");
        }
    }

//    批量删除
    public function bdelinfo(){
        $this->chk_priv('deleteinfo');
        if (!isset($_POST['dbelid'])||empty($_POST['dbelid'])) {
            $this->error('必须选择要删除的申请');
        }else{
            $model = M('Apply');
            // 把模型的基本信息在删除
            $ids=implode(',', $_POST['dbelid']);
//            var_dump($ids);die;
            $model->where("id IN ($ids)")->delete();
            $this->success('批量删除申请成功','deleteinfo');
        }
    }

    //    批量删除
    public function bdelunit(){
        $this->chk_priv('deleteunit');
        if (!isset($_POST['dbelid'])||empty($_POST['dbelid'])) {
            $this->error('必须选择要删除的申请');
        }else{
            $model = M('Unit');
            // 把模型的基本信息在删除
            $ids=implode(',', $_POST['dbelid']);
//            var_dump($ids);die;
            $model->where("id IN ($ids)")->delete();
            $this->success('批量删除申请成功','deleteunit');
        }
    }
}