<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
$this->breadcrumbs=array(
    UserModule::t("Login"),
);
?>

<div class="login-container">
    <div class="sidebar">
        <div class="well-span">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'					=>	'login-form',
    'focus'					=>'	input[type="text"]:first',
    'enableAjaxValidation'	=>	true
)); ?>
            <div class="login-form-container">
                <h1><?php echo UserModule::t("登陆"); ?></h1>

                <?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

                <div class="success">
                    <?php echo Yii::app()->user->getFlash('loginMessage'); ?>
                </div>

                <?php endif; ?>

						<?php if ($model->hasErrors()): ?>
							<div class="alert alert-error" style="margin-bottom: -5px;">
							  	<button type="button" class="close" data-dismiss="alert">&times;</button>
							  	<strong>Oops!</strong> <?php echo CHtml::errorSummary($model); ?>
							</div>
						<?php endif; ?>
						<?php echo $form->TextField($model, 'username', array('id'=>'username', 'placeholder'=>'Email Address')); ?>
						<?php echo $form->PasswordField($model, 'password', array('id'=>'password', 'placeholder'=>'Password')); ?>

					<div class="login-form-footer">
                        <?php echo CHtml::link(UserModule::t("注册"),Yii::app()->getModule('user')->registrationUrl, array('class' => 'login-form-links')); ?> 
						<span class="login-form-links"> | </span>
 <?php echo CHtml::link(UserModule::t("忘记密码?"),Yii::app()->getModule('user')->recoveryUrl, array('class' => 'login-form-links')); ?>
<?php echo $form->checkboxRow($model, 'rememberMe'); ?>
                    </div>
						<?php $this->widget('bootstrap.widgets.TbButton', array(
								'buttonType' => 'submit',
	    	                    'type' => 'success',
	    	                    'label' => 'Submit',
	    	                    'htmlOptions' => array(
	    	                        'id' => 'submit-comment',
	    	                        'class' => 'sharebox-submit pull-right',
	    	                        'style' => 'margin-top: -4px'
	    	                    )
	    	                )); ?>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
