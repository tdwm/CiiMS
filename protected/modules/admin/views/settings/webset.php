<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
'id'=>'configuration-form',
'type'=>'horizontal',
'enableAjaxValidation'=>false,
'action'=>Yii::app()->createUrl('/admin/settings/webset')
)); ?>
<div class="header"></div>
<?php echo $form->errorSummary($model); ?>
<div id="main" class="nano has-scrollbar">
    <div class="rollcontent" tabindex="0" style="right: -15px;">
        <fieldset>
            <legend> Site Settings</legend>
            <div class="clearfix"> </div>
            
            <?php
                echo $form->textFieldRow($model,'name',array('style'=>'width:66%'));
                echo $form->toggleButtonRow($model, 'offline'); 
               // echo $form->textFieldRow($model, 'bcrypt_cost',array('id'=>'bcrypt_cost')); 

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
                        'options' => array('min' => 13,'max'=>50,'selection'=>'after','handle'=>'square','value'=>intval($model->bcrypt_cost)),
                        'events'=>array(
                            'slide'=>"js:function(ev){ $('#bcrypt_cost_output').text( $('#bcrypt_cost').val()); }",
                        ),
                        'style'=>'width:500px',
                        'id'=>'bcrypt_cost',
                    )
                ) ;
            ?>
            <div class="control-group ">
                <label class="control-label" for="WebSettings_offline"> 关闭网站</label>
                <div class="controls">
                    <div id="wrapper-WebSettings_offline" class="toggle-button" style="width: 100px; height: 25px;">
                        <input id="ytWebSettings_offline" type="hidden" value="0" name="WebSettings[offline]">
                        <div style="left: -50%; width: 150px;">
                            <input name="WebSettings[offline]" id="WebSettings_offline" value="1" type="checkbox">
                            <span class="labelLeft primary" style="width: 50px; height: 25px; line-height: 25px;">
                                ON</span>
                            <label for="ytWebSettings_offline" style="width: 50px; height: 25px;">
                            </label>
                            <span class="labelRight" style="width: 50px; height: 25px; line-height: 25px;">
                                OFF</span>
                        </div>
</div>
</div>
</div>

            <div class="control-group">
                <label> Password Strength Settings</label>
                <input class="pure-input-2-3" min="13" max="50" step="1" name="GeneralSettings[bcrypt_cost]" id="GeneralSettings_bcrypt_cost" type="range" value="13">
                <div class="output"> 13</div>
            </div>
            <div class="pure-control-group">
                <label>
                    Category Post Count</label>
                <input class="pure-input-2-3" min="1" max="100" step="1" name="GeneralSettings[categoryPaginationSize]" id="GeneralSettings_categoryPaginationSize" type="range" value="10">
                <div class="output">10</div>
            </div>
            <div class="pure-control-group">
                <label>
                    Content Post Cost</label>
                <input class="pure-input-2-3" min="1" max="100" step="1" name="GeneralSettings[contentPaginationSize]" id="GeneralSettings_contentPaginationSize" type="range" value="10">
                <div class="output">
                    10</div>
            </div>
            <div class="pure-control-group">
                <label>
                    Search Post Count</label>
                <input class="pure-input-2-3" min="1" max="100" step="1" name="GeneralSettings[searchPaginationSize]" id="GeneralSettings_searchPaginationSize" type="range" value="10">
                <div class="output">
                    10</div>
            </div>
            <legend>
                Disqus</legend>
            <div class="clearfix">
            </div>
            <div class="pure-control-group">
                <label>
                    Use Disqus Comments</label>
                <div class="pure-input-2-3" style="display: inline-block">
                    <label class="switch-light toggle candy blue">
                        <input type="checkbox" id="GeneralSettings_useDisqusComments" name="GeneralSettings[useDisqusComments]" class="pure-input-2-3" value="1">
                        <span>
                            <span>
                                Off</span>
                            <span>
                                On</span>
                        </span>
                        <a class="slide-button">
                        </a>
                    </label>
                </div>
            </div>
            <div class="pure-control-group">
                <label for="GeneralSettings_disqus_shortname">
                    Disqus Shortcode</label>
                <input class="pure-input-2-3" max="255" name="GeneralSettings[disqus_shortname]" id="GeneralSettings_disqus_shortname" type="text" maxlength="255">
                <span class="help-block error" id="GeneralSettings_disqus_shortname_em_" style="display: none">
                </span>
            </div>
            <legend>
                Comments</legend>
            <div class="clearfix">
            </div>
            <div class="pure-control-group">
                <label>
                    Notify Author on New Comment</label>
                <div class="pure-input-2-3" style="display: inline-block">
                    <label class="switch-light toggle candy blue">
                        <input type="checkbox" id="GeneralSettings_notifyAuthorOnComment" name="GeneralSettings[notifyAuthorOnComment]" class="pure-input-2-3" value="1" checked="checked">
                        <span>
                            <span>
                                Off</span>
                            <span>
                                On</span>
                        </span>
                        <a class="slide-button">
                        </a>
                    </label>
                </div>
            </div>
            <div class="pure-control-group">
                <label>
                    Auto Approve Comments</label>
                <div class="pure-input-2-3" style="display: inline-block">
                    <label class="switch-light toggle candy blue">
                        <input type="checkbox" id="GeneralSettings_autoApproveComments" name="GeneralSettings[autoApproveComments]" class="pure-input-2-3" value="1" checked="checked">
                        <span>
                            <span>
                                Off</span>
                            <span>
                                On</span>
                        </span>
                        <a class="slide-button">
                        </a>
                    </label>
                </div>
            </div>
            <legend>
                Display Settings</legend>
            <div class="clearfix">
            </div>
            <div class="pure-control-group">
                <label for="GeneralSettings_dateFormat" class="required">
                    Date Format <span class="required">
                        *</span>
                </label>
                <input class="pure-input-2-3" required="required" max="25" name="GeneralSettings[dateFormat]" id="GeneralSettings_dateFormat" type="text" maxlength="25" value="F jS, Y">
                <span class="help-block error" id="GeneralSettings_dateFormat_em_" style="display: none">
                </span>
            </div>
            <div class="pure-control-group">
                <label for="GeneralSettings_timeFormat" class="required">
                    Time Format <span class="required">
                        *</span>
                </label>
                <input class="pure-input-2-3" required="required" max="25" name="GeneralSettings[timeFormat]" id="GeneralSettings_timeFormat" type="text" maxlength="25" value="H:i">
                <span class="help-block error" id="GeneralSettings_timeFormat_em_" style="display: none">
                </span>
            </div>
            <div class="pure-control-group">
                <label for="GeneralSettings_timezone" class="required">
                    Timezone <span class="required">
                        *</span>
                </label>
                <input class="pure-input-2-3" required="required" max="25" name="GeneralSettings[timezone]" id="GeneralSettings_timezone" type="text" maxlength="25" value="America/Chicago">
                <span class="help-block error" id="GeneralSettings_timezone_em_" style="display: none">
                </span>
            </div>
            <div class="pure-control-group">
                <label for="GeneralSettings_defaultLanguage" class="required">
                    Default Language <span class="required">
                        *</span>
                </label>
                <input class="pure-input-2-3" required="required" max="25" name="GeneralSettings[defaultLanguage]" id="GeneralSettings_defaultLanguage" type="text" maxlength="25" value="en_US">
                <span class="help-block error" id="GeneralSettings_defaultLanguage_em_" style="display: none">
                </span>
            </div>
            <legend>
                Sphinx</legend>
            <div class="clearfix">
            </div>
            <div class="pure-control-group">
                <label>
                    Enable Sphinx Search</label>
                <div class="pure-input-2-3" style="display: inline-block">
                    <label class="switch-light toggle candy blue">
                        <input type="checkbox" id="GeneralSettings_sphinx_enabled" name="GeneralSettings[sphinx_enabled]" class="pure-input-2-3" value="1">
                        <span>
                            <span>
                                Off</span>
                            <span>
                                On</span>
                        </span>
                        <a class="slide-button">
                        </a>
                    </label>
                </div>
            </div>
            <div class="pure-control-group">
                <label for="GeneralSettings_sphinxHost">
                    Sphinx Hostname</label>
                <input class="pure-input-2-3" max="255" name="GeneralSettings[sphinxHost]" id="GeneralSettings_sphinxHost" type="text" maxlength="255" value="localhost">
                <span class="help-block error" id="GeneralSettings_sphinxHost_em_" style="display: none">
                </span>
            </div>
            <div class="pure-control-group">
                <label for="GeneralSettings_sphinxPort">
                    Sphinx Port</label>
                <input class="pure-input-2-3" name="GeneralSettings[sphinxPort]" id="GeneralSettings_sphinxPort" type="text" value="9312">
                <span class="help-block error" id="GeneralSettings_sphinxPort_em_" style="display: none">
                </span>
            </div>
            <div class="pure-control-group">
                <label for="GeneralSettings_sphinxSource">
                    Sphinx Source Name</label>
                <input class="pure-input-2-3" max="255" name="GeneralSettings[sphinxSource]" id="GeneralSettings_sphinxSource" type="text" maxlength="255">
                <span class="help-block error" id="GeneralSettings_sphinxSource_em_" style="display: none">
                </span>
            </div>
            <button id="header-button" escape="" class="pure-button pure-button-primary pure-button-small pull-right">
                <i class="icon-spinner icon-spin icon-spinner-form2" style="display: none">
                </i>
                Save Changes</button>
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
