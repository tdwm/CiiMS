<?php

class SettingsController extends ACiiController
{	
    public $layout='settingsWrapper';
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionSave($id=NULL)
    {
        if ($id == NULL)
            $model = new Configuration;
        else
            $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        //$this->performAjaxValidation($model);

        if(isset($_POST['Configuration']))
        {
            $model->attributes = Cii::get($_POST, 'Configuration', array());
            $model->key = Cii::get($_POST['Configuration'], 'key', NULL);
            try {
                if($model->save())
                {
                    Yii::app()->user->setFlash('success', '设置成功');
                    $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
                }
            } 
            catch (CDbException $e)
            {
                Yii::app()->user->setFlash('error', '已经有相同 key 值的数据.');
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
            }
            Yii::app()->user->setFlash('error', '提交错误，请检查数据再提交');
        }

        if($_GET['ajax']) {
            $this->renderPartial('_form',array('model'=>$model));
        } else {
            $this->render('_form',array('model'=>$model));
        }
    }

    public function actionManaged()
    {
        $this->render('managed');
    }
    
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			Yii::app()->user->setFlash('success', 'Setting has been deleted.');
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

    /**
     * Public function to delete many records from the content table
     * TODO, add verification notice on this
     */
    public function actionDeleteMany()
    {
        $key = key($_POST);
        if (count($_POST[$key]) == 0)
            throw new CHttpException(500, 'No records were supplied to delete');
        
        foreach ($_POST[$key] as $k=>$id)
        {
            if ($id != 1)
            {
                $command = Yii::app()->db
                          ->createCommand("DELETE FROM configuration WHERE configuration.key = :key")
                          ->bindParam(":key", $id, PDO::PARAM_STR)
                          ->execute();
            }
        }
        
        Yii::app()->user->setFlash('success', 'Post has been deleted');
        
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }
    
    
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Configuration('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Configuration']))
			$model->attributes=$_GET['Configuration'];

		$this->render('index',array(
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
		$model=Configuration::model()->findByAttributes(array('key'=>$id));
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='configuration-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


    /**
     * 设置站点相关
     */
    public function actionWebSet()
    {
        $model =new Settings('webset');

        if(isset($_POST['Settings'])){
           $model->attributes = $_POST['Settings']; 
           if($model->validate() && $model->save()){
                    Yii::app()->user->setFlash('success','修改成功');
           } else {
                $errors =  $model->getErrors(); 
                foreach($errors as $error){
                    Yii::app()->user->setFlash('waring',$error);
                }
           }
        }
        $this->render('webset',array('model'=>$model));
    }

    /**
     * 设置站点相关
     */
    public function actionSocial()
    {
        $model =new Settings('social');

        if(isset($_POST['Settings'])){
           $model->attributes = $_POST['Settings']; 
           if($model->validate() && $model->save()){
                    Yii::app()->user->setFlash('success','修改成功');
           } else {
                $errors =  $model->getErrors(); 
                foreach($errors as $error){
                    Yii::app()->user->setFlash('waring',$error);
                }
           }
        }
        $this->render('social',array('model'=>$model));
    }
}
