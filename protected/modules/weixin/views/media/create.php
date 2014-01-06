<?php
$this->breadcrumbs=array(
	'Weixin Medias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List WeixinMedia','url'=>array('index')),
	array('label'=>'Manage WeixinMedia','url'=>array('admin')),
);
?>

<h1>Create WeixinMedia</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>