<?php
/* @var $this WeixinSettingController */
/* @var $model WeixinSetting */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'weixin-setting-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'appid'); ?>
		<?php echo $form->textField($model,'appid',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'appid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'appkey'); ?>
		<?php echo $form->textField($model,'appkey',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'appkey'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'token'); ?>
		<?php echo $form->textField($model,'token',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'token'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->