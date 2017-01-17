<?php
namespace Admin\Controller;
use Tools\AdminController;
// use Think\Controller;

class UnitController extends AdminController {
//    社团资料资料
    public function communityRevision(){
        $this->chk_priv('communityrevision');
        $model=M('Unit');
        $adminid=$_SESSION['userid'];
//        die($adminid);
        $data=$model->where('supervisorid='.$adminid.' AND level=1')->find();
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
//        print_r($_SESSION);
//        die();
        $this->assign('data',$data);
        $contactModel=M('Contact');
        $newcount=$contactModel->where('state=0')->count();
        $this->assign('newmessage',$newcount);
        $this->display();
    }

//    社团曾经活动
    public function usedActivity(){
        $this->chk_priv('stusedactivity');
        $whichmodel=M('Unit');
        $adminid=$_SESSION['userid'];
//        die($adminid);
        $unit=$whichmodel->where('supervisorid='.$adminid.' AND level=1')->find();
//        print_r($unit);die();
        $model=M('Active');
        $active=$model->where("isapproval=1 AND unitid =".$unit['id'])->select();
        $count=count($active);
//        echo $count;die();
        $this->assign('count',$count);
//        echo '<pre>';
//        print_r($active);
//        echo '</pre>';die();
        if(empty($active)){
            $this->assign('kon','社团还没有举办活动,快去举办吧');
        }else{
            $sql="select a.*,b.classifyname,t.backfield,u.unitname from sw_active as a left join sw_activeclassify as b on a.classifyid=b.id left join sw_teacherback as t on a.id=t.activeid left join sw_unit as u on a.unitid=u.id where a.isapproval=1 AND a.unitid=".$unit['id']." order by a.id";
            $data = $model->query($sql);
//            print_r($data);die();
            $this->assign('data',$data);
            $newmodel=M('Activecomment');
            $lv=array();
            foreach($data as $k=>$v){
                $join=explode(',',$v['enterid']);
//                print_r($join);
                $joincount=count($join)-2;
                $lv[$v['id']][count]=$joincount;
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

//    修改资料
    public function xiugai(){
        $this->chk_priv('communityrevision');
        if(!empty($_POST)){
            // print_r($_POST);die();

            $_POST['isfirst']=1;

            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif' , 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath  =     'Unit/logo/'; // 设置附件上传（子）目录
            $upload->replace = true; //存在同名文件是否是覆盖
            // 是否使用子目录保存上传文件
            $upload->autoSub = true;
//          echo "<pre>";
//          var_dump($_FILES);
//          echo "</pre>";
//          die();
            // 上传文件
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else {// 上传成功
                $countarray=count($info);
                if($countarray !== 1){
                    $this->error('文件上传格式有误,请重新申请');
                    exit;
                }
//                 echo "<pre>";
//                print_r($info);
//                 echo "</pre>";
//                die();
                $up = M('Unit'); // 实例化对象
                //缩略图 文件保存地址
                $timage = "./Public/Uploads/" . $info['unitlogo']['savepath'] . $info['unitlogo']['savename'];
//                 die($timage);


                //----- 创建缩略图 -----//
                $spath = "./Public/Uploads/".$info['unitlogo']['savepath']."thumb_".$info['unitlogo']['savename']; //缩略图名称 地址
                $this->thumbs($timage,$spath,50,50);
                $_POST['unitlogo'] = "Uploads/".$info['unitlogo']['savepath']."thumb_".$info['unitlogo']['savename'];//保存缩略图片路径
                $up->create();
                if($up->where('id='.$_POST['id'])->save()){
                    $this->success("修改社团资料成功");
                    exit();
                }else{
                    // 判断当前是否是调试模式,如果是调试模式就打印出sql语句
                    if(definded('APP_DEBUG')){
                        // tp中的给出的方法,查出上一条语句
                        echo "sql:".$up->getLastSql();
                        exit();
                    }else{
                        $this->error('修改社团资料失败,重新修改');
                        exit();
                    }
                }

            }
        }

    }

    public function delActive($id){
        $id = $_GET['id'];
        $model = M("Active");
        if($model -> where('id='.$id) ->delete()){
            $this->success("删除活动成功");
            exit;
        }else{
            $this->error("删除活动失败");
            exit;
        }
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
}