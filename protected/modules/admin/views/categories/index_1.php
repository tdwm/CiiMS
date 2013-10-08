<?php
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'type' => 'striped bordered',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'responsiveTable' => true,
    'bulkActions' => array(
        'actionButtons' => array(
            array(
                'buttonType' => 'button',
                'type' => 'danger',
                'size' => 'small',
                'label' => '删除',
                'click' => 'js:function(values) {
                    $.post("categories/deleteMany", values, function(data) {
                        values.each(function() {
                            $(this).parent().parent().remove();
                                });
                            });
                            }'
                            )
                        ),
                        'checkBoxColumnConfig' => array(
                            'name' => 'id'
                        ),
                    ),
                    'columns' => array(
                        'id',
                        'name',
                        'slug',
                        array(
                            'class'=>'bootstrap.widgets.TbButtonColumn',
                            'viewButtonUrl'=>'Yii::app()->createUrl("/" . $data->slug)',
                            'deleteButtonUrl'=>'Yii::app()->createUrl("/admin/categories/delete/id/" . $data->id)',
                            'buttons'=>array(
                                'update'=>array(
                                    'url' => 'Yii::app()->createUrl("/admin/categories/save/",array("id"=>$data->id,"ajax"=>true))',
                                    'click'=>'js:function(even){
                                        even.preventDefault();
                                        _t = $(this);
                                        $("#editorForem").load($(this).attr("href")); 
                                 }',
                                 ),
                             )
                         ),
                     ),
                 ));
?>
