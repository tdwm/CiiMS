<?php
$this->navmenu = array(
    array(
        'class' => 'bootstrap.widgets.TbButtonGroup',
        'buttons'=> array(
            array( 
                'label' => '保存','type'=>'success','icon'=>'inbox-in',
                'htmlOptions'=>array(
                    'onClick'=>'js:$("#horizontalForm").submit();'
                ),
            ),
        ),
    ),
    array(
        'class' => 'bootstrap.widgets.TbButtonGroup',
        'toggle' => 'radio',
        'htmlOptions'=>array(
            'id'=>'changeContentParam'
        ),
        'buttons'=> array(
            array('label'=>'内容','icon'=>'file', 'htmlOptions' => array(
                'data-field' => 'show-content',
                'data-value' => 1,
                'class'=>'active',
            )),
            array('label'=>'参数','icon'=>'cogwheel', 'htmlOptions' => array(
                'data-field' => 'show-setting',
                'data-value' => 2,
            )),
        ),
    )
); 
Yii::app()->clientScript->registerScript('buttonGroup', "
    $(function(){
        $('a','#changeContentParam').click(function(){
            var fieldId = $(this).data('field');
            $('.toggleShow').hide();
            $('#'+fieldId).show();
});
});
", CClientScript::POS_END);
?>

<?php  Yii::import('ext.redactor.*'); ?>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'horizontalForm',
    'type'=>'horizontal',
)); ?>
<div  style="margin-bottom: 15px;">
    <?php echo $form->textField($model, 'title', array('placeholder' => '标题', 'style' => 'width: 90%')); ?>
</div>
<div class="row-fluid toggleShow" id="show-content" >
    <?php echo $form->hiddenField($model, 'id'); ?>
    <?php echo $form->hiddenField($model, 'vid'); ?>
    <?php echo $form->hiddenField($model, 'created'); ?>
    <?php echo $form->hiddenField($model,'parent_id',array('value'=>1)); ?>
    <?php echo $form->hiddenField($model,'author_id',array('value'=>Yii::app()->user->id,)); ?>
    <div style="margin-bottom: 20px;">
   <?php if ($preferUEditor): ?>
        <?php $this->widget('bootstrap.widgets.TbUEditor',
            array(
                'id'=>'editor',
                'model'=>$model,
                'attribute'=>'content',
                'editorOptions'=>array(
                    'initialContent'=>'',
                    'topOffset'=>'40',
                    'autoFloatEnabled'=>true,
                    'wordCount'=>false,
                    'autoHeightEnabled'=>false,
                    'elementPathEnabled'=>false,
                    'imageUrl'=>Yii::app()->baseUrl.'/ueditor/php/imageUp.php',
                    'imagePath'=>Yii::app()->baseUrl.'/ueditor/php/',
                    'pageBreakTag'=>'[page]',
                    'initialFrameWidth' => '98%',
                    'minFrameHeight' => '500',
                    'initialFrameHeight'=>'400',
                    'toolbars'=>array(
                        array(
                            'source','fullscreen','selectall','|',
                            'indent','searchreplace', 'removeformat', 'formatmatch','autotypeset', '|',
                            'link', 'unlink','|' , 'undo', 'redo', '|',
                            'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify',
                            '|', 'imagenone', 'imageleft', 'imageright',
                            '|', 'insertimage', 'insertvideo', 'inserttable','insertcode','template',
                            '|', 'preview'
                        ),
                        array(
                            'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', '|',
                            'customstyle', 'fontfamily', 'fontsize', '|',
                            'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', '|',
                            'horizontal', 'date', 'time',
                        )
                    ),              //All the function button on the toolbar and drop-down box
                ),

            ));
        ?>
    <?php else: ?>
        <?php $md = new CMarkdownParser(); ?>
        <?php $model->content = $md->safeTransform($model->content); ?>
        <?php $this->widget('ImperaviRedactorWidget', array(
                'model' => $model,
                'attribute' => 'content',
                'options' => array(
                    'focus' => true,
                    'autoresize' => false,
                    'autosave' => $this->createUrl('/admin/content/save/' . $model->id),
                    'interval' => 120,
                    'autosaveCallback' => 'saveCallback',
                    'minHeight' =>'200px'
                )
            ));
        ?>
    <?php endif; ?>
    </div>

    <?php echo $form->textArea($model, 'extract', array('style' => 'width: 98%; height: 80px', 'placeholder' => '简介')); ?>
</div>
<div class="row-fluid  toggleShow hide" id="show-setting">
    <div class="span6" >
<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => '设定',
    'headerIcon' => 'icon-justify',
    'headerButtons' => array(
        array(
            'class' => 'bootstrap.widgets.TbButtonGroup',
            'buttons'=>array(
                array('label' => $model->comment_count, 'url'=>$this->createUrl('/admin/content/comments/id/' . $model->id), 'icon' => 'icon-chat', 'htmlOptions' => array('style' => 'padding: 4px 0px; padding-right: 8px;' . ($model->commentable == 1 ?: 'display:none;'))),
                //  array('label'=>'View', 'url' => Yii::app()->createUrl('/' . $model->slug)),
                //  array('label'=>'Save', 'buttonType' => 'submit')
            ),
        )
    )
)); ?>
        <?php echo $form->dropDownListRow($model,'status', array(1=>'发布', 0=>'草稿'), array('class'=>'span12')); ?>
        <?php echo $form->dropDownListRow($model,'commentable', array(1=>'是', 0=>'否'), array('class'=>'span12')); ?>
        <?php echo $form->dropDownListRow($model,'category_id', CHtml::listData(Categories::model()->findAll(), 'id', 'name'), array('class'=>'span12')); ?>
        <?php echo $form->dropDownListRow($model,'type_id', array(2=>'Blog Post', 1=>'Page'),array('class'=>'span12')); ?>
        <?php echo $form->dropDownListRow($model, 'view', $views, array('class'=>'span12', 'options' => array($model->view => array('selected' => true)))); ?>
        <?php echo $form->dropDownListRow($model, 'layout', $layouts, array('class'=>'span12', 'options' => array($model->layout => array('selected' => true)))); ?>

        <?php echo $form->textFieldRow($model,'password',array('class'=>'span12','maxlength'=>150, 'placeholder' => '浏览密码 (可选)', 'value' => rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5(Yii::app()->params['encryptionKey']), base64_decode($model->password), MCRYPT_MODE_CBC, md5(md5(Yii::app()->params['encryptionKey']))), "\0"))); ?><br /><br />
        <?php echo $form->textFieldRow($model,'slug',array('class'=>'span12','maxlength'=>150, 'placeholder' => 'Slug')); ?>
        <?php $this->endWidget(); ?>
    </div>
    <div class="span6" >
        <?php if ($model->vid >= 1): ?>
        <?php $this->beginWidget('bootstrap.widgets.TbBox', array(
            'title' => '关键词.标签',
            'headerIcon' => 'icon-tags',
        )); ?>
        <?php echo $form->textField($model, 'tagsFlat', array('id' => 'tags')); ?>
        <?php $this->endWidget(); ?>  

<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => '附件',
    'headerIcon' => 'icon-upload',
    'htmlOptions' => array(
        'class' => 'contentSidebar'
    )
)); ?>
<?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
    array(
        'id'=>'uploadFile',
        'config'=>array(
            'debug'=>false,
            'action'=>Yii::app()->createUrl('/admin/content/upload/id/'. $model->id),
            'allowedExtensions'=>array('jpg', 'jpeg', 'png', 'gif', 'bmp'),
            'sizeLimit'=>10*1024*1024,// maximum file size in bytes
            'minSizeLimit'=>1,
            'template'=>'<div id="uploadFile"><ul class="qq-upload-list" style="display:none;">
            </ul><div class="qq-upload-drop-area" style="display:none;"></div><a class="btn btn-small btn-primary qq-upload-button right">上传</a>
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
    )); ?></h5>
    <div style="clear:both;"></div>
    <div class="image-holder ">
        <?php foreach ($attachments as $attachment): ?>
        <div class="image-ctrl" id="<?php echo $attachment->key; ?>">
            <?php echo CHtml::image(Yii::app()->baseUrl . $attachment->value, NULL, array('class'=> 'thumb', 'href' => Yii::app()->baseUrl.$attachment->value, 'title' => $attachment->value)); ?>
            <span class="delete-button icon icon-remove" id="<?php echo $attachment->key; ?>"></span>
            <span class="star-button icon icon-star-empty" id="<?php echo $attachment->key; ?>"></span>
        </div>
        <?php endforeach; ?>
        <li id="new-attachment" style="display:none;"></li>
    </div>
    <div class="clearfix"></div>
    <?php $this->endWidget(); ?>
</div>
<?php endif; ?>
        </div>
        <?php $this->endWidget(); ?>
        <?php $asset=Yii::app()->assetManager->publish(dirname(__FILE__).'/../../assets'); ?>
        <?php Yii::app()->clientScript->registerCssFile($asset . '/css/jquery.tags.css'); ?>
        <?php Yii::app()->clientScript->registerCssFile($asset . '/css/colorbox.css'); ?>
        <?php Yii::app()->clientScript->registerCssFile($asset . '/css/jquery.thumbs.css'); ?>
        <?php Yii::app()->clientScript->registerScriptFile($asset . '/js/jquery.tags.min.js'); ?>
        <?php Yii::app()->clientScript->registerScriptFile($asset . '/js/jquery.thumbs.min.js'); ?>
        <?php Yii::app()->clientScript->registerScriptFile($asset . '/js/jquery.colorbox.min.js'); ?>
        <?php Yii::app()->clientScript->registerScriptFile($asset . '/js/jquery.gridster.js'); ?>
        <?php Yii::app()->clientScript->registerScript('admin_promoted_image', 'setTimeout(function() { $("img.thumb").css("left", 0).css("right", 0).css("top", 0); $("#blog-image").find(".star-button").removeClass("icon-star-empty").addClass("icon-star"); $("#blog-image").find(".thumb-container").addClass("transition"); }, 500);'); ?>
<?php if (!$model->isNewRecord): ?>
<?php Yii::app()->clientScript->registerScript('autosave', '
// Autosave the document every 1 minute
// Because I am tired of getting timeout errors while editing a post!
setInterval(function() { $.post(window.location.pathname, { data :$("form").serialize() }); }, 60000);
'); ?>
<?php Yii::app()->clientScript->registerScript('admin_tags', '
    $("#tags").tagsInput({
defaultText : "添加",
    width: "99%",
        height : "40px",
        onRemoveTag : function(e) {
            $.post("../../removeTag", { id : ' . $model->id . ', keyword : e });
        },
            onAddTag : function(e) {
                $.post("../../addTag", { id : ' . $model->id . ', keyword : e });
        }
        });
        '); ?>
        <?php Yii::app()->clientScript->registerScript('admin_thumbs', '$(".thumb").thumbs();'); ?>
        <?php Yii::app()->clientScript->registerScript('admin_colorbox', '$(".thumb").colorbox({rel:"thumb"});'); ?>
<?php Yii::app()->clientScript->registerScript('admin_promote', '$(".star-button").click(function() { 
    var id = $(this).attr("id");
    $.post("../../promoteImage", { id : ' . $model->id . ', key : id }, function() {
        $(".image-ctrl").find(".thumb-container").css("border-color", "").removeClass("transition");
        $("div[id*=\'" + id + "\']").find(".thumb-container").addClass("transition");
        $(".star-button").addClass("icon-star-empty").removeClass("icon-star");
        $("div[id*=\'" + id + "\']").find(".star-button").removeClass("icon-star-empty").addClass("icon-star");
        });
        });'); ?>
<?php Yii::app()->clientScript->registerScript('admin_delete', '$(".delete-button").click(function() {
    var element = $(this);
    $.post("../../removeImage", { id : ' . $model->id . ', key : $(this).attr("id") }, function () {
        element.parent().fadeOut();
        });
        })'); ?>
<?php endif; ?>
