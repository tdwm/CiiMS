<blockquote>
    <?php 
        $this->widget( 'bootstrap.widgets.TbLabel', array( 'type' => 'info', 'label' => 'Note',));
        echo " ".UserModule::t('Fields with <span class="required">*</span> are required.'); 
?>
</blockquote>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'user-form',
    'enableAjaxValidation'=>true,
    'enableClientValidation' => false,
    'type'=>'horizontal',
    'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

    <?php echo $form->errorSummary(array($model,$profile)); ?>
<div class="span5">
    <?php echo $form->textFieldRow($model,'username',array('size'=>20,'maxlength'=>20,'readonly'=>true)); ?>        
    <?php echo $form->passwordFieldRow($model,'password',array('value'=>'','size'=>60, 'maxlength'=>64, 'placeholder' => '更改密码，不更改请留空.')); ?>        
    <?php echo $form->textFieldRow($model,'email',array('size'=>60,'maxlength'=>128)); ?>        
</div>
<div class="span5">
    <?php 
    $profileFields=Profile::getFields();
    if ($profileFields) {
        foreach($profileFields as $field) {
            //echo $form->labelEx($profile,$field->varname); 
            if ($widgetEdit = $field->widgetEdit($profile)) {
                echo '<div class="control-group "><label class="control-label" for="Profile_'.$field->varname.'">'.$field->title.'</label>'; 
                echo '<div class="controls">';
                echo $widgetEdit;
                echo '</div></div>';
            } elseif ($field->range) {
                echo $form->dropDownListRow($profile,$field->varname,Profile::range($field->range));
            } elseif ($field->field_type=="TEXT") {
                echo CHtml::activeTextArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
            } else {
                echo $form->textFieldRow($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
            }
            //echo $form->error($profile,$field->varname);
        }
    }
    ?>
</div>
<div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save')); ?>
</div>
<?php $this->endWidget(); ?>
