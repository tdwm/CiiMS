<?php $this->beginContent('//layouts/admin_content'); ?>
    <div class="sidebar">
        <div class="header"><h3>设置</h3></div>
        <div id="main" class="nano">
            <div class="content" tabindex="0" style="right: -15px;">
<?php
    $setting_menu = array(
        'index'=>  array(
            'label' => '添加设置',
            'icon' => 'pen',
            'url'=>'/admin/settings/',
            //'itemOptions' => array('class' => 'active')
        ),
        'webset'=>  array(
            'label' => '基本设置',
            'icon' => 'cogwheels',
            'url'=>'/admin/settings/webset',
            'active'=>$this->id=='webset',
            // 'itemOptions' => array('class' => 'active')
        ),
        'social'=> array('label' => '社交登陆','icon'=>'twitter', 'url' => '/admin/settings/social'),
        'none' => array('label' => 'Applications', 'url' => '#'),
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
