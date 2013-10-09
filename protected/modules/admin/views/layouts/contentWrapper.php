<?php $this->beginContent('//layouts/admin_content'); ?>
<div class="main-body nano" >
<?php
$this->menu = array(
    array(
        'class' => 'bootstrap.widgets.TbButtonGroup',
        'htmlOptions' => array('class' => 'pull-right'),
        'buttons'=>array(
            array('label'=>'', 'url'=> $this->createUrl('/admin/content/perspective?id=1'), 'icon' => 'show-big-thumbnails', 'htmlOptions' => array('class'=>Yii::app()->session['admin_perspective'] == 1 ? 'active' : NULL)),
            array('label'=>'', 'url'=>$this->createUrl('/admin/content/perspective?id=2'), 'icon' => 'list', 'htmlOptions' => array('class'=>Yii::app()->session['admin_perspective'] == 2 ? 'active' : 'hidden-phone')),
            array('label' => '添加','title'=>'添加', 'url' => $this->createUrl('/admin/content/save'), 'icon'=>'edit' , 'type'=>$this->id==content&&$this->action->id=='save'?'info':''),
        )
    ),
);

?>
    <div class="rollcontent" >
        <?php echo $content; ?>
    </div>
</div>
<?php $this->endContent(); ?>
