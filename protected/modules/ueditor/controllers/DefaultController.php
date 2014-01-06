<?php
error_reporting(-1);
class DefaultController extends UEController
{
    
    function actionManageImg()
    {
        $list= Yii::app()->db->createCommand('select source from  ueditor_images where user_id='.$this->user_id)->queryAll();
        if(!count($list)) return;
        foreach($list as $l){
            $r[] = $l['source'];
        }
        header("Content-Type: text/html; charset=utf-8");
        echo implode($r,'ue_separate_ue');
        Yii::app()->end();
    }

    function actionUploadImg()
    {

        $title = htmlspecialchars($_POST['pictitle'], ENT_QUOTES);
        $path = htmlspecialchars($_POST['dir'], ENT_QUOTES);


        //生成上传实例对象并完成上传
        $up = new Uploader("upfile", $this->imgconfig);

        /**
         * 得到上传文件所对应的各个参数,数组结构
         * array(
         *     "originalName" => "",   //原始文件名
         *     "name" => "",           //新文件名
         *     "url" => "",            //返回的地址
         *     "size" => "",           //文件大小
         *     "type" => "" ,          //文件类型
         *     "state" => ""           //上传状态，上传成功时必须返回"SUCCESS"
         * )
         */
        $info = $up->getFileInfo();

        /**
         * 向浏览器返回数据json数据
         * {
         *   'url'      :'a.jpg',   //保存后的文件路径
         *   'title'    :'hello',   //文件描述，对图片来说在前端会添加到title属性上
         *   'original' :'b.jpg',   //原始文件名
         *   'state'    :'SUCCESS'  //上传状态，成功时返回SUCCESS,其他任何值将原样返回至图片上传框中
         * }
         */
        $user_id = $this->user_id;

        if($info['state'] == 'SUCCESS'){
            $model = new MImages;
            $model->user_id = $user_id;
            $model->title = $title ? $title : $info['originalName'];
            $model->sign = md5_file($info['url']);
            $info['url'] = str_replace($this->sitepath,'',$info['url']);
            $model->source = $info['url'];
            $model->save();
        }

        echo "{'url':'" . $info["url"] . "','title':'" . $title . "','original':'" . $info["originalName"] . "','state':'" . $info["state"] . "'}";
        Yii::app()->end();
    }
    

    function actionTmpImg()
    {
        $this->crawlconfig[ "savePath" ] = $this->crawlconfig['tmpPath'];
        $up = new Uploader( "upfile" , $this->crawlconfig );
        $info = $up->getFileInfo();
        echo "<script>parent.ue_callback('" . $info[ "url" ] . "','" . $info[ "state" ] . "')</script>";

        /*
        //获取当前上传的类型
        $action = htmlspecialchars( $_GET[ "action" ] );
        if ( $action == "tmpImg" ) { // 背景上传
            //背景保存在临时目录中
            $this->crawlconfig[ "savePath" ] = $this->crawlconfig['tmpPath'];
            $up = new Uploader( "upfile" , $this->crawlconfig );
            $info = $up->getFileInfo();
             // 返回数据，调用父页面的ue_callback回调
            echo "<script>parent.ue_callback('" . $info[ "url" ] . "','" . $info[ "state" ] . "')</script>";
        } else {
            //涂鸦上传，上传方式采用了base64编码模式，所以第三个参数设置为true
            $up = new Uploader( "content" , $this->crawlconfig , true );
            //上传成功后删除临时目录
            if(file_exists($tmpPath)){
                $this->delDir($tmpPath);
            }
            $info = $up->getFileInfo();
            echo "{'url':'" . $info[ "url" ] . "',state:'" . $info[ "state" ] . "'}";
        }
         */
        Yii::app()->end();
    }

    /**
     * 删除整个目录
     * @param $dir
     * @return bool
     */
    function delDir( $dir )
    {
        //先删除目录下的所有文件：
        $dh = opendir( $dir );
        while ( $file = readdir( $dh ) ) {
            if ( $file != "." && $file != ".." ) {
                $fullpath = $dir . "/" . $file;
                if ( !is_dir( $fullpath ) ) {
                    unlink( $fullpath );
                } else {
                    delDir( $fullpath );
                }
            }
        }
        closedir( $dh );
        //删除当前文件夹：
        return rmdir( $dir );
    }
    /**
     * 遍历获取目录下的指定类型的文件
     * @param $path
     * @param array $files
     * @return array
     */
    function getfiles( $path , &$files = array() )
    {
        if ( !is_dir( $path ) ) return null;
        $handle = opendir( $path );
        while ( false !== ( $file = readdir( $handle ) ) ) {
            if ( $file != '.' && $file != '..' ) {
                $path2 = $path . '/' . $file;
                if ( is_dir( $path2 ) ) {
                   $this->getfiles( $path2 , $files );
                } else {
                    if ( preg_match( "/\.(gif|jpeg|jpg|png|bmp)$/i" , $file ) ) {
                        $files[] = $path2;
                    }
                }
            }
        }
        return $files;
    }
}
