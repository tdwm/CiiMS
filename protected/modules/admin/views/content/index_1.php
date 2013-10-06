<?php $this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider' => $model->search(),
    'itemView' => '_itemView',
    'summaryText' => false,
    'sorterHeader' => '排序:',
    'sortableAttributes' => array(
        'title',
        'created',
        'updated',
        'status',
        'comment_count'
    )    
));
?>
