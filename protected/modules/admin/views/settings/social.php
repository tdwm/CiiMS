<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
'id'=>'configuration-form',
'type'=>'horizontal',
'enableAjaxValidation'=>false,
'action'=>Yii::app()->createUrl('/admin/settings/social')
)); ?>
<div class="header">
        <div class="pull-left" >
           <p> 社交登陆 </p>
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
            <legend> QQ设置 </legend>
            <div class="clearfix"> </div>
            
            <?php
                echo $form->toggleButtonRow($model, 'socialQQ'); 
                echo $form->textFieldRow($model,'socialQQappid',array('style'=>'width:66%'));
                echo $form->textFieldRow($model,'socialQQappkey',array('style'=>'width:66%'));
                echo $form->textFieldRow($model,'socialQQreturnurl',array('style'=>'width:66%'));
            ?>
            <legend> sina微博 </legend>
            <div class="clearfix"> </div>
            <?php
                echo $form->toggleButtonRow($model, 'socialSINA'); 
                echo $form->textFieldRow($model,'socialSINAclientid',array('style'=>'width:66%'));
                echo $form->textFieldRow($model,'socialSINAredirecturi',array('style'=>'width:66%'));
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
