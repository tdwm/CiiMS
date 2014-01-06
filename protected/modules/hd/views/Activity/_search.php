<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'act_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'user_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'thumb',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'starttime',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'endtime',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'venue',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'limitnum',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'passed',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'content',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'prechange',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'alipay',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'created',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'updated',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
