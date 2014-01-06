<?php
$this->breadcrumbs=array(
	'Weixin Medias'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List WeixinMedia','url'=>array('index')),
	array('label'=>'Create WeixinMedia','url'=>array('create')),
	array('label'=>'View WeixinMedia','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage WeixinMedia','url'=>array('admin')),
);
?>

<h1>Update WeixinMedia <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>