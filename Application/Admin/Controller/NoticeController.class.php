<?php
namespace Admin\Controller;
use Tools\AdminController;
// use Think\Controller;

class NoticeController extends AdminController {
//    通知处理
    public function handleNotice(){
        $this->chk_priv('handlenotice');

        $model=M('Schoolnews');
        $sql="select u.unitname,s.* from sw_schoolnews as s left join sw_unit as u on s.unitid=u.id where s.status=1 AND u.supervisorid=".$_SESSION['userid'];
        $count=$model->where('status=1')->count();
//        echo $count;die();
        $data=$this->fenye($model,$count,5,$sql,0);
//        echo "<pre>";print_r($data);echo "</pre>";die();
        $this->assign('data',$data);
        $contactModel=M('Contact');
        $newcount=$contactModel->where('state=0')->count();
        $this->assign('newmessage',$newcount);
        $this->display();
    }

//    发布通知
    public function newNotice(){
        $this->chk_priv('newnotice');
        if(!empty($_POST) && !empty($_FILES)){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath  =     'notice/'; // 设置附件上传（子）目录
            $upload->replace = true; //存在同名文件是否是覆盖
            // 是否使用子目录保存上传文件
            $upload->autoSub = true;
//            echo "<pre>";
//            var_dump($upload);
//            echo "</pre>";
//        die();
            // 上传文件
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else {// 上传成功
//                print_r($info);die();
                $count=count($info);
                if($count!==1){
                    $this->error('上传文件有误');
                }
                foreach ($info as $v) {
// 保存表单数据 包括附件数据
                    $up = M("Schoolnews"); // 实例化对象
                    //缩略图 文件保存地址
                    $timage = "./Public/Uploads/" . $v['savepath'] . $v['savename'];
//                    die($timage);
                    //上传数据库
                    $_POST['pic'] = "Uploads/".$v['savepath'] . $v['savename'];//保存图片路径


                    //----- 创建缩略图 -----//
                    // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
                    $spath = "./Public/Uploads/".$v['savepath']."thumb_".$v['savename']; //缩略图名称 地址
                    $this->thumbs($timage,$spath,$_POST['thumbsize'],$_POST['thumbsize']);
                    $_POST['newpic'] = "Uploads/".$v['savepath']."thumb_".$v['savename'];//保存缩略图片路径
                    $up->create();
                    if($up->add()){
                        if($_POST['status']==1){
                            $this->success("发部通知成功");
                            exit();
                        }elseif($_POST['status']==0){
                            $this->success("通知已存入草稿箱");
                            exit();
                        }

                    }else{
                        // 判断当前是否是调试模式,如果是调试模式就打印出sql语句
                        if(definded('APP_DEBUG')){
                            // tp中的给出的方法,查出上一条语句
                            echo "sql:".$up->getLastSql();
                            exit();
                        }else{
                            $this->error('发生未知错误,发布失败');
                            exit();
                        }
                    }
                }
            }
        }
        $one=M('Unit');
        $unit=$one->where('level=2 AND supervisorid='.$_SESSION['userid'])->find();
//        print_r($unit);die();
        $this->assign('unit',$unit);
        $contactModel=M('Contact');
        $newcount=$contactModel->where('state=0')->count();
        $this->assign('newmessage',$newcount);
        $this->display();
        }

//    通知草稿箱
    public function drafts(){
        $this->chk_priv('drafts');
        $model=M('Schoolnews');
        $sql="select u.unitname,s.* from sw_schoolnews as s left join sw_unit as u on s.unitid=u.id where s.status=0 AND u.supervisorid=".$_SESSION['userid'];
        $count=$model->where('status=0')->count();
//        echo $count;die();
        $data=$this->fenye($model,$count,5,$sql,0);
//        echo "<pre>";print_r($data);echo "</pre>";die();
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

    //    详情,处理留言
    public function edit($id=0){
        $this->chk_priv('drafts');

        if(!empty($_POST)){
//            echo $id;die();
            if($_FILES['newpic']['size']==0){
//                echo 'no here';
//                print_r($_FILES);die();
                $model=M('Schoolnews');
                $model->create();
                if($model->where('id='.$id)->save()){
                    $this->success('操作成功');
                    exit;
                }else{
                    $this->success('保存成功');
                    exit;
                }
            }else{
//                echo 'jll';
//                print_r($_FILES);print_r($_POST);die();
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
                $upload->savePath  =     'notice/'; // 设置附件上传（子）目录
                $upload->replace = true; //存在同名文件是否是覆盖
                // 是否使用子目录保存上传文件
                $upload->autoSub = true;
                // 上传文件
                $info   =   $upload->upload();
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }else {// 上传成功
//                print_r($info);die();
                    $count=count($info);
                    if($count!==1){
                        $this->error('上传文件有误');
                    }
                    foreach ($info as $v) {
// 保存表单数据 包括附件数据
                        $up = M("Schoolnews"); // 实例化对象
                        //缩略图 文件保存地址
                        $timage = "./Public/Uploads/" . $v['savepath'] . $v['savename'];
//                    die($timage);
                        //上传数据库
                        $_POST['pic'] = "Uploads/".$v['savepath'] . $v['savename'];//保存图片路径


                        //----- 创建缩略图 -----//
                        // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
                        $spath = "./Public/Uploads/".$v['savepath']."thumb_".$v['savename']; //缩略图名称 地址
                        $this->thumbs($timage,$spath,$_POST['thumbsize'],$_POST['thumbsize']);
                        $_POST['newpic'] = "Uploads/".$v['savepath']."thumb_".$v['savename'];//保存缩略图片路径
//                        print_r($_POST);die();
                        $up->create();
                        if($up->where('id='.$id)->save()){
                            if($_POST['status']==1){
                                $this->success("操作成功");
                                exit();
                            }elseif($_POST['status']==0){
                                $this->success("保存成功");
                                exit();
                            }

                        }else{
                            // 判断当前是否是调试模式,如果是调试模式就打印出sql语句
                            if(definded('APP_DEBUG')){
                                // tp中的给出的方法,查出上一条语句
                                echo "sql:".$up->getLastSql();
                                exit();
                            }else{
                                $this->error('发生未知错误,发布失败');
                                exit();
                            }
                        }
                    }
                }
            }
        }
        if($id<=0){
            $this->error('请求不正确');
        }else{
            $model=M('Schoolnews');
            $sql="select u.unitname,s.* from sw_schoolnews as s left join sw_unit as u on s.unitid=u.id where s.id=".$id." AND u.supervisorid=".$_SESSION['userid'];
//            echo $sql;die();
            $data=$model->query($sql);
//            print_r($data);die();
            $this->assign('data',$data);
            $contactModel=M('Contact');
            $newcount=$contactModel->where('state=0')->count();
            $this->assign('newmessage',$newcount);
            $this->display();
        }
    }

    //    删除单个
    public function del($id=0){
        $this->chk_priv('drafts');
        if($id<=0){
            $this->error('请求不正确');
        }else{
            $model = M('Schoolnews');
            // 根据ID删除记录
            if($model->delete($id)){
                $this->success('评论删除成功','drafts');
            }else{
                $this->error('评论删除失败');
            }
        }
    }

//    批量删除
    public function bdel(){
        $this->chk_priv('drafts');
//        print_r($_POST);
//        die();
        if (!isset($_POST['dbelid'])||empty($_POST['dbelid'])) {
            $this->error('必须选择要删除的留言');
        }else{
//            print_r($_POST);die();
            $model = M('Schoolnews');
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

}
?>