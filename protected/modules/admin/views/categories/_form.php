<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'categories-form',
    'enableAjaxValidation'=>true,
    'action'=>Yii::app()->createUrl('/admin/categories/save/id/' . $model->id)
)); ?>
    
    <?php $this->beginWidget('bootstrap.widgets.TbBox', array(
        'title' => '分类',
        'headerIcon' => 'icon-sampler',
        'id'=>'catboxform',
        'headerButtons' => array(
            array(
                'class' => 'bootstrap.widgets.TbButton',
                'buttonType'=>'submit',
                 'id'=>'catSubmit',
                'type'=>'primary',
                'label'=> '添加' ,
                'visible'=>$model->isNewRecord,
                'htmlOptions' => array(
                    'style' => 'margin-right: 10px;'
                )
            ),
            array(
                'class' => 'bootstrap.widgets.TbButtonGroup',
                'id'=>'catSubmit',
                'htmlOptions' => array(
                    'style' => 'margin-right: 10px;',
                    'class'=>$model->isNewRecord?'hide':'show',
                ),
                'buttons'=>array(
                    array('label'=>'保存','buttonType'=>'submit','type'=>'primary'),
                    array('label'=>'查看','url'=>$this->createUrl("/" . $model->slug)),
                    array('label'=>'删除','type'=>'danger','url'=>$this->createUrl("/admin/categories/delete/id/" . $model->id)),
                )
            )
        )
    )); ?>
        <p class="help-block">包含 <span class="required">*</span> 必须填写.</p>
    
        <?php echo $form->errorSummary($model); ?>
        
        <?php if (!$model->isNewRecord): ?>
            <?php echo $form->hiddenField($model, 'id'); ?>
        <?php endif; ?>
        <?php //echo $form->dropDownListRow($model,'parent_id',CHtml::listData(Categories::model()->findAll(), 'id', 'name'), array('class'=>'span11','encode'=>false,'prompt'=>'--根目录--')); ?>
        <?php echo $form->dropDownListRow($model,'parent_id',CHtml::listData(Categories::model()->findAll(array('order'=>'path')), 'id', 'optionName'), array('class'=>'span11','encode'=>false,'prompt'=>'--根目录--')); ?>
    
        <?php echo $form->textFieldRow($model,'name',array('class'=>'span11','maxlength'=>150)); ?>
    
        <?php echo $form->textFieldRow($model,'slug',array('class'=>'span11','maxlength'=>150)); ?>

    <?php $this->endWidget(); ?>
<?php $this->endWidget(); ?>
<?php
if($ajax){
    echo " <script> $('#catboxform').effect('highlight',1200);
           $('#catboxform').notify('在这里修改',{position:'left center',className:'info'}); 
        </script> ";
}
?>
