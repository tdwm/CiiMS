<?php
$this->breadcrumbs=array(
	'Weixin Contents'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List WeixinContent','url'=>array('index')),
	array('label'=>'Create WeixinContent','url'=>array('create')),
	array('label'=>'View WeixinContent','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage WeixinContent','url'=>array('admin')),
);
?>

<h1>Update WeixinContent <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>