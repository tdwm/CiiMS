<?php $this->beginContent('//layouts/dashboard'); ?>
        <div>
         <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
             'htmlOptions' => array(
                'class' => 'pull-right'
             ),
            'buttons'=>array(
                array('label'=>'', 'url'=> $this->createUrl('/admin/content/perspective?id=1'), 'icon' => 'show-big-thumbnails', 'htmlOptions' => array('class'=>Yii::app()->session['admin_perspective'] == 1 ? 'active' : NULL)),
                array('label'=>'', 'url'=>$this->createUrl('/admin/content/perspective?id=2'), 'icon' => 'list', 'htmlOptions' => array('class'=>Yii::app()->session['admin_perspective'] == 2 ? 'active' : 'hidden-phone')),
                array('label' => '添加','title'=>'添加', 'url' => $this->createUrl('/admin/content/save'), 'icon'=>'edit' , 'type'=>'primary'),
            ),
        )); ?>
        </div>
        <div class="clearfix"></div>
        <?php echo $content; ?>
<?php $this->endContent(); ?>
