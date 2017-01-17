<?php
namespace Admin\Controller;
use Tools\AdminController;
// use Think\Controller;

class demoController extends AdminController {

//  案例列表
    public function demoLst($page=0){
        $model=M('Demo');
        $where=1;
        $count = $model->where($where)->count();
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
        $sql="select d.*,c.classifyname from xy_classify as c left join xy_demo d on c.id=d.classifyId ORDER BY d.addtime desc limit $pageNow,$pagelist";
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

//  添加案例
    public function addDemo(){
//        print_r($_FILES);
        if(!empty($_POST)){
            $_POST['classifyId']=implode(',', $_POST['classifyId']);
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath  =     'xiyoudemo/'; // 设置附件上传（子）目录
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
                foreach ($info as $v) {
// 保存表单数据 包括附件数据
                    $up = M("Demo"); // 实例化对象
                    //缩略图 文件保存地址
                    $timage = "./Public/Uploads/" . $v['savepath'] . $v['savename'];
//                    die($timage);
                    //上传数据库
                    $_POST['pic'] = "Uploads/".$v['savepath'] . $v['savename'];//保存图片路径


                    //----- 创建缩略图 -----//
                    // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
                    $spath = "./Public/Uploads/".$v['savepath']."thumb_".$v['savename']; //缩略图名称 地址
                    $this->thumbs($timage,$spath,$_POST['thumbsize'],$_POST['thumbsize']);
                    $_POST['thumb'] = "Uploads/".$v['savepath']."thumb_".$v['savename'];//保存缩略图片路径
                    $up->create();
                    if($up->add()){
                        $this->success("添加案例成功");
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
        }
        $classifymodel=M('Classify');
        $data=$classifymodel->select();
        $contactModel=M('Contact');
        $newcount=$contactModel->where('state=0')->count();
        $this->assign('data',$data);
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

    //    详情,处理留言
    public function edit($id=0){
        if($id<=0){
            $this->error('请求不正确');
        }else{
                if(!empty($_FILES)) {
                    $_POST['classifyId']=$_POST['classifyId'][0];
                    if(empty($_FILES['pic']['type'])){

                        $User=M('Demo');
                        $User->create();
                        if($User->save()){
                            $this->success('修改案例成功');
                            exit();
                        }else{
                            $this->error('修改案例失败');
                            exit();
                        }
                    }else{

                        $upload = new \Think\Upload();// 实例化上传类
                        $upload->maxSize   =     3145728 ;// 设置附件上传大小
                        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                        $upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
                        $upload->savePath  =     'xiyoudemo/'; // 设置附件上传（子）目录
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
                            foreach ($info as $v) {
// 保存表单数据 包括附件数据
                                $up = M("Demo"); // 实例化对象
                                //缩略图 文件保存地址
                                $timage = "./Public/Uploads/" . $v['savepath'] . $v['savename'];
//                    die($timage);
                                //上传数据库
                                $_POST['pic'] = "Uploads/".$v['savepath'] . $v['savename'];//保存图片路径


                                //----- 创建缩略图 -----//
                                // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
                                $spath = "./Public/Uploads/".$v['savepath']."thumb_".$v['savename']; //缩略图名称 地址
                                $this->thumbs($timage,$spath,$_POST['thumbsize'],$_POST['thumbsize']);
                                $_POST['thumb'] = "Uploads/".$v['savepath']."thumb_".$v['savename'];//保存缩略图片路径

//                                print_r($_POST);die();
                                $up->create();
                                if($up->save()){
                                    $this->success("修改案例成功");
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
                    }
                }
            }
            $classifymodel=M('Classify');
            $data=$classifymodel->select();
            $this->assign('data',$data);
            $contactModel=M('Contact');
            $newcount=$contactModel->where('state=0')->count();
            $this->assign('newmessage',$newcount);
            $model=M('Demo');
            $sql="select d.*,c.classifyname from xy_classify as c left join xy_demo d on c.id=d.classifyId where d.id= $id";
//            echo $sql;die();
            $content=$model->query($sql);
//            print_r($content);
//            echo $content[0]['id'];
//        die();
            $this->assign('content',$content);
            $this->display();
    }

//    删除单个
    public function del($id=0){
        if($id<=0){
            $this->error('请求不正确');
        }else{
            $model = M('Demo');
            // 根据ID删除记录
            $model->delete($id);
            $this->success('留言删除成功');
        }
    }

//    批量删除
    public function bdel(){
//        print_r($_POST);
//        die();
        if (!isset($_POST['dbelid'])||empty($_POST['dbelid'])) {
            $this->error('必须选择要删除的留言');
        }else{
            $model = M('Demo');
            // 把模型的基本信息在删除
            $ids=implode(',', $_POST['dbelid']);
//            var_dump($ids);die;
            $model->where("id IN ($ids)")->delete();
            $this->success('批量删除留言成功');
        }
    }


    //    搜索联系人
    public function searchDemo(){
        if(!empty($_GET['searchname'])){
//            echo $_POST['searchname'];
            $model=M('Demo');
            $Cmodel = M('Contact');
            $newcount=$Cmodel->where('state=0')->count();
            $where="demoname like'%".$_GET['searchname']."%'";
            $count = $model->where($where)->count();
            if($count==0){
                $this->error('没有搜索结果');
            }
            $Page  = new \Tools\MyPage($count,5);// 实例化分页类
            $pageStr=$Page->fpage(array(2,3,4,5,6,7));
            $this->assign('pageStr',$pageStr);
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
            $sql="select d.*,c.classifyname from xy_classify as c left join xy_demo d on c.id=d.classifyId where $where limit $pageNow,$pagelist";
            $data = $model->query($sql);
//            ->order("id")->limit($Page->firstRow.','.$Page->listRows)->select();
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
