<?php
/* @var $this WeixinSettingController */
/* @var $model WeixinSetting */

$this->breadcrumbs=array(
	'Weixin Settings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List WeixinSetting', 'url'=>array('index')),
	array('label'=>'Manage WeixinSetting', 'url'=>array('admin')),
);
?>

<h1>Create WeixinSetting</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>