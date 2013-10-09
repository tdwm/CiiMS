

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'configuration-form',
    'enableAjaxValidation'=>false,
    'action'=>Yii::app()->createUrl('/admin/settings/save/id/' . $model->key)
)); ?>

    <?php $this->beginWidget('bootstrap.widgets.TbBox', array(
        'title' => '添加设置',
        'headerIcon' => 'icon-cogwheel',
        'id'=>'setBox',
        'headerButtons' => array(
            array(
                'class' => 'bootstrap.widgets.TbButtonGroup',
                'type' => 'primary',
                'id'=>'setSubmit',
                'htmlOptions' => array('style' => 'margin-right: 10px;'),
                'buttons' => array(
                    //sarray('url' => $this->createUrl('/admin/settings/managed'), 'type' => 'inverse', 'label' => 'Managed'),
                    array('buttonType' => 'submit', 'type' => 'primary', 'label' => $model->isNewRecord ? '添加' : '保存'),
                ),
            )
        )
    )); ?>
        <?php echo $form->errorSummary($model); ?>
        <p class="help-block">
            <?php 
                $this->widget( 'bootstrap.widgets.TbLabel', array( 'type' => 'info', 'label' => 'Note',));
            ?>
            包含<span class="required">*</span> 的必须填写.
        </p>
        <?php echo $form->textFieldRow($model,'key',array('class'=>'span11','maxlength'=>150)); ?>
        <?php echo $form->textFieldRow($model,'value',array('class'=>'span11','maxlength'=>150)); ?>
        <?php echo $form->textFieldRow($model,'hint',array('class'=>'span11','maxlength'=>200)); ?>
    <?php $this->endWidget(); ?>
<?php $this->endWidget(); ?>
