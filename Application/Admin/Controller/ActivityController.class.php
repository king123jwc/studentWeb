<?php
namespace Admin\Controller;
use Tools\AdminController;
// use Think\Controller;

class ActivityController extends AdminController {

//    活动资料
    public function activityData(){
        $this->chk_priv('activitydata');
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
//                 die();
                $up->create();
                // echo "jll";
                // die();
                if($up->add()){
                    if($_POST['status']==0){
                        $this->success("提交活动申请成功");
                        exit();
                    }elseif($_POST['status']==-1){
                        $this->success("已保存到草稿箱");
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
        $sql="select u.unitname,u.id from sw_unit as u where u.level=1 and u.supervisorid=".$_SESSION['userid'];
        $unit=$one->query($sql);
//        print_r($unit[0]);die();
        $two=M('Activeclassify');
        $classify=$two->select();
//        print_r($classify);die();
        $third=M('Unit');
        $sc=$third->where('level=2')->select();
//        echo "<pre>";print_r($sc);echo "</pre>";die();
        $forty=M('Campus');
        $campus=$forty->select();
        $this->assign('campus',$campus);
        $this->assign('sc',$sc);
        $this->assign('classify',$classify);
        $this->assign('unit',$unit[0]);
        $contactModel=M('Contact');
        $newcount=$contactModel->where('state=0')->count();
        $this->assign('newmessage',$newcount);
        $this->display();
    }

//    活动申请
    public function activityApply(){
        $this->chk_priv('activityapply');

        $model=M('Active');
        $sql='select a.*,u.unitname,u.level,c.classifyname,t.id as tid,t.unitid as tunitid,t.activeid,t.comment,t.backfield,t.createtime from sw_active as a
left join sw_teacherback as t on a.id=t.activeid left join sw_unit as u on a.unitid=u.id
 left join sw_activeclassify as c on a.classifyid=c.id where u.level=1 and u.supervisorid=12
  order by a.createtime desc';
        $data=$model->query($sql);
        if($data==array()){
            $kon1='<td style=\'text-align: center;\' colspan=\'9\'><span4>没有申请活动</span4></td>';
            $this->assign('kon1',$kon1);
        }else{
//            echo $_SESSION['userid'];
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

//    活动状态
    public function activityStatus(){
        $this->chk_priv('activitystatus');

        $model=M('Active');
        $sql='select a.*,u.unitname,u.level,c.classifyname from sw_active as a left join sw_unit as u on a.unitid=u.id left join sw_activeclassify as c on a.classifyid=c.id where a.isapproval=1 AND u.level=1 and u.supervisorid='.$_SESSION['userid'].' order by a.createtime desc';
        $data=$model->query($sql);
        if($data==array()){
            $kon1='<td style=\'text-align: center;\' colspan=\'9\'><span4>没有能举办的活动</span4></td>';
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

    public function change($id=0){
        $this->chk_priv('activitydata');
        $model=M('Active');
        if($id<=0){
            $this->error('操作有误');exit();
        }else{
            if($model->where('id='.$id)->setField('status',1)){
                $this->success('修改成功,活动结束');exit;
            }else{
                $this->error('修改失败,重新修改');exit;
            }
        }

    }

//    活动总结
    public function activitySummary(){
        $this->chk_priv('activitysummary');

        $model=M('Active');
        $sql='select a.*,u.unitname,u.level,c.classifyname from sw_active as a left join sw_unit as u on a.unitid=u.id left join sw_activeclassify as c on a.classifyid=c.id where a.status=1 and a.isapproval=1 AND u.level=1 and u.supervisorid='.$_SESSION['userid'].' order by a.createtime desc';
        $data=$model->query($sql);
        if($data==array()){
            $kon1='<td style=\'text-align: center;\' colspan=\'9\'><span4>没有结束的活动</span4></td>';
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

    public function del($id){
        $this->chk_priv('activitydata');
        $model=M('Active');
        $user=$model->where('id='.$id.'')->delete();
        if($user){
            $this->success('删除活动申请成功');
            exit;
        }else{
            $this->error('删除失败,请重新删除');
            exit;
        }
    }

//    总结上传
    public function edit($id=0){
        $this->chk_priv('activitydata');
        if(!empty($_POST)){
            $model=M('Active');
//            print_r($_POST);die();
            if (empty($_POST['summary'])) {
            	$this->error('总结不能为空');exit;
            }
            $_POST['issummary']=1;
            $model->create();
            if($model->save()){
                $this->success('总结上传成功','activitySummary');exit;
            }else{
                $this->error('上传总结失败');exit;
            }
        }
        $model=M('Active');
        $sql='select a.*,u.unitname,u.level,c.classifyname from sw_active as a left join sw_unit as u on a.unitid=u.id left join sw_activeclassify as c on a.classifyid=c.id where a.id='.$id.' and a.status=1 and a.isapproval=1 AND u.level=1 and u.supervisorid='.$_SESSION['userid'].' order by a.createtime desc';
        $data=$model->query($sql);
        if($data==array()){
            $kon1='<td style=\'text-align: center;\' colspan=\'9\'><span4>没有结束的活动</span4></td>';
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

//    总结展示
    public function show($id=0){
        $this->chk_priv('activitydata');

        $model=M('Active');
        $sql='select a.*,u.unitname,u.level,c.classifyname from sw_active as a left join sw_unit as u on a.unitid=u.id left join sw_activeclassify as c on a.classifyid=c.id where a.id='.$id.' and a.status=1 and a.isapproval=1 AND u.level=1 and u.supervisorid='.$_SESSION['userid'].' order by a.createtime desc';
        $data=$model->query($sql);
        if($data==array()){
            $kon1='<td style=\'text-align: center;\' colspan=\'9\'><span4>没有结束的活动</span4></td>';
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

    public function test(){
        if(!empty($_POST)){
            var_dump($_POST['des']);die();
//            $h=htmlspecialchars_decode($str);
//            echo $h;
//            die();
            $model=M('Test');
            $model->create();
            if($model->add()){

                echo "chgl";

                die();
            }else{
                echo "fail";die();
            }
        }
        $model=M('Test');
        $model->create();
        $data=$model->select();
        $this->assign('data',$data);
        $this->display();
    }
}