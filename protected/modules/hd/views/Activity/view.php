<?php
$this->breadcrumbs=array(
	'Hd Activities'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List HdActivity','url'=>array('index')),
	array('label'=>'Create HdActivity','url'=>array('create')),
	array('label'=>'Update HdActivity','url'=>array('update','id'=>$model->act_id)),
	array('label'=>'Delete HdActivity','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->act_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HdActivity','url'=>array('admin')),
);
?>

<h1>View HdActivity #<?php echo $model->act_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'act_id',
		'user_id',
		'title',
		'thumb',
		'starttime',
		'endtime',
		'venue',
		'limitnum',
		'passed',
		'content',
		'prechange',
		'alipay',
		'created',
		'updated',
	),
)); ?>
