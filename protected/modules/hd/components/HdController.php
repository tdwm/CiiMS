<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class HdController extends CiiController
{
	
	public $activity_menu = array();
	public $sidebarMenu = array();
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

        $this->activity_menu = array(
            array(
                'label'=>'管理活动', 
                'icon'=>'home', 
                'url'=>$this->createUrl('/hd/activity/admin'),
                'active'=>($this->id == 'activity' ? true : false)
            ),
            array(
                'label'=>'我的活动', 
                'icon'=>'th-list',
                'url'=>$this->createUrl('/hd/activity/myactive'),
                'active'=>$this->id == 'categories' ? true : false
            ),
            array(
                'label'=>'活动列表', 
                'icon'=>'book', 
                'url'=>$this->createUrl('/hd/activity/'),
                'active'=>$this->id == 'activity' ? true : false
            ),
            array(
                'label'=>'Settings', 
                'icon'=>'cog', 
                'url'=>$this->createUrl('/admin/settings/'), 
                'active'=>$this->id == 'settings' ? true : false
            ),
        );
        return true;
    }
	
	public $params = array();
    
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='hdWrapper';
	
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
