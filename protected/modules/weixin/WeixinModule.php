<?php

class WeixinModule extends CWebModule
{
    public $mediaConfig = array(
            '2'=>array('label'=>'图片','maxsize'=>'2','path'=>'pic',  'ext'=>array('jpg', 'jpeg', 'png', 'gif', 'bmp')),
            '3'=>array('label'=>'语音','maxsize'=>'5','path'=>'voice','ext'=>array('mp3', 'wma', 'wav', 'amr')),
            '4'=>array('label'=>'视频','maxsize'=>'20','path'=>'video','ext'=>array('rm', 'rmvb', 'wmv', 'avi', 'mpg', 'mpeg', 'mp4')),
    );
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'weixin.models.*',
			'weixin.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
