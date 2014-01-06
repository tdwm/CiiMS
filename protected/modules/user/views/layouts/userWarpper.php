<?php $this->beginContent('//layouts/admin_content'); ?>
<div class="main-body nano" >
    <?php
$this->menu = array(
    array(
        'class'=>'bootstrap.widgets.TbMenu',
        'htmlOptions'=>array('class'=>'operations'),
        'items'=> array(
            array(
                'label' => '用户管理',
                'url' => '#',
                'items'=> array(
                    array('label'=>UserModule::t('Create User'), 'url'=>array('/user/admin/create')),
                    array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin/admin')),
                    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
                ),
                'active'=>$this->id == 'admin',
            ), 
            array(
                'label' => '字段管理',
                'url' => '#',
                'items'=> array(
                    array('label'=>UserModule::t('Create Profile Field'), 'url'=>array('/user/profilefield/create')),
                    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('/user/profilefield/admin')),
                ),
                'active'=>$this->id == 'profilefield',
            ), 
        )
    ),
    array(
        'class' => 'bootstrap.widgets.TbButtonGroup',
        'htmlOptions' => array('class' => 'pull-right'),
        'buttons'=>array(
            array('label'=>'', 'url'=> $this->createUrl('/user/user/update'),'type'=>$this->id=='user'&&$this->action->id=='update'?'info':'', 'icon' => 'settings','htmlOptions'=>array('title'=>'个人信息')),
            array('label'=>'', 'url'=> $this->createUrl('/user/admin/create'),'type'=>$this->id=='admin'&&$this->action->id=='create'?'info':'', 'icon' => 'user-add','htmlOptions'=>array('title'=>'添加用户')),
            array('label'=>'', 'url'=> $this->createUrl('/user/profilefield/create'),'type'=>$this->id=='profilefield'&&$this->action->id=='create'?'info':'', 'icon' => 'database-plus','htmlOptions'=>array('title'=>'添加字段')),
        )
    )
);
?>
    <div class="row-fluid content" >
        <?php echo $content; ?>
    </div>
</div>
<?php $this->endContent(); ?>
