<?php
$this->breadcrumbs=array(
	'Hd Activities'=>array('index'),
	'Create',
);

?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
'id'=>'configuration-form',
'enableAjaxValidation'=>false,
)); ?>
<div class="header" id="hdCreateHeader">
        <div class="pull-left" >
           <p> 添加活动 </p>
        </div>
        <div class="pull-right" >
            <?php 
                $this->widget('bootstrap.widgets.TbButton',array(
                    'type'=>'primary',
                    'label'=>'保存',
                    'id'=>'header-button',
                    'buttonType'=>'submit',
                    //'icon'=>'icon-restart icon-spin hide',
                    'htmlOptions' => array('class'=>'pull-right')
                ));
            ?>
        </div>
</div>
<div id="main" class="nano has-scrollbar">
    <div class="content row-fluid" >
        <?php echo $this->renderPartial('_form', array('model'=>$model,'form'=>$form)); ?>
    </div>
</div>
<?php $this->endWidget(); ?>
