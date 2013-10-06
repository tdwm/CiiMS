<?php $this->beginContent('//layouts/admin_main'); ?>
    <?php
        if($this->menu){
            $this->widget('bootstrap.widgets.TbMenu', array(
                'items'=>$this->menu,
                'htmlOptions'=>array('class'=>'operations'),
            ));
        }
    ?>
	<?php echo $content; ?>
<?php $this->endContent(); ?>
