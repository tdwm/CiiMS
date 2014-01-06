<?php
/* @var $this WeixinSettingController */
/* @var $data WeixinSetting */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('appid')); ?>:</b>
	<?php echo CHtml::encode($data->appid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('appkey')); ?>:</b>
	<?php echo CHtml::encode($data->appkey); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('token')); ?>:</b>
	<?php echo CHtml::encode($data->token); ?>
	<br />


</div>