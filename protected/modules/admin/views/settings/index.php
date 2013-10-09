  <div class="row-fluid content" style="margin-top: 20px;">
    <div class="span8" style="margin-top: -20px;">
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
                        'label' => 'Delete Selected',
                        'click' => 'js:function(values) {
                            $.post("settings/deleteMany", values, function(data) {
                                values.each(function() {
                                    $(this).parent().parent().remove();
                                });
                            });
                            }'
                        )
                    ),
                    'checkBoxColumnConfig' => array(
                        'name' => 'key'
                    ),
                ),
                'columns' => array(
                    'key',
                    'value',
                    'hint',
                    array(
                        'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template' => '{update}{delete}',
                        'deleteButtonUrl'=>'Yii::app()->createUrl("/admin/settings/delete/id/" . $data->key)',
                        'buttons' => array(
                            'update'=>array(
                                'url' => 'Yii::app()->createUrl("/admin/settings/save/" ,array("id"=> $data->key,"ajax"=>true))',
                                'click'=>'js:function(even){
                                    even.preventDefault();
                                    _t = $(this);
                                    $("#editorForem").load($(this).attr("href"),function(){
                                        $("#Configuration_key","#setBox").notify("在这里修改",{position:"top center",className:"info"}); 
                                        $("#setBox").effect("highlight",1200);
                                   });
                             }',
                             )
                        ),
                    ),
                )
            ));
        ?>
    </div>
    <div class="span4 " id="editorForem">
        <?php $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
  </div>
