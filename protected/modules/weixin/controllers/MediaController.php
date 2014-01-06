<?php

class MediaController extends CiiController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
    public $layout='weixinWrapper';


	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','upload'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new WeixinMedia;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['WeixinMedia']))
		{
			$model->attributes=$_POST['WeixinMedia'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['WeixinMedia']))
		{
			$model->attributes=$_POST['WeixinMedia'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($type)
	{

        $id = Yii::app()->user->id;
		$model=new WeixinMedia('search');
		$model->unsetAttributes();  // clear any default values
        $model->type = $type;
        $model->user_id = $id;
		if(isset($_GET['WeixinMedia']))
			$model->attributes=$_GET['WeixinMedia'];
		$this->render('index_'.$type,array(
			'model'=>$model,
			'type'=>$type,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new WeixinMedia('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['WeixinMedia']))
			$model->attributes=$_GET['WeixinMedia'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Handles file uploading for the controller
	 */
	public function actionUpload($type = 2)
    {
		$mediaConfig = Yii::app()->getModule('weixin')->mediaConfig;
        $config = $mediaConfig[$type];
        $user_id = Yii::app()->user->id;

        if (Yii::app()->request->isPostRequest)
        {
            Yii::import("ext.EAjaxUpload.qqFileUploader");
            $path = '/'.$config['path'].'/';
            $folder=Yii::app()->getBasePath() .'/../uploads/' . $path;// folder for uploaded files
            $allowedExtensions = $config['ext'];//array("jpg","jpeg","gif","exe","mov" and etc...
            $sizeLimit = $config['maxsize'] * 1024 * 1024;// maximum file size in bytes
            $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
            $result = $uploader->handleUpload($folder);

            if ($result['success'] = true)
            {
                $model = new WeixinMedia;
                $model->user_id = $user_id;
                $model->type = $type;
                $model->ext = $result['ext'];
                $model->title = $result['filename'];
                $model->source = '/uploads/'.$path.$result['filename'];
                $model->sign = md5_file($folder.$result['filename']);
                if($model->save()){
                    $result['filepath'] = $model->source;
                    $result['id'] = $model->getPrimaryKey();
                    $result['ext'] = $result['ext'];
                    $result['type'] = $model->type;
                }else{
                    $result['error'] = '保存入库失败';
                }
            }
            $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);

            echo $return;
        }	
        Yii::app()->end();	
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=WeixinMedia::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='weixin-media-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
