<?php echo $form->errorSummary($model); ?>
<?php echo $form->textFieldRow($model,'title',array('class'=>'span8','maxlength'=>100)); ?>
<?php echo $form->textFieldRow($model,'author',array('class'=>'span8','maxlength'=>100)); ?>
<div class="row-fluid" >
<?php echo $form->textFieldRow($model,'thumb',array('class'=>'span5 hide','maxlength'=>100,'hint'=>'大图片建议尺寸：360像素 * 200像素')); ?>
    <?php
    $this->widget('ext.EAjaxUpload.EAjaxUpload',
        array(
            'id'=>'uploadFile',
            'config'=>array(
                'debug'=>false,
                'action'=>Yii::app()->createUrl('/weixin/media/upload/',array('type'=>2)),
                'allowedExtensions'=>array('jpg', 'jpeg', 'png', 'gif', 'bmp'),
                'sizeLimit'=>10*1024*1024,// maximum file size in bytes
                'minSizeLimit'=>1,
                'template'=>'<div id="uploadFile" class="span5">
                <ul class="qq-upload-list" style="display:none;"></ul>
                <div class="qq-upload-drop-area" style="display:none;"></div>
                <a class="btn btn-small btn-primary qq-upload-button " style="top:0px">上传</a>
                </div>',	
                'onComplete' => "js:function(id, fileName, response) {
                    if (response.success)
                    {
                        var baseUrl = '" . Yii::app()->baseUrl . "';
                        $('.image-ctrl').remove();
                        $('#new-attachment').before('<div class=\"image-ctrl\" id=\"thumb_'+response.id+'\"><span class=\"thumb-container thumb-center\"><span class=\"thumb-inner\"><span class=\"thumb-img\"><img class=\"thumb\" href=\"'+ baseUrl + response.filepath +'\" src=\"'+ baseUrl + response.filepath +'\" style=\"left: 0px; top: 0px;\"></span><span class=\"thumb-strip\"></span><span class=\"thumb-icon\"></span></span></span><span class=\"delete-button icon icon-remove\" id=\"thumb_'+response.id+'\"></span></div>').after('<li id=\"new-attachment\" style=\"display:none;\">');
                        //$('#imge-ctrl img').show().attr('id', 'thumb');
                        $('.thumb').thumbs();
                        $('.thumb').colorbox({rel:'thumb'});
                        $('#WeixinContent_thumb').val(response.id);
                        $('.appmsg_thumb').attr('src',response.filepath);
                        $('#js_appmsg_preview').addClass('has_thumb');
                        $('.delete-button').bind('click',function(){element=$(this); delImage(element);});
                    } else {
                        $('#uploadFile').notify(response.error,{position:'left center',className:'info'});
                    }
            }"
            )
        ));
    ?>
    <div class="image-holder ">
        <?php if($model->thumb) : ?>
        <div class="image-ctrl" id="model_<?php echo $model->thumb; ?>">
            <?php echo CHtml::image(Yii::app()->baseUrl . $model->img->source, NULL, array('class'=> 'thumb', 'href' => Yii::app()->baseUrl.$model->img->source, 'title' => $model->img->title)); ?>
            <span class="delete-button icon icon-remove" id="thumb_<?php echo $model->thumb; ?>"></span>
        </div>
        <?php endif; ?>
        <li id="new-attachment" style="display:none;"></li>
    </div>
    <div class="clearfix"></div>

</div>
<?php echo $form->textAreaRow($model,'desc',array('rows'=>6, 'cols'=>50, 'class'=>'span8','placeholder'=>'摘要[选填]')); ?>
<?php echo $form->textAreaRow($model,'content',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
<div class="" >
<?php echo $form->textFieldRow($model,'link',array('rows'=>6, 'cols'=>50, 'class'=>'span8','placeholder'=>'原文链接[选填]')); ?>
</div>
<div class="clearfix" style="margin-bottom:20px;" >
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'buttonType'=>'submit',
    'type'=>'primary',
    'label'=>$model->isNewRecord ? '添加' : '保存',
    'htmlOptions'=>array('class'=>'pull-right'),
)); ?>
</div>
<?php $asset=Yii::app()->assetManager->publish(dirname(__FILE__).'/../assets'); ?>
<?php Yii::app()->clientScript->registerCssFile($asset . '/css/colorbox.css'); ?>
<?php Yii::app()->clientScript->registerCssFile($asset . '/css/jquery.thumbs.css'); ?>
<?php Yii::app()->clientScript->registerScriptFile($asset . '/js/jquery.tags.min.js'); ?>
<?php Yii::app()->clientScript->registerScriptFile($asset . '/js/jquery.thumbs.min.js'); ?>
<?php Yii::app()->clientScript->registerScriptFile($asset . '/js/jquery.colorbox.min.js'); ?>
<?php Yii::app()->clientScript->registerScriptFile($asset . '/js/jquery.gridster.js'); ?>
<?php Yii::app()->clientScript->registerScript('admin_delete_func', '
function delImage(obj){
    $.post("'.$this->createUrl('/weixin/content/removeImage').'", { id : ' . intval($model->id) . ', key : obj.attr("id") }, function () {
        obj.parent().fadeOut();
        $("#WeixinContent_thumb").val("");
        $("#js_appmsg_preview").removeClass("has_thumb");
    });
}',CClientScript::POS_HEAD);
?>
<?php Yii::app()->clientScript->registerScript('admin_delete', '
$(".delete-button").click(function() { var element = $(this); delImage(element); }) 
    $("#WeixinContent_title").bind("input propertychange", function() {
        if($(this).val()){
            $(".appmsg_title a").text($(this).val());
        } else {
            $(".appmsg_title a").text("标题");
        }
    });
    $("#WeixinContent_desc").bind("input propertychange", function() {
            $(".appmsg_desc").html($(this).val());
    });
    $(".thumb").thumbs();
    $(".thumb").colorbox({rel:"thumb"});
');
?>
