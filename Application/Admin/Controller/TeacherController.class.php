<?php
namespace Admin\Controller;
use Tools\AdminController;
// use Think\Controller;

// 注意教师创办社团不能社团的负责人重复

class TeacherController extends AdminController {

    public function createUnit(){
        $this->chk_priv('tcreateunit');

        if(!empty($_POST)){
//             print_r($_POST) ;die();
            $onemodle=M('Unit');

            $_POST['proposer']=$_POST['supervisorid'];
            $count=$onemodle->where("unitname like '%".$_POST['unitname']."%'")->count();
            if ($count!=0) {
                $this->error('社团已经存在');
                exit();
            }
            // print_r($_FILES['peoplethumb']);die();
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
//            print_r($_FILES);
//            if(!$upload->exts){
//                $this->error('上传文件格式有误');
//            }
//
//            die();
            $upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath  =     'Apply/unit/'; // 设置附件上传（子）目录
            $upload->replace = true; //存在同名文件是否是覆盖
            // 是否使用子目录保存上传文件
            $upload->autoSub = true;
//                  echo "<pre>";
//            var_dump($_FILES);
//            echo "</pre>";
//        die();
            // 上传文件
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else {// 上传成功
                $countarray=count($info);
//                echo $countarray;
                if($countarray !== 1){
                    $this->error('文件上传格式有误,请重新申请');
                    exit;
                }
//                 echo "<pre>";
//                print_r($info);
//                 echo "</pre>";
//                die();
                // print_r($_POST['cehua']);

// 保存表单数据 包括附件数据
                // echo "<pre>";
                // print_r($info['peoplethumb']);
                // echo "</pre>";
                // echo $k;
                // die();
                $up = M('Unit'); // 实例化对象
                //缩略图 文件保存地址
                $timage = "./Public/Uploads/" . $info['peoplethumb']['savepath'] . $info['peoplethumb']['savename'];
                // die($timage);
                //上传数据库
                $_POST['pic'] = "Uploads/".$info['peoplethumb']['savepath'] . $info['peoplethumb']['savename'];//保存图片路径


                //----- 创建缩略图 -----//
                // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
                $spath = "./Public/Uploads/".$info['peoplethumb']['savepath']."thumb_".$info['peoplethumb']['savename']; //缩略图名称 地址
                $this->thumbs($timage,$spath,140,100);
                $_POST['peoplethumb'] = "Uploads/".$info['peoplethumb']['savepath']."thumb_".$info['peoplethumb']['savename'];//保存缩略图片路径
//                 print_r($_POST);
//                 die();
                $up->create();
                // echo "jll";
                // die();
                if($up->add()){
                    $this->success("创建社团成功");
                    exit();
                }else{
                    // 判断当前是否是调试模式,如果是调试模式就打印出sql语句
                    if(definded('APP_DEBUG')){
                        // tp中的给出的方法,查出上一条语句
                        echo "sql:".$up->getLastSql();
                        exit();
                    }else{
                        $this->error('发生未知错误,添加失败');
                        exit();
                    }
                }

            }
        }
        $model=M('Unit');
        $sql="select a.id as aid,u.* from sw_unit as u left join sw_admin as a on u.supervisorid=a.id where level=2";
        $tunit=$model->query($sql);
        $this->assign('tunit',$tunit);
        $contactModel=M('Contact');
        $newcount=$contactModel->where('state=0')->count();
        $this->assign('newmessage',$newcount);
        $this->display();
    }

//    修改教师资料
    public function changeData(){
        $this->chk_priv('tchangedata');
        if(!empty($_POST)){
            $_POST['password']=md5(md5($_POST['password']).'1368');
            $model=M('Admin');
            $model->create();
            if($model->save()){
                $this->success('修改教师个人资料成功');
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

    // 注册教师
    public function teacher(){
        $this->chk_priv('tteacher');
        if (!empty($_POST)) {
            // print_r($_POST);die();
            $model=D('Admin');
            $salt = '1368';
            $_POST['password'] = md5(md5($_POST['password']).$salt);
            if ($model->create()) {
//                echo $_POST['password'];
//                print_r($_POST);
//                die();
                if ($model->add()) {

                    $this->success('注册成功');
                    exit;
                } else {
                    // 判断当前是否是调试模式,如果是调试模式就打印出sql语句
                    if (definded('APP_DEBUG')) {
//          tp中的给出的方法,查出上一条语句
                        echo "sql:" . $model->getLastSql();
                    } else {
                        $this->error('发生未知错误,请重试');
                    }
                }
            } else {
                // 如果表单验证失败
                $this->error($model->getError());
                // $roleModel->getError()获取模型失败的原因
                exit;
            }
        }
        $contactModel=M('Contact');
        $newcount=$contactModel->where('state=0')->count();
        $this->assign('newmessage',$newcount);
        $this->display();
    }


//    查看教师评论
    public function usedComment(){
        $this->chk_priv('tusedcomment');

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


//    查看教师过去活动
    public function usedActivity(){
        $this->chk_priv('tusedactivity');

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
//            print_r($data);
//            echo '</pre>';
//            die();
        }
//        die();

        $contactModel=M('Contact');
        $newcount=$contactModel->where('state=0')->count();
        $this->assign('newmessage',$newcount);
        $this->display();
    }

//    管理社团
    public function tunit(){
        $this->chk_priv('tunit');

        $model=M('Unit');
//        echo $_SESSION['userid'];die();
        if($_SESSION['userid']==1){
            $sql="select u.*,a.num,a.username from sw_unit as u left join sw_admin as a on u.supervisorid=a.id where u.level > 0";
        }else{
            $sql="select u.*,a.num,a.username from sw_unit as u left join sw_admin as a on u.supervisorid=a.id where u.level=1 AND u.answerunitid=".$_SESSION['userid']." or u.supervisorid=".$_SESSION['userid']." AND u.level=2";
        }

        $data=$model->query($sql);
        $count=count($data);
//        echo $count;die();
        if(!empty($_GET['page'])){
            $page=$_GET['page'];
        }else{
            $page=1;
        }
        $data=$this->fenye($model,$count,5,$sql,$page);
//        echo "<pre>";print_r($data);echo "</pre>";die();
        $this->assign('data',$data);
        $contactModel=M('Contact');
        $newcount=$contactModel->where('state=0')->count();
        $this->assign('newmessage',$newcount);
        $this->display();
    }

    public function unitedit($id){
        $this->chk_priv('tunit');
        if($id<=0){
            $this->error('请求不正确');
            exit();
        }
        $model=M('Unit');
        $sql="select u.*,a.num,a.username,a.contactway from sw_unit as u left join sw_admin as a on u.supervisorid=a.id where u.id=".$id;
        $data=$model->query($sql);
//        echo "<pre>";print_r($data);echo "</pre>";die();
        $this->assign('data',$data);
        $contactModel=M('Contact');
        $newcount=$contactModel->where('state=0')->count();
        $this->assign('newmessage',$newcount);
        $this->display();
    }
//  删除活动
    public function delA($id=0){
        $this->chk_priv('pifu');
        if($id<=0){
            $this->error('请求不正确');
        }else{
            $model = M('Active');
            // 根据ID删除记录
            if($model->delete($id)){
                $this->success('删除活动成功');
            }else{
                $this->error('删除活动失败');
            }
        }
    }

//    删除单个
    public function del($id=0){
        $this->chk_priv('tusedcomment');
        if($id<=0){
            $this->error('请求不正确');
        }else{
            $model = M('Unit');
            // 根据ID删除记录
            if($model->delete($id)){
                $this->success('删除社团成功');
            }else{
                $this->error('删除社团失败');
            }
        }
    }

//    发布活动
    public function active(){
        $this->chk_priv('tactive');
        if(!empty($_POST) || !empty($_FILES)){
//             print_r($_POST);die();
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif','docx','doc', 'png', 'jpeg');// 设置附件上传类型
//            print_r($_FILES);
//            if(!$upload->exts){
//                $this->error('上传文件格式有误');
//            }
//
//            die();
            $upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath  =     'Activity/'; // 设置附件上传（子）目录
            $upload->replace = true; //存在同名文件是否是覆盖
            // 是否使用子目录保存上传文件
            $upload->autoSub = true;
//                  echo "<pre>";
//            var_dump($_FILES);
//            echo "</pre>";
//        die();
            // 上传文件
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else {// 上传成功
                $countarray=count($info);
//                echo $countarray;
                if($countarray !== 2){
                    $this->error('文件上传格式有误,请重新申请');
                    exit;
                }
//                 echo "<pre>";
//                print_r($info);
//                 echo "</pre>";
//                die();
                $_POST['pic']="Uploads/".$info['pic']['savepath'] . $info['pic']['savename'];
                $_POST['planway']="Uploads/".$info['planway']['savepath'] . $info['planway']['savename'];
                // print_r($_POST['cehua']);

// 保存表单数据 包括附件数据
                // echo "<pre>";
                // print_r($info['peoplethumb']);
                // echo "</pre>";
                // echo $k;
                // die();
                $up = M('Active'); // 实例化对象
                //缩略图 文件保存地址
                $timage = "./Public/Uploads/" . $info['pic']['savepath'] . $info['pic']['savename'];
                // die($timage);


                //----- 创建缩略图 -----//
                // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
                $spath = "./Public/Uploads/".$info['pic']['savepath']."thumb_".$info['pic']['savename']; //缩略图名称 地址
                $this->thumbs($timage,$spath,$_POST['thumbsize'],$_POST['thumbsize']);
                $_POST['thumb'] = "Uploads/".$info['pic']['savepath']."thumb_".$info['pic']['savename'];//保存缩略图片路径
//                 print_r($_POST);
//                die();
                $up->create();
                // echo "jll";
                // die();
                $activeid=$up->add();
                $_POST['activeid']=$activeid;
//                echo $activeid;die();
                if($activeid){

                    $tmodel=M('Teacherback');
                    $tmodel->create();
                    if($tmodel->add()){
                        if($_POST['status']==0){
                            $this->success("活动创办成功");
                            exit();
                        }elseif($_POST['status']==-1){
                            $this->success("已保存到草稿箱");
                            exit();
                        }
                    }else{
                        $this->error('发生未知错误');
                        exit();
                    }

                }else{
                    // 判断当前是否是调试模式,如果是调试模式就打印出sql语句
                    if(definded('APP_DEBUG')){
                        // tp中的给出的方法,查出上一条语句
                        echo "sql:".$up->getLastSql();
                        exit();
                    }else{
                        $this->error('发生未知错误,添加失败');
                        exit();
                    }
                }

            }
        }
        $one=M('Unit');
        $sql="select u.unitname,u.id from sw_unit as u where u.level=2 and u.supervisorid=".$_SESSION['userid'];
        $unit=$one->query($sql);
//        print_r($unit[0]);die();
        $two=M('Activeclassify');
        $classify=$two->select();
//        print_r($classify);die();
        $third=M('Unit');
        $this->assign('classify',$classify);
        $this->assign('unit',$unit[0]);
        $contactModel=M('Contact');
        $newcount=$contactModel->where('state=0')->count();
        $this->assign('newmessage',$newcount);
        $this->display();
    }

    public function unitA($id=0){
        $this->chk_priv('tpifu');
        if(!empty($_POST)){
//            print_r($_POST);die();
            $amodel=M('Teacherback');
            $amodel->create();
            if($amodel->add()){
                $bmodel=M('Active');
                $bmodel->create();
                if($bmodel->where('id='.$_POST['activeid'])->save()){
                    $this->success('处理成功','pifu');exit;
                }else{
                    $this->success('处理成功2','pifu');exit;
                }
            }else{
                $this->error('处理失败,请重新处理');exit;
            }
        }
        $model=M('Active');
        $sql='select cs.campusname,ad.num,ad.username,ad.contactway,a.*,u.unitname,u.level,c.classifyname from sw_active as a
left join sw_unit as u on a.unitid=u.id
left join sw_activeclassify as c on a.classifyid=c.id
left join sw_admin as ad on u.supervisorid=ad.id
left join sw_campus as cs on a.fieldid=cs.id
where a.id='.$id;
        $data=$model->query($sql);
        $this->assign('data',$data);
//        echo '<pre>';
//            print_r($data);
//            echo '</pre>';
//            die();
        $contactModel=M('Contact');
        $newcount=$contactModel->where('state=0')->count();
        $this->assign('newmessage',$newcount);
        $this->display();
    }


//    活动批复
    public function pifu(){

        $this->chk_priv('tpifu');
        $tmodel=M('Unit');
        $unitid=$tmodel->where('level=2 AND supervisorid='.$_SESSION['userid'])->getField('id');
//        echo $unitid;die();

        $model=M('Active');
        $sql='select cs.campusname,ad.num,ad.username,ad.contactway,a.*,u.unitname,u.level,c.classifyname from sw_active as a
left join sw_unit as u on a.unitid=u.id
left join sw_activeclassify as c on a.classifyid=c.id
left join sw_admin as ad on u.supervisorid=ad.id
left join sw_campus as cs on a.fieldid=cs.id
where a.approvalunitid='.$unitid.' and a.isapproval=0 and a.status=0 order by a.createtime desc';
        $data=$model->query($sql);
//        echo $_SESSION['userid'];
//                echo '<pre>';
//            print_r($data);
//            echo '</pre>';
//            die();
        $count=count($data);
//        echo $count;die();
        if(!empty($_GET['page'])){
            $page=$_GET['page'];
        }else{
            $page=1;
        }
        $data=$this->fenye($model,$count,5,$sql,$page);
        if($data==array()){
            $kon1='<td style=\'text-align: center;\' colspan=\'10\'><span4>没有申请活动</span4></td>';
            $this->assign('kon1',$kon1);
        }else{
//                echo '<pre>';
//            print_r($data);
//            echo '</pre>';
//            die();
            $this->assign('data',$data);
        }
        $contactModel=M('Contact');
        $newcount=$contactModel->where('state=0')->count();
        $this->assign('newmessage',$newcount);
        $this->display();
    }

    public function thumbs($image,$spath,$height=150,$width=150){ //传入图片

        $this->chk_priv('tunit');
        $Image = new \Think\Image(); // 给avator.jpg 图片添加logo水印
        $Image->open($image);
        // 生成一个固定大小为150*150的缩略图并保存为thumb.jpg
        $Image->thumb($height, $width,\Think\Image::IMAGE_THUMB_FIXED)->save($spath);
        // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
        //$image->thumb($height,$width)->save($tpath.$thumbname);
        //将图片裁剪为400x400并保存为corp.jpg
        //$image->crop($height,$width)->save('./crop.jpg');
        return  $spath;//时间戳加后缀

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
//        echo $sql;
//        die();
        $data = $model->query($sql);
        return $data;
    }


//    搜索联系人
//    public function search(){
//        $this->chk_priv('tusedcomment');
//        if(!empty($_GET['searchname'])){
////            echo $_GET['searchname'];die();
//            $model=M('Activecomment');
//            $adminId=$_SESSION['userid'];
//
//            $count=$model->where("adminid=$adminId AND comment like '%".$_GET['searchname']."%'")->count();
//            if($count==0){
//                $this->error('没有搜索结果');
//                exit();
//            }
//
//            $count = $model->where('adminid='.$adminId)->count();
//            $Page  = new \Tools\MyPage($count,5);// 实例化分页类
//            $pageStr=$Page->fpage(array(2,3,4,5,6,7));
//            if(!empty($_GET['page'])){
////            echo "jl;";die();
//                $page=$_GET['page'];
//                $pageNow=($page-1)*5;
//                $pagerow=$count-$pageNow;
//                if($pagerow>=5){
//                    $pagelist=5;
//                }else{
//                    $pagelist=$pagerow;
//                }
//            }else{
//                $pageNow=0;
//                $pagelist=5;
//            }
//            $this->assign('pageStr',$pageStr);
//            $sql="select d.activename,d.holdtime,c.* from sw_activecomment as c left join sw_active d on c.activeid=d.id WHERE c.adminid=$adminId AND c.comment like '%".$_GET['searchname']."%' ORDER BY c.id desc limit $pageNow,$pagelist";
//            $data = $model->query($sql);
////            ->order("id")->limit($Page->firstRow.','.$Page->listRows)->select();
////         echo "sql:".$model->getLastSql();
////        print_r($data);
////        die();
//
//            $this->assign('data',$data);// 赋值数据集
//
//            $contactModel=M('Contact');
//            $newcount=$contactModel->where('state=0')->count();
//            $this->assign('newmessage',$newcount);
//            $this->display();
//        }else{
//            $this->error('搜索内容不能为空');
//        }
//    }

}