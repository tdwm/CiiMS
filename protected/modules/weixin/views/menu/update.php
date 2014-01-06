<?php
/* @var $this WeixinSettingController */
/* @var $model WeixinSetting */

$this->breadcrumbs=array(
	'Weixin Settings'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List WeixinSetting', 'url'=>array('index')),
	array('label'=>'Create WeixinSetting', 'url'=>array('create')),
	array('label'=>'View WeixinSetting', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage WeixinSetting', 'url'=>array('admin')),
);
?>

<h1>Update WeixinSetting <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>