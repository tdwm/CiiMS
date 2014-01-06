<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
'id'=>'configuration-form',
'enableAjaxValidation'=>false,
)); ?>
<div class="header" id="weixinCreateHeader">
        <div class="pull-left" >
           <p> 文章管理 </p>
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
        <div id="preview" class="span4">
            <?php echo $this->renderPartial('_view'.$type, array('data'=>$model,'form'=>$form)); ?>
        </div>
        <div class="span5">
            <?php echo $this->renderPartial('_form'.$type, array('model'=>$model,'form'=>$form,'singles'=>$singles)); ?>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>
