<?php
namespace Admin\Controller;
use Tools\AdminController;
// use Think\Controller;

class ApplyController extends AdminController {
    // 申请创建社团
    function createUnit(){
        $this->chk_priv('createunit');

        if(!empty($_POST)){
            // echo $_POST['unitname'];die();
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
            $upload->exts      =     array('jpg', 'gif','docx','doc', 'png', 'jpeg');// 设置附件上传类型
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
                if($countarray !== 2){
                    $this->error('文件上传格式有误,请重新申请');
                    exit;
                }
//                 echo "<pre>";
//                print_r($info);
//                 echo "</pre>";
//                die();
               $_POST['cehua']="Uploads/".$info['cehua']['savepath'] . $info['cehua']['savename'];
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
                    // print_r($_POST);
                    // die();
                    $up->create();
                        // echo "jll";
                        // die();
                        if($up->add()){
                            $this->success("提交申请成功");
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

    // 申请社团管理员
    function applyInfo(){
        $this->chk_priv('applyinfo');
        $model=M('Unit');
        if(!empty($_POST)){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath  =     'Apply/'; // 设置附件上传（子）目录
            $upload->replace = true; //存在同名文件是否是覆盖
            // 是否使用子目录保存上传文件
            $upload->autoSub = true;
       //     echo "<pre>";
       //     var_dump($upload);
       //     echo "</pre>";
       // die();
            // 上传文件
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else {// 上传成功
//                print_r($info);die();
                foreach ($info as $v) {
// 保存表单数据 包括附件数据
                    $up = M('Apply');// 实例化对象
                    //缩略图 文件保存地址
                    $timage = "./Public/Uploads/" . $v['savepath'] . $v['savename'];
//                    die($timage);
                    //上传数据库
                    $_POST['pic'] = "Uploads/".$v['savepath'] . $v['savename'];//保存图片路径


                    //----- 创建缩略图 -----//
                    // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
                    $spath = "./Public/Uploads/".$v['savepath']."thumb_".$v['savename']; //缩略图名称 地址
                    $this->thumbs($timage,$spath,140,100);
                    $_POST['adminpicthumb'] = "Uploads/".$v['savepath']."thumb_".$v['savename'];//保存缩略图片路径
//                     print_r($_POST);
//                     die();
                    if($up->create()){
                        // echo "jll";
                        // die();
                        if($up->add()){
                            $this->success("提交申请成功");
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
                    }else{
                        // 如果表单验证失败
                        $this->error($up->getError());
                        // $roleModel->getError()获取模型失败的原因
                        exit;
                    }
                }
            }
        }
        
        $unit=$model->where('level=1')->select();
        $sql="select a.id as aid,u.* from sw_unit as u left join sw_admin as a on u.supervisorid=a.id where level=2";
        $tunit=$model->query($sql);
//         print_r($tunit);die();
        $this->assign('unit',$unit);
        $this->assign('tunit',$tunit);
        $contactModel=M('Contact');
        $newcount=$contactModel->where('state=0')->count();
        $this->assign('newmessage',$newcount);
        $this->display();
    }


    // 查看申请状态
    function applyStatus(){
        $this->chk_priv('applystatus');

//        print_r($_SESSION['userid']);die();
        $model=M('Apply');
        $sql='select c.unitname, b.* ,a.num,a.username from sw_apply as b left join sw_admin as a on b.adminid=a.id left join sw_unit as c on b.unitid=c.id where a.id='.$_SESSION['userid'].' order by b.status desc';
        $data=$model->query($sql);
        if($data==array()){
            $kon1='<td style=\'text-align: center;\' colspan=\'7\'><span4>没有申请社团管理员</span4></td>';
            $this->assign('kon1',$kon1);
        }else{
//            echo '<pre>';
//            print_r($data);
//            echo '</pre>';
//            die();
            $this->assign('data',$data);
        }

        $smodel=M('Unit');
        $sql1='select b.*,a.num,a.username from sw_unit as b left join sw_admin as a on b.proposer=a.id where b.proposer='.$_SESSION['userid'].' order by b.level desc';
        $data2=$model->query($sql1);
        if($data2==array()){
            $kon2='<td style=\'text-align: center;\' colspan=\'7\'><span4>没有申请成立社团</span4></td>';
            $this->assign('kon2',$kon2);
        }else{
//            echo '<pre>';
//            print_r($data2);
//            echo '</pre>';
//            die();
            $this->assign('data2',$data2);
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
        $this->chk_priv('applystatus');
        $model=M('apply');
        $user=$model->where('id='.$id.'')->delete();
        if($user){
            $this->success('删除申请成功');
            exit;
        }else{
            $this->error('删除失败,请重新删除');
            exit;
        }
    }

}