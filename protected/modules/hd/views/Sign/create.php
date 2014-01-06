<?php
$this->breadcrumbs=array(
	'Hd Signs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List HdSign','url'=>array('index')),
	array('label'=>'Manage HdSign','url'=>array('admin')),
);
?>

<h1>Create HdSign</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>