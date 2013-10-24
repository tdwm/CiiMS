<?php $this->beginContent('//layouts/admin_content'); ?>
<div class="main-body nano" >
<?php
$buttons = array(
            array('label'=>'', 'url'=> $this->createUrl('/admin/content/perspective?id=1'), 'icon' => 'show-big-thumbnails', 'htmlOptions' => array('class'=>Yii::app()->session['admin_perspective'] == 1 ? 'active' : NULL)),
            array('label'=>'', 'url'=>$this->createUrl('/admin/content/perspective?id=2'), 'icon' => 'list', 'htmlOptions' => array('class'=>Yii::app()->session['admin_perspective'] == 2 ? 'active' : 'hidden-phone')),
            array('label' => '添加','title'=>'添加', 'url' => $this->createUrl('/admin/content/save'), 'icon'=>'edit' , 'type'=>$this->id==content&&$this->action->id=='save'?'info':''),
        );
if(isset($this->navgroupmenu)){
    $buttons = array_merge($buttons,$this->navgroupmenu);
}
$this->menu = array(
    array(
        'class' => 'bootstrap.widgets.TbButtonGroup',
        'htmlOptions' => array('class' => 'pull-right'),
        'buttons'=> $buttons,
    ),
);
if(isset($this->navmenu)){
    $this->menu = array_merge($this->menu,$this->navmenu);
}
?>
    <div class="content" >
        <?php echo $content; ?>
    </div>
</div>
<?php $this->endContent(); ?>
