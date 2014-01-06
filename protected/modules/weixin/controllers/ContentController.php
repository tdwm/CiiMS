<?php

class ContentController extends CiiController
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
				'actions'=>array('index','view','ajaxSave'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create2','create','update','RemoveImage'),
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
	public function actionCreate($type = 1)
	{
        $user_id = Yii::app()->user->id;
        if (Yii::app()->params['id']) {
            $model=$this->loadModel($id);
        }  else {
            $model = $this->createSingle();
        }

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['WeixinContent']))
		{
			$model->attributes=$_POST['WeixinContent'];
            $model->user_id = $user_id; 
            $model->flag =  0;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
        if($model->thumb){
            $thumb = WeixinMedia::model()->findByPk($model->thumb);
        }

		$this->render('create',array(
			'model'=>$model,
			'thumb'=>$thumb,
			'type'=>$type,
		));
	}


    public function actionCreate2($type = 2)
    {

        $user_id = Yii::app()->user->id;
        if (Yii::app()->params['id']) {
            $model=$this->loadModel($id);
        }  
        if($model->thumb){
            $thumb = WeixinMedia::model()->findByPk($model->thumb);
        }

        $singles = $this->getSingles();

        $this->render('create',array(
            'model'=>$model,
            'thumb'=>$thumb,
            'type'=>$type,
            'singles'=>$singles,
        ));
    }

    public function getSingles()
    {
        $user_id = Yii::app()->user->id;
		$model=new WeixinContent('search');
		$model->unsetAttributes();  // clear any default values
        $model->user_id = $user_id;
        $model->flag = 0;
        $model->type = 1;
        $model->parent = 0;
		if(isset($_GET['WeixinContent']))
			$model->attributes=$_GET['WeixinContent'];

        return $model;

        /*
		$this->render('admin',array(
			'model'=>$model,
		));
        $model = WeixinContent::model()->findAll($criteria);  
        return $model;

        $user_id = Yii::app()->user->id;
        $criteria=new CDbCriteria;
        $criteria->compare('user_id',$user_id);
        $criteria->compare('flag',0);
        $criteria->compare('type',1);
        $criteria->compare('parent',0);
		return new CActiveDataProvider('WeixinContent', array(
			'criteria'=>$criteria,
		));
         */
    }

    public function actionAjaxSave($type = 1)
    {
        $user_id = Yii::app()->user->id;
        if($user_id == null) {
            echo json_encode(array('error'=>'10000','msg'=>'登陆超时'));
            exit;
        }
        if(isset($_POST['WeixinContent']))
        {
            $model->attributes=$_POST['WeixinContent'];
            $model->user_id = $user_id; 
            $model->flag = 1;
            if($model->save()){
                echo json_encode(array('success'=>1));
            } else {
                echo json_encode(array('error'=>'10001','msg'=>'入库失败'));
            }
        }
    }

    private function createSingle($type = 1, $parent = 0)
    {
        $user_id = Yii::app()->user->id;
        $model = WeixinContent::model()->with('img')->find( "flag=1 AND t.type=1 AND t.user_id = '$user_id'");
        $model=new WeixinContent;
        $model->user_id = $user_id;
        $model->flag = 1;
        $model->type = $type;
        $model->parent = $parent;
        $model->save();
        $model->created = date('Y-m-d H:i:s');
        return $model;
    }
    private function createMulti($num)
    {
        $model=$this->createSingle(2);
        for($i = 1 ; $i<$num; $i++)
            $child = $this->createSingle(2,$model->id);
        return WeixinContent::model()->findByPk($model->id);
    }

    public function actionRemoveImage()
    {
        if($_POST['id'] == 0) {
            return true;
        }
        $model = $this->loadModelByIDUID($id);
        $model->thumb = 0;
        $result['success'] = true;
        echo json_encode($result);
    }

    public function loadModelByIDUID($id, $checkuid=true)
    {
        $model = WeixinContent::model()->findByPk($id);
        if ($checkuid == false) return $model;
        if($model->user_id == Yii::app()->user->id) return $model;
        return null;
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

		if(isset($_POST['WeixinContent']))
		{
			$model->attributes=$_POST['WeixinContent'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
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
        $user_id = Yii::app()->user->id;
        $pageSize = Yii::app()->params['listPerPage'];
        $pageSize = 4;

        $criteria=new CDbCriteria;
        $criteria->compare('user_id',$user_id);
        $criteria->compare('flag',0);
        $criteria->compare('parent',0);

        $item_count = WeixinContent::model()->count($criteria);

        $pages = new CPagination($item_count);
        $pages->setPageSize($pageSize);
        $pages->applyLimit($criteria);  // the trick is here!

        $criteria->order = 'id desc';
        $model = WeixinContent::model()->findAll($criteria);  

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
		$model=new WeixinContent('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['WeixinContent']))
			$model->attributes=$_GET['WeixinContent'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=WeixinContent::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='weixin-content-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
