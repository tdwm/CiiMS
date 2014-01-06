<?php $this->beginContent('//layouts/admin_content'); ?>
<?php

$assets = dirname(__FILE__).'/../assets';
$weixinBaseUrl = Yii::app()->assetManager->publish($assets);
Yii::app()->clientScript->registerCssFile($weixinBaseUrl .'/template.css');
?>
    <div class="sidebar">
        <div class="header"><h3>微信</h3></div>
        <div id="main" class="nano">
            <div class="content" tabindex="0" style="right: -15px;">
<?php
$setting_menu = array(
    'info'=>  array(
        'label' => '帮助说明',
        'icon' => 'circle-info',
        'url'=>'/weixin',
        'active'=>$this->id=='default',
        //'itemOptions' => array('class' => 'active')
    ),
    'settings'=>  array(
        'label' => '基本设置',
        'icon' => 'cogwheels',
        'url'=>'/weixin/setting/',
        'active'=>$this->id=='setting',
        //'itemOptions' => array('class' => 'active')
    ),
    'menu'=>  array(
        'label' => ' 菜单管理',
        'icon' => 'list',
        'url'=>'/weixin/menu',
        'active'=>$this->id=='menu',
    ),
    'page'=>  array(
        'label' => '展示内容',
        'icon' => 'list',
        'url'=>'/weixin/page',
        'active'=>$this->id=='page',
    ),
    'content'=>  array(
        'label' => '图文管理',
        'icon' => 'pen',
        'url'=>'/weixin/content',
        'active'=>$this->id=='content',
    ),
    'media'=>  array(
        'label' => '素材管理',
        'icon' => 'pen',
        'url'=>'/weixin/media',
        'active'=>$this->id=='media',
        'items'=>array(
            array('label'=>'图文','url'=>'/wexin/content/picword/','icon'=>''),
            array('label'=>'图片','url'=>$this->createUrl('/weixin/media/',array('type'=>2)),'icon'=>''),
            array('label'=>'声音','url'=>$this->createUrl('/weixin/media/',array('type'=>3)),'icon'=>''),
            array('label'=>'视频','url'=>$this->createUrl('/weixin/media/',array('type'=>4)),'icon'=>''),
        )
    ),
    /*
    array(
        'label' => 'Another list header',
        'itemOptions' => array('class' => 'nav-header')
    ),
    array('label' => 'Library', 'url' => '#'),
    array('label' => 'Applications', 'url' => '#'),
    array(
        'label' => 'Another list header',
        'itemOptions' => array('class' => 'nav-header')
    ),
    array('label' => 'Profile', 'url' => '#'),
    array('label' => 'Settings', 'url' => '#'),
    '',
    array('label' => 'Help', 'url' => '#'),
     */
);
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
