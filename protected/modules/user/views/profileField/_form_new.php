<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'users-form',
    'enableAjaxValidation'=>true,
    'type'=>'horizontal',
    'htmlOptions' => array('enctype'=>'multipart/form-data','class'=>'content-container-form'),
)); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

	<?php echo CHtml::errorSummary($model); ?>
	
<?php
echo $form->textFieldRow($model,'varname',array('size'=>60,'maxlength'=>50,'hint'=>UserModule::t("Allowed lowercase letters and digits."))); 
echo $form->textFieldRow($model,'title',array('size'=>60,'maxlength'=>255,'hint'=>UserModule::t('Field name on the language of "sourceLanguage".'))); 
echo $form->textFieldRow($model,'field_type',array('size'=>60,'maxlength'=>50,'hint'=>UserModule::t('Field type column in the database.'))); //readonly
echo $form->textFieldRow($model,'field_size',array('hint'=>UserModule::t('Field size column in the database.'))); //readonly
echo $form->textFieldRow($model,'field_size_min',array('hint'=>UserModule::t('The minimum value of the field (form validator),'))); 
echo $form->dropDownListRow($model,'required',ProfileField::itemAlias('required'),array('hint'=>UserModule::t('Required field (form validator).'))); 
echo $form->textFieldRow($model,'match',array('size'=>60,'maxlength'=>255,'hint'=>UserModule::t("Regular expression (example: '/^[A-Za-z0-9\s,]+$/u')."))); 
echo $form->textFieldRow($model,'range',array('size'=>60,'maxlength'=>5000,'hint'=>UserModule::t('Predefined values (example: 1;2;3;4;5 or 1==One;2==Two;3==Three;4==Four;5==Five).'))); 
echo $form->textFieldRow($model,'error_message',array('size'=>60,'maxlength'=>255,'hint'=>UserModule::t('Error message when you validate the form.'))); 
echo $form->textFieldRow($model,'other_validator',array('size'=>60,'maxlength'=>255,'hint'=>UserModule::t('JSON string (example: {example}).',array('{example}'=>CJavaScript::jsonEncode(array('file'=>array('types'=>'jpg, gif, png'))))))); 
echo $form->textFieldRow($model,'default',array('size'=>60,'maxlength'=>255,'hint'=>UserModule::t('The value of the default field (database).'))); 
echo $form->textFieldRow($model,'widget',array('hint'=>UserModule::t('Widget name.'))); 
echo $form->textFieldRow($model,'widgetparams',array('id'=>'widgetparams','size'=>60,'maxlength'=>5000,'hint'=>UserModule::t('JSON string (example: {example}).',array('{example}'=>CJavaScript::jsonEncode(array('param1'=>array('val1','val2'),'param2'=>array('k1'=>'v1','k2'=>'v2'))))))); 
echo $form->textFieldRow($model,'position',array('hint'=>UserModule::t('Display order of fields.'))); 
echo $form->dropDownListRow($model,'visible',ProfileField::itemAlias('visible')); 
?>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save')); ?>
	</div>

<?php $this->endWidget(); ?>

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
