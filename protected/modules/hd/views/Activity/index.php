<div class="form">
<div class="header">
        <div class="pull-left" >
           <p> 活动列表 </p>
        </div>
        <div class="pull-right" >
<?php 
$this->widget('bootstrap.widgets.TbButton',array(
        'type'=>'primary',
        'label'=>'发布活动',
        'id'=>'addsigle',
        'url'=>$this->createUrl('/hd/activity/create'),
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
        $this->renderPartial('_view',array('data'=>$item,'editor'=>true));
    }
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

