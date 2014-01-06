<?php
$this->breadcrumbs=array(
	'Hd Activities'=>array('index'),
	$model->title=>array('view','id'=>$model->act_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List HdActivity','url'=>array('index')),
	array('label'=>'Create HdActivity','url'=>array('create')),
	array('label'=>'View HdActivity','url'=>array('view','id'=>$model->act_id)),
	array('label'=>'Manage HdActivity','url'=>array('admin')),
);
?>

<h1>Update HdActivity <?php echo $model->act_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>