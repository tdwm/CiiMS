<?php
$this->breadcrumbs=array(
	'Hd Signs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List HdSign','url'=>array('index')),
	array('label'=>'Create HdSign','url'=>array('create')),
	array('label'=>'View HdSign','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage HdSign','url'=>array('admin')),
);
?>

<h1>Update HdSign <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>