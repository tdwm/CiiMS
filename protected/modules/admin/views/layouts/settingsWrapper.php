<?php $this->beginContent('//layouts/admin_content'); ?>
<!--
<div class="sidebar"><div class="header"><h3>Settings</h3></div><div id="main" class="nano has-scrollbar"><div class="content" tabindex="0" style="right: -15px;"><ul class="menu" id="yw1"><li class="icon-gears active"><a href="/dashboard/settings">General</a></li><li class="icon-group"><a href="/dashboard/users">Users</a></li><li class="icon-list"><a href="/dashboard/categories">Categories</a></li><li class="icon-bar-chart"><a href="/dashboard/settings/analytics">Analytics</a></li><li class="icon-eye-open"><a href="/dashboard/settings/appearance">Appearance</a></li><li class="icon-envelope-alt"><a href="/dashboard/settings/email">Email</a></li><li class="icon-twitter"><a href="/dashboard/settings/social">Social</a></li><li class="icon-th-large"><a href="/dashboard/settings/cards">Dashboard Cards</a></li><li class="icon-cloud"><a href="/dashboard/settings/system">System</a></li><li style="1" class="icon-desktop"><a href="/dashboard/settings/theme">Theme</a></li><li style="display: none" class="icon-mobile-phone"><a href="/dashboard/settings/theme/type/mobile">Mobile Theme</a></li><li style="display: none" class="icon-tablet"><a href="/dashboard/settings/theme/type/tablet">Tablet Theme</a></li></ul></div><div class="pane" style="display: block;"><div class="slider" style="height: 193px; top: 0px;"></div></div></div></div>
-->
    <div class="sidebar">
        <div class="header"><h3>设置</h3></div>
        <div id="main" class="nano has-scrollbar">
            <div class="rollcontent" tabindex="0" style="right: -15px;">
                <?php
                    $this->widget('bootstrap.widgets.TbMenu',array(
                        'type' => 'list',
                        'htmlOptions'=>array('class'=>'menu'),
                        'items' => array(
                            array(
                                'label' => '添加设置项',
                                'icon' => 'cogwheels',
                                'url'=>'/admin/settings/',
                                'itemOptions' => array('class' => 'active')
                            ),
                            array(
                                'label' => '基本设置',
                                'icon' => 'cogwheels',
                                'url'=>'/admin/settings/web',
                                'itemOptions' => array('class' => 'active')
                            ),
                            array('label' => 'Library', 'url' => '#'),
                            array('label' => 'Applications', 'url' => '#'),
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
                        )
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
