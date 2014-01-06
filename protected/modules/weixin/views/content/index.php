<div class="form">
<div class="header">
        <div class="pull-left" >
           <p> 文章管理 </p>
        </div>
        <div class="pull-right" >
            <?php 
$this->widget('bootstrap.widgets.TbButtonGroup',array(
    'buttons'=>array(
        array(
            'type'=>'primary',
            'label'=>'添加单图',
            'id'=>'addsigle',
            'url'=>$this->createUrl('/weixin/content/create'),
        ),
        array(
            'type'=>'primary',
            'label'=>'添加多图',
            'id'=>'addmore',
            'url'=>$this->createUrl('/weixin/content/create2'),
        ),
    ),
    'htmlOptions' => array('class'=>'pull-right'),
));
            ?>
        </div>
</div>
<div id="main" class="nano has-scrollbar">
    <div class="content" >
<?php 
?>
<style>
.indexlist{
    float:left;
    width: 310px;
    margin:5px 15px 0px 5px;
}
</style>
<div class="clearfix" >
<?php 
    $colunm_num = range(0,2);
    $datas = $colunms = array();
    foreach($model as  $k=>$a){
        $colunms[$k%3][] = $a;
    }

    foreach($colunms as $k => $colunm){
        echo "<ul class='indexlist' id='indexlist$k'>";
        foreach($colunm as $item){
            $this->renderPartial('_view'.$item->type,array('data'=>$item,'editor'=>true));
        }
        /*
        $this->widget('bootstrap.widgets.TbListView',array(
            'dataProvider'=>$model->search(),
            'itemView'=>'_indexlist',
            'template'=>'{items}',
            'viewData'=> array('colnum'=>$k),
        ));
         */
        echo "</ul>";
    }

?>
</div>
<div class="pagination">
 <div class="yiiPager" >
<?php
    $this->widget('bootstrap.widgets.TbPager', array(
        'currentPage'=>$pages->getCurrentPage(),
        'itemCount'=>$item_count,
        'pageSize'=>$page_size,
        'maxButtonCount'=>5,
        //'nextPageLabel'=>'My text >',
        'header'=>'',
        'htmlOptions'=>array('class'=>'pages'),
    ));
?>
</div>
</div>
    </div>
</div>
</div>

