<?php

class ActivityController extends HdController
{

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
				'actions'=>array('create','update','admin','uploadimg'),
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
		$model=new HdActivity;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['HdActivity']))
		{
			$model->attributes=$_POST['HdActivity'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->act_id));
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

		if(isset($_POST['HdActivity']))
		{
			$model->attributes=$_POST['HdActivity'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->act_id));
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
	public function actionIndex()
    {
        $pageSize = Yii::app()->params['listPerPage'];
        $pageSize = 4;

        $criteria=new CDbCriteria;
        $criteria->compare('pushed',1);

        $item_count = HdActivity::model()->count($criteria);

        $pages = new CPagination($item_count);
        $pages->setPageSize($pageSize);
        $pages->applyLimit($criteria);  // the trick is here!

        $criteria->order = 'act_id desc';
        $model = HdActivity::model()->findAll($criteria);  

        $this->render('index',array(
            'model'=> $model,
            'item_count'=>$item_count,
            'page_size'=>$pageSize,
            'items_count'=>$item_count,
            'pages'=>$pages,
        ));
    }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
        $pageSize = Yii::app()->params['listPerPage'];
        $pageSize = 4;

        $criteria=new CDbCriteria;
        $criteria->compare('pushed',1);

        $item_count = HdActivity::model()->count($criteria);

        $pages = new CPagination($item_count);
        $pages->setPageSize($pageSize);
        $pages->applyLimit($criteria);  // the trick is here!

        $criteria->order = 'act_id desc';
        $model = HdActivity::model()->findAll($criteria);  

        $this->render('index',array(
            'model'=> $model,
            'item_count'=>$item_count,
            'page_size'=>$pageSize,
            'items_count'=>$item_count,
            'pages'=>$pages,
        ));
	}
    /*
     * upload img
     */
    public function actionUploadImg()
    {
        if (Yii::app()->request->isPostRequest)
        {
            /*
            Yii::import("ext.EAjaxUpload.Uploader");
             */
            $sitepath = dirname(Yii::app()->BasePath);
            $imgconfig = array(
                "savePath" => $sitepath."/uploads/pic" ,             //存储文件夹
                "maxSize" => 2048, //单位KB
                "allowFiles" => array("gif", "png", "jpg", "jpeg", "bmp"),
            );
            $up = new Uploader("qqfile", $imgconfig);
            $info = $up->getFileInfo();

            if($info['state'] == 'SUCCESS'){
                $img_path = $info['url'];
                //缩放
                $image = Yii::app()->image->load($img_path);
                $image->resize(320, 250, $image::WIDTH);//->rotate(-45)->quality(75)->sharpen(20);
                $image->save($img_path); // or $image->save('images/small.jpg');

                $model = new MImages;
                $model->user_id = $this->user_id;
                $model->title = $info['originalName'];
                $model->sign = md5_file($info['url']);
                $info['url'] = str_replace($sitepath,'',$info['url']);
                $model->source = $info['url'];
                $model->save();
            }
            $result = array(
                'url'=>$info['url'],
                'title'=>$info['originalName'],
                'state'=>$info['state'],
            );

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
		$model=HdActivity::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='hd-activity-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
