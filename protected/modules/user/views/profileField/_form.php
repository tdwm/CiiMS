<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'users-form',
    'enableAjaxValidation'=>false,
    'type'=>'horizontal',
    'htmlOptions' => array('enctype'=>'multipart/form-data','class'=>'content-container-form'),
)); ?>
<blockquote>
    <?php 
        $this->widget( 'bootstrap.widgets.TbLabel', array( 'type' => 'info', 'label' => 'Note',));
        echo ' '.UserModule::t('Fields with <span class="required">*</span> are required.'); 
    ?>
</blockquote>
	<?php echo CHtml::errorSummary($model); ?>
<div class="span5" >	
    <div class="row varname" >
    <?php echo $form->textFieldRow($model,'varname',array('size'=>60,'maxlength'=>50,'hint'=>UserModule::t("Allowed lowercase letters and digits.")));  ?>
    </div>
    <div class="row title">
    <?php echo $form->textFieldRow($model,'title',array('size'=>60,'maxlength'=>255,'hint'=>UserModule::t('Field name on the language of "sourceLanguage".'))); ?>
    </div>
    <div class="row field_type">
    <?php
    if ($model->id) {
    echo $form->textFieldRow($model,'field_type',array('size'=>60,'maxlength'=>50,'readonly'=>true,'hint'=>UserModule::t('Field type column in the database.'))); 
    } else {
    echo $form->dropDownListRow($model,'field_type',ProfileField::itemAlias('field_type'),array('id'=>'field_type','hint'=>UserModule::t('Field type column in the database.'))); 
    }
    ?>
    </div>
    <div class="row field_size">
    <?php echo $form->textFieldRow($model,'field_size',array('hint'=>UserModule::t('Field size column in the database.'))); //readonly ?> 
    </div>
    <div class="row field_size_min">
    <?php echo $form->textFieldRow($model,'field_size_min',array('hint'=>UserModule::t('The minimum value of the field (form validator),')));  ?> 
    </div>
    <div class="row required">
    <?php echo $form->dropDownListRow($model,'required',ProfileField::itemAlias('required'),array('hint'=>UserModule::t('Required field (form validator).')));  ?> 
    </div>
    <div class="row match">
    <?php echo $form->textFieldRow($model,'match',array('size'=>60,'maxlength'=>255,'hint'=>UserModule::t("Regular expression (example: '/^[A-Za-z0-9\s,]+$/u').")));  ?> 
    </div>
    <div class="row range">
    <?php echo $form->textFieldRow($model,'range',array('size'=>60,'maxlength'=>5000,'hint'=>UserModule::t('Predefined values (example: 1;2;3;4;5 or 1==One;2==Two;3==Three;4==Four;5==Five).')));  ?> 
    </div>
</div>
<div class="span5" >	
    <div class="row error_message">
    <?php echo $form->textFieldRow($model,'error_message',array('size'=>60,'maxlength'=>255,'hint'=>UserModule::t('Error message when you validate the form.'))); ?>
    </div>
    <div class="row other_validator">
    <?php echo $form->textFieldRow($model,'other_validator',array('size'=>60,'maxlength'=>255,'hint'=>UserModule::t('JSON string (example: {example}).',array('{example}'=>CJavaScript::jsonEncode(array('file'=>array('types'=>'jpg, gif, png')))))));  ?> 
    </div>
    <div class="row default">
    <?php echo $form->textFieldRow($model,'default',array('size'=>60,'maxlength'=>255,'hint'=>UserModule::t('The value of the default field (database).')));  ?> 
    </div>
    <div class="row widget">
    <?php
    list($widgetsList) = ProfileFieldController::getWidgets($model->field_type);
    echo $form->dropDownListRow($model,'widget',$widgetsList,array('id'=>'widgetlist','hint'=>UserModule::t('Widget name.')));
    ?>
    </div>
    <div class="row widgetparams">
    <?php echo $form->textFieldRow(
        $model,
        'widgetparams',
        array(
            'id'=>'widgetparams',
            'size'=>60,
            'maxlength'=>5000,
            'hint'=>UserModule::t('JSON string (example: {example}).',array('{example}'=>CJavaScript::jsonEncode(array('param1'=>array('val1','val2'),'param2'=>array('k1'=>'v1','k2'=>'v2'))))),
        ),
        array('class'=>'widgetparams')
    ); 
    ?>
    </div>
    <div class="row position">
    <?php echo $form->textFieldRow($model,'position',array('hint'=>UserModule::t('Display order of fields.'))); ?>
    </div>
    <div class="row visible">
    <?php echo $form->dropDownListRow($model,'visible',ProfileField::itemAlias('visible')); ?>
    </div>
</div>
<div class="buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save')); ?>
</div>
<?php $this->endWidget(); ?>
    <?php
    if ($model->id) {
        Yii::app()->clientScript->registerScript('setReadonly',"
            $.each(['varname','field_type','field_size','default'],function(keys,i){var t=$('input[id$='+i+']').attr('readonly',true);});
        ");
    }
    ?>
</div><!-- form -->
<div id="dialog-form" title="<?php echo UserModule::t('Widget parametrs'); ?>">
	<form>
	<fieldset>
		<label for="name">Name</label>
		<input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all" />
		<label for="value">Value</label>
		<input type="text" name="value" id="value" value="" class="text ui-widget-content ui-corner-all" />
	</fieldset>
	</form>
</div>
