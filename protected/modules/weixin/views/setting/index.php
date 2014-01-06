<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
'id'=>'configuration-form',
'type'=>'horizontal',
'enableAjaxValidation'=>false,
'action'=>Yii::app()->createUrl('/weixin/setting/')
)); ?>
<div class="header">
        <div class="pull-left" >
           <p> 基本设置 </p>
        </div>
        <div class="pull-right" >
            <?php 
                $this->widget('bootstrap.widgets.TbButton',array(
                    'type'=>'primary',
                    'label'=>'保存',
                    'id'=>'header-button',
                    'buttonType'=>'submit',
                    'icon'=>'icon-restart icon-spin hide',
                    'htmlOptions' => array('class'=>'pull-right')
                ));
            ?>
        </div>
</div>
<?php echo $form->errorSummary($model); ?>
<div id="main" class="nano has-scrollbar">
    <div class="content" >
        <fieldset>
            <legend> 网站设置 </legend>
            <div class="clearfix"> </div>
            <?php
                echo $form->textFieldRow($model,'appid',array('style'=>'width:66%'));
                echo $form->textFieldRow($model,'appkey',array('style'=>'width:66%'));
                echo $form->textFieldRow($model,'token',array('style'=>'width:66%'));
            ?>
            <div class="pull-right" >
                <?php 
                    $this->widget('bootstrap.widgets.TbButton',array(
                        'type'=>'primary',
                        'label'=>'保存',
                        'id'=>'header-button',
                        'buttonType'=>'submit',
                        'icon'=>'icon-restart icon-spin hide',
                        'htmlOptions' => array('class'=>'pull-right')
                    ));
                ?>
            </div>
        </fieldset>
    </div>
    <div class="pane">
        <div class="slider" style="height: 107px; top: 0px;">
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>
