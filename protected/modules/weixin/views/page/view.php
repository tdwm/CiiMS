<?php
$this->breadcrumbs=array(
	'Weixin Contents'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List WeixinContent','url'=>array('index')),
	array('label'=>'Create WeixinContent','url'=>array('create')),
	array('label'=>'Update WeixinContent','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete WeixinContent','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WeixinContent','url'=>array('admin')),
);
?>

<h1>View WeixinContent #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'type',
		'title',
		'thumb',
		'desc',
		'content',
		'created',
		'flag',
	),
)); ?>
