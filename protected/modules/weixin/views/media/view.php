<?php
$this->breadcrumbs=array(
	'Weixin Medias'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List WeixinMedia','url'=>array('index')),
	array('label'=>'Create WeixinMedia','url'=>array('create')),
	array('label'=>'Update WeixinMedia','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete WeixinMedia','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WeixinMedia','url'=>array('admin')),
);
?>

<h1>View WeixinMedia #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'sign',
		'title',
		'desc',
		'source',
		'ext',
		'created',
		'updated',
		'delflag',
	),
)); ?>
