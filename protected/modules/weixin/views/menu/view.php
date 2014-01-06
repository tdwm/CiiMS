<?php
/* @var $this WeixinSettingController */
/* @var $model WeixinSetting */

$this->breadcrumbs=array(
	'Weixin Settings'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List WeixinSetting', 'url'=>array('index')),
	array('label'=>'Create WeixinSetting', 'url'=>array('create')),
	array('label'=>'Update WeixinSetting', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete WeixinSetting', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WeixinSetting', 'url'=>array('admin')),
);
?>

<h1>View WeixinSetting #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'appid',
		'appkey',
		'token',
	),
)); ?>
