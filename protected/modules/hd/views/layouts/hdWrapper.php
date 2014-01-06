<?php $this->beginContent('//layouts/admin_content'); ?>
<?php

$assets = dirname(__FILE__).'/../assets';
$hdBaseUrl = Yii::app()->assetManager->publish($assets);
Yii::app()->clientScript->registerCssFile($hdBaseUrl .'/css/main.css');
Yii::app()->clientScript->registerCssFile($hdBaseUrl .'/css/template.css');
?>
    <div class="sidebar">
        <div class="header"><h3>活动</h3></div>
        <div id="main" class="nano">
            <div class="content" tabindex="0" style="right: -15px;">
<?php
$setting_menu = $this->activity_menu;
if(isset($setting_menu[$this->action->id])){
    $setting_menu[$this->action->id]['active'] = true;
}

$this->widget('bootstrap.widgets.TbMenu',array(
    'type' => 'list',
    'htmlOptions'=>array('class'=>'menu'),
    'items' => $setting_menu,
));    
?>
            </div>
        </div>
    </div>
    <div class="body-content" >
        <?php echo $content; ?>
    </div>
</div>
<?php $this->endContent(); ?>
