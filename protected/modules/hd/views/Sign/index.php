<?php
$this->breadcrumbs=array(
	'Hd Signs',
);

$this->menu=array(
	array('label'=>'Create HdSign','url'=>array('create')),
	array('label'=>'Manage HdSign','url'=>array('admin')),
);
?>

<h1>Hd Signs</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
