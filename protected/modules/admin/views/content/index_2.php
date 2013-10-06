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
                    $.post("content/deleteMany", values, function(data) {
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
            'author_id'=>array(
                'name'=>'author_id',
                'value'=>'$data->author->username'
            ),
            'title',
            'status'=>array(
                'name'=>'status',
                'value'=>'array_search($data->status, array("草稿"=>0, "发布"=>1))'
            ),
            'category_id'=>array(
                'name'=>'category_id',
                'value'=>'$data->category->name'
            ),
            'comment_count',
            array(
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'viewButtonUrl'=>'Yii::app()->createUrl($data->slug)',
                'updateButtonUrl'=>'Yii::app()->createUrl("/admin/content/save/id/" . $data->id)',
                'deleteButtonUrl'=>'Yii::app()->createUrl("/admin/content/delete/id/" . $data->id)',
            ),
        ),
    ));
?>
