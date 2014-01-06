<div id="js_appmsg_editor" class="media_edit_area">
    <div class="appmsg_editor" style="">
        <div class="inner">
            <div class="appmsg_edit_item">
                <?php echo $form->textFieldRow($model,'title',array('class'=>'span12','maxlength'=>100)); ?>
            </div>
            <div class="appmsg_edit_item">
                <?php echo $form->textFieldRow($model,'author',array('class'=>'span12','maxlength'=>100,'placeholder'=>'选填')); ?>
            </div>
            <div class="appmsg_edit_item">
                <?php echo $form->textFieldRow($model,'thumb',array('class'=>'span5 hide','maxlength'=>100,'hint'=>'小图片建议尺寸：200像素 * 200像素')); ?>
<?php
$this->widget('ext.EAjaxUpload.EAjaxUpload',
    array(
        'id'=>'uploadFile',
        'config'=>array(
            'debug'=>false,
            'action'=>Yii::app()->createUrl('/weixin/media/upload/'),
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
    $(".thumb").thumbs();
    $(".thumb").colorbox({rel:"thumb"});
');
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

            <p><a class="js_addDesc" href="javascript:void(0);" onclick="return false;" style="">添加摘要</a></p>
            <div class="js_desc_area dn appmsg_edit_item" style="display:none;">
                <?php echo CHtml::activeTextArea($model,'desc',array('rows'=>6, 'cols'=>50, 'class'=>'span12','placeholder'=>'摘要[选填]')); ?> 
            </div>
            <div id="js_ueditor" class="appmsg_edit_item content_edit">
 <!--               <a href="javascript:void(0);" class="icon16_common close jsClose" onclick="return false;">关闭</a> -->
<!--
                <label for="" class="frm_label">
                    <strong class="title">正文</strong>
                    <p class="tips r">
                    <em id="js_auto_tips">自动保存：2013/11/22 12:06:04</em> 
                    <a id="js_cancle" style="display: none;" href="javascript:void(0);" onclick="return false;">取消</a>
                    </p>
                </label>
-->
                <div id="js_editor" class="edui_editor_wrp edui-default">
                    <?php echo $form->textAreaRow($model,'content',array('rows'=>6, 'cols'=>50, 'class'=>'span12')); ?>
                </div>
<!--
                <div class="tool_bar">
                    <a id="js_finish_zoom" onclick="return false;" href="javascript:void(0);" class="btn btn_primary">完成编辑</a>
                </div>
-->
            </div>
            <p><a class="js_addURL" href="javascript:void(0);" onclick="return false;" style="display: inline;">添加原文链接</a></p>
            <div class="js_url_area dn appmsg_edit_item" style="display: none;">
                    
                <?php echo CHtml::activetextField($model,'link',array('rows'=>6, 'cols'=>50, 'class'=>'span12','placeholder'=>'原文链接[选填]')); ?>
            </div>

        </div>
        <i class="arrow arrow_out" style="margin-top: 0px;"></i>
        <i class="arrow arrow_in" style="margin-top: 0px;"></i>
        <div class="mask" style="display: none;"><iframe frameborder="0" style="filter:progid:DXImageTransform.Microsoft.Alpha(opacity:0);position:absolute;top:0px;left:0px;width:100%;height:100%;" src="about:blank"></iframe></div></div>
</div>
<script>
$(function(){
    $('.js_addURL').click(function(){$('.js_url_area').show()});
    $('.js_addDesc').click(function(){$('.js_desc_area').show()});
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
});
</script>
