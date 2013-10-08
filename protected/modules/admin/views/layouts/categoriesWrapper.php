<?php $this->beginContent('//layouts/admin_content'); ?>
<?php
$this->menu = array(
    array(
        'class' => 'bootstrap.widgets.TbButtonGroup',
        'htmlOptions' => array('class' => 'pull-right'),
        'buttons'=>array(
            array('label'=>'', 'url'=> $this->createUrl('/admin/categories/perspective?id=2'), 'icon' => 'tree-conifer', 'htmlOptions' => array('class'=>Yii::app()->session['admin_cat_perspective'] == 2 ? 'active' : NULL)),
            array('label'=>'', 'url'=>$this->createUrl('/admin/categories/perspective?id=1'), 'icon' => 'list', 'htmlOptions' => array('class'=>Yii::app()->session['admin_cat_perspective'] == 1 ? 'active' : 'hidden-phone')),
            array('label' => '添加','title'=>'添加', 'url' => $this->createUrl('/admin/categories/save',array('ajax'=>true)), 'icon'=>'edit','htmlOptions'=>array('id'=>'editorCatButton')),
        )
    ),
);

?>
<div class="row-fluid" style="margin-top:40px;">
    <div class="span8" style="margin-top: -20px;">
        <?php echo $content; ?>
    </div>
    <div class="span4 " id="editorForem">
        <?php $this->renderPartial('_form', array('model' => $this->model)); ?>
    </div>
</div>
<script>
    $('#editorCatButton').on('click',function(even){
                even.preventDefault();
                _t = $(this);
                $("#editorForem").load($(this).attr("href")); 
    });
</script>
<?php $this->endContent(); ?>
