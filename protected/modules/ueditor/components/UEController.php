<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class UEController extends CiiController
{
	
    public $sitepath = '';
	public $activity_menu = array();
	public $uploadpath = array();
	public $imagepath = array();
	public $crawlconfig = array();
	public $imgconfig = array();
    public $user_id = '';
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl'
		);
	}
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow authenticated admins to perform any action
				'users'=>array('@'),
				'expression'=>'1==1'
				//'users'=>UserModule::getAdmins(),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function beforeAction($action)
    {
        $this->user_id = Yii::app()->user->id;
        $this->sitepath = dirname(Yii::app()->BasePath);

        $this->imagepath = array($this->sitepath.'/uploads/pic/');
        //涂鸦配置
        $this->crawlconfig = array(
            "savePath" => $this->sitepath."/uploads/pic" ,             //存储文件夹
            "maxSize" => 1000 ,                   //允许的文件最大尺寸，单位KB
            "allowFiles" => array( "gif" , "png" , "jpg" , "jpeg" , "bmp" ),  //允许的文件格式
            'tmpPath' => "tmp/",
        );
        //上传图片配置
        $this->imgconfig = array(
            "savePath" => $this->sitepath."/uploads/pic" ,             //存储文件夹
            "maxSize" => 1000, //单位KB
            "allowFiles" => array("gif", "png", "jpg", "jpeg", "bmp"),
        );
        return true;
    }
	
	public $params = array();
    
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	//public $layout='UEWrapper';
	
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	public $navmenu=array();
	public $navgroupmenu=array();
	
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
}
