<?php

class DefaultController extends CiiController
{
    public $layout='weixinWrapper';
	public function actionIndex()
	{
		$this->render('index');
	}
}
