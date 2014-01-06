<?php
$this->breadcrumbs=array(
    'Weixin Medias',
);

?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'configuration-form',
    'type'=>'horizontal',
    'enableAjaxValidation'=>false,
    'action'=>Yii::app()->createUrl('/weixin/setting/')
)); ?>
<div class="header">
        <div class="pull-left" >
           <p> 图片 </p>
        </div>
        <div class="pull-right" >

<?php
$this->widget('ext.EAjaxUpload.EAjaxUpload',
    array(
        'id'=>'uploadFile',
        'config'=>array(
            'debug'=>false,
            'action'=>Yii::app()->createUrl('/weixin/media/upload/',array('type'=>$type)),
            'allowedExtensions'=>array('jpg', 'jpeg', 'png', 'gif', 'bmp'),
            'sizeLimit'=>10*1024*1024,// maximum file size in bytes
            'minSizeLimit'=>1,
            'template'=>'<div id="uploadFile">
            <ul class="qq-upload-list" style="display:none;"></ul>
            <div class="qq-upload-drop-area" style="display:none;"></div>
            <a class="btn btn-small btn-primary qq-upload-button " style="top:0px">上传</a>
            </div>',	
            'onComplete' => "js:function(id, fileName, response) {
                if (response.success)
                {
                    var baseUrl = '" . Yii::app()->baseUrl . "';
                    $('#new-attachment').before('<span class=\"thumb-container thumb-center\"><span class=\"thumb-inner\"><span class=\"thumb-img\"><img class=\"thumb\" href=\"'+ baseUrl + response.filepath +'\" src=\"'+ baseUrl + response.filepath +'\" style=\"left: 0px; top: 0px;\"></span><span class=\"thumb-strip\"></span><span class=\"thumb-icon\"></span></span></span>').after('<li id=\"new-attachment\" style=\"display:none;\">');
                    $('.thumb').thumbs();
                    $('.thumb').colorbox({rel:'thumb'});
                    $('#new-attachment-img').show().attr('id', 'thumb');
        }
        }"
        )
    ));
?>
        </div>
</div>
<?php $this->endWidget(); ?>

<div id="main" class="nano has-scrollbar">
    <div class="content" >
        <?php $this->widget('bootstrap.widgets.TbListView',array(
            'dataProvider'=>$model->search(),
            'itemView'=>'_view2',
        )); ?>
    </div>
</div>
