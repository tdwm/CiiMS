<?php
$this->breadcrumbs=array(
	'Hd Signs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List HdSign','url'=>array('index')),
	array('label'=>'Create HdSign','url'=>array('create')),
	array('label'=>'Update HdSign','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete HdSign','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HdSign','url'=>array('admin')),
);
?>

<h1>View HdSign #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'act_id',
		'user_id',
		'info',
		'tel',
		'remark',
		'iflead',
		'pass',
		'created',
	),
)); ?>
