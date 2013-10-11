<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
'id'=>'configuration-form',
'type'=>'horizontal',
'enableAjaxValidation'=>false,
'action'=>Yii::app()->createUrl('/admin/settings/webset')
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
                echo $form->textFieldRow($model,'name',array('style'=>'width:66%'));
                echo $form->toggleButtonRow($model, 'offline'); 
                /*
                $this->widget('bootstrap.widgets.TbSlider',array(
                    'model'=>$model,
                    'attribute'=>'bcrypt_cost',
                    'options'=>array(
                        'min'=>13,
                        'max'=>50,
                    )
                
                ));
                 */
                echo $form->sliderRow(
                    $model,
                    'bcrypt_cost',
                    array(
                        'options' => array('min' => 13,'max'=>50,'selection'=>'after','handle'=>'square','value'=>intval($model->bcrypt_cost),'output'=>true),
                        'events'=>array(
                            'slide'=>"js:function(ev){ $('#bcrypt_cost_output').text( $('#bcrypt_cost').val()); }",
                        ),
                        'style'=>'width:500px',
                        'id'=>'bcrypt_cost',
                    )
                ) ;
                echo $form->sliderRow(
                    $model,
                    'categoryPaginationSize',
                    array(
                        'options' => array('min' => 1,'max'=>100,'selection'=>'after','handle'=>'square','value'=>intval($model->categoryPaginationSize),'output'=>true),
                        'events'=>array(
                            'slide'=>"js:function(ev){ $('#categoryPaginationSize_output').text( $('#categoryPaginationSize').val()); }",
                        ),
                        'style'=>'width:500px',
                        'id'=>'categoryPaginationSize',
                    )
                ) ;
                echo $form->sliderRow(
                    $model,
                    'contentPaginationSize',
                    array(
                        'options' => array('min' => 1,'max'=>100,'selection'=>'after','handle'=>'square','value'=>intval($model->contentPaginationSize),'output'=>true),
                        'events'=>array(
                            'slide'=>"js:function(ev){ $('#contentPaginationSize_output').text( $('#contentPaginationSize').val()); }",
                        ),
                        'style'=>'width:500px',
                        'id'=>'contentPaginationSize',
                    )
                ) ;
                echo $form->sliderRow(
                    $model,
                    'searchPaginationSize',
                    array(
                        'options' => array('min' => 1,'max'=>100,'selection'=>'after','handle'=>'square','value'=>intval($model->searchPaginationSize),'output'=>true),
                        'events'=>array(
                            'slide'=>"js:function(ev){ $('#searchPaginationSize_output').text( $('#searchPaginationSize').val()); }",
                        ),
                        'style'=>'width:500px',
                        'id'=>'searchPaginationSize',
                    )
                ) ;
            ?>
            <legend> 评论设置 </legend>
            <div class="clearfix"> </div>
            <?php
                echo $form->toggleButtonRow($model, 'notifyAuthorOnComment'); 
                echo $form->toggleButtonRow($model, 'autoApproveComments'); 
            ?>
            <legend> 显示设置 </legend>
            <div class="clearfix"> </div>
            <?php
                echo $form->textFieldRow($model,'dateFormat',array('style'=>'width:66%'));
                echo $form->textFieldRow($model,'timeFormat',array('style'=>'width:66%'));
                echo $form->textFieldRow($model,'timezone',array('style'=>'width:66%'));
                echo $form->textFieldRow($model,'defaultLanguage',array('style'=>'width:66%'));
            ?>
            
            <legend> Sphinx </legend>
            <div class="clearfix"> </div>
            <?php
                echo $form->toggleButtonRow($model, 'sphinx_enabled'); 
                echo $form->textFieldRow($model,'sphinxHost',array('style'=>'width:66%'));
                echo $form->textFieldRow($model,'sphinxPort',array('style'=>'width:66%'));
                echo $form->textFieldRow($model,'sphinxSource',array('style'=>'width:66%'));
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

<?php 
                
/*                
$this->beginWidget('bootstrap.widgets.TbBox', array(
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
));
 */
?>
<?php $this->endWidget(); ?>
