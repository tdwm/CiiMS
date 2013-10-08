<?php
/*
    $this->widget('bootstrap.widgets.TbButtonGroup',array(
         'htmlOptions' => array('id'=>'treeviewcontrol'),
         'buttons' => array(
          array('icon'=>'resize-small','label'=>'折叠'),  
          array('icon'=>'resize-full','label'=>'展开'),  
          array('icon'=>'retweet','label'=>'展开/折叠'),  
      )
    ));
 */
?>
<style>
#categories_tree{
    min-height:300px;
}
</style>

<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => '列表',
    'id'=>'categories_tree',
    'htmlOptions'=>array('style'=>'margin-top:20px;'),
    'headerButtons' => array(
        array(
            'class' => 'bootstrap.widgets.TbButtonGroup',
            'htmlOptions' => array(
                'id'=>'treeviewcontrol',
            ),
            'buttons' => array(
                array('label'=>'折叠'),  
                array('label'=>'展开'),  
                array('label'=>'展开/折叠'),  
            )
        )
    )
)); ?>
<?php
    $this->widget('ext.MTreeView.MTreeView', array(
        //'collapsed' => true,
        'animated' => 'fast',
        'table' => 'categories', //what table the menu would come from
        'hierModel' => 'adjacency', //hierarchy model of the table
        //'conditions' => array('id!=1'), //other conditions if any. Each fields should be prefixed with 't1.' to avoid query errors
        //declaration of fields
        'htmlOptions' => array(
            //'class' => 'treeview-red ', //there are some classes that ready to use
        ),
        'fields' => array(
            'text' => 'name',
            'alt' => false,
            'icon' => false,
            'tooltip' => false,
            'task' => false,
            'id_parent' => 'parent_id',
            'position' => 'parent_id',
            'url' => array('/admin/categories/save', array('id' => 'id','ajax'=>'id'))
        ),
        'control' => '#treeviewcontrol',
        'template'=>'{text}',
        'ajaxOptions'=>array('update'=>'#editorForem')
    ));
?>
<?php $this->endWidget(); ?>
