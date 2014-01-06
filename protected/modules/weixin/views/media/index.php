<?php
$this->breadcrumbs=array(
	'Weixin Medias',
);

$this->menu=array(
	array('label'=>'Create WeixinMedia','url'=>array('create')),
	array('label'=>'Manage WeixinMedia','url'=>array('admin')),
);
?>

<h1>Weixin Medias</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
