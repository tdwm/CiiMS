<?php echo $form->errorSummary($model); ?>
<div class="clearfix">
<div class="previewThumb span4" >
<div class="upload_preview " >
<img id="pre_thumb" class="pre_thumb"  src="" >
<i class="pre_text" >封面图片</i>
</div>
<div id="uploadImg"  class="upload_mask" > </div>
<?php echo $form->hiddenField($model,'thumb',array('type'=>'hidden','maxlength'=>150)); ?>
<?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
    array(
        //'id'=>'uploadFile',
        'id'=>'uploadImg',
        'config'=>array(
            'debug'=>false,
            'action'=>Yii::app()->createUrl('/hd/activity/uploadimg'),
            'allowedExtensions'=>array('jpg', 'jpeg', 'png', 'gif', 'bmp'),
            'sizeLimit'=>10*1024*1024,// maximum file size in bytes
            'minSizeLimit'=>1,
            'template'=>'<ul class="qq-upload-list" style="display:none;"> </ul>
            <div class="qq-upload-drop-area" style="display:none;"></div>
            <div class="qq-upload-button uploadImgBottun">编辑封面</div>
            ',	
            'onComplete' => "js:function(id, fileName, response) {
                if (response.state == 'SUCCESS') {
                    var baseUrl = '" . Yii::app()->baseUrl . "';
                    $('#HdActivity_thumb').val(response.url);
                    $('#pre_thumb').attr('src',baseUrl+response.url).show();
                    $('.pre_text').hide();
                    $('.thumb_mask').hide();
                }else{
                    $('#hdCreateHeader').notify(response.state,'error');
                }
            }"
        )
    )); ?>
</div>

<div class="span8" >
    <div class="clearfix">
	<?php echo $form->textFieldRow($model,'title',array('class'=>'span12','maxlength'=>150)); ?>
    </div>
    <div class="clearfix">
        <div class="span4">
    <?php echo $form->datetimepickerRow(
        $model,
        'starttime',
        array(
            'options' => array(
                'language' => 'zh-CN',
                'format'=> "yyyy-mm-dd  hh:ii",
                'autoclose'=> true,
                'todayBtn'=> true,
                'startDate'=> date('Y-m-d H:i'),
                'minuteStep'=> 10
            ),
            'class'=>'span10',
            'prepend' => '<i class="icon-calendar"></i>'
        )
    );
    ?>
    </div>
        <div class="span4">
    <?php echo $form->datetimepickerRow(
        $model,
        'deadline',
        array(
            'options' => array(
                'language' => 'zh-CN',
                'format'=> "yyyy-mm-dd  hh:ii",
                'autoclose'=> true,
                'todayBtn'=> true,
                'startDate'=> date('Y-m-d H:i'),
                'minuteStep'=> 10
            ),
            'class'=>'span10',
            'prepend' => '<i class="icon-calendar"></i>'
        )
    );
    ?>
    </div>
    <div class="span4">
    <?php echo $form->datetimepickerRow(
        $model,
        'endtime',
        array(
            'options' => array(
                'language' => 'zh-CN',
                'format'=> "yyyy-mm-dd  hh:ii",
                'autoclose'=> true,
                'todayBtn'=> true,
                'startDate'=> date('Y-m-d H:i'),
                'minuteStep'=> 10
            ),
            'class'=>'span10',
            'prepend' => '<i class="icon-calendar"></i>'
        )
    );
    ?>
    </div>
   </div>
   <div class="clearfix">
    <div class="span3">
       活动地点
    </div>
    <div class="span9">
    <?php $this->Widget('ext.WDjQuerycity.WDjQuerycity', array(
        'model'  => $model,
        'province' =>'province',  //数据库字段province
        'city' =>'city',  //数据库字段city
        'area' =>'area',  //数据库字段area 
        'provinceValue'=>$model->province,  // province 默认值
        'cityValue' =>$model->city,  // city默认值
        'areaValue'=>$model->area,  // area默认值
        //'provinceOptions' => array('style'=>'width:100px'), // province Html Options
        // 'cityOptions' => array(), // city Html Options
        // 'areaOptions' => array() // area Html Options
        'htmlOptions'=>array('class'=>'span4','style'=>'margin-right:3px'),

    )); ?>
    </div>
   </div>
   <div class="clearfix">
    <div class="span3">
    <?php echo $form->textFieldRow($model,'limitnum',array('class'=>'span10')); ?>
    </div>
    <div class="span9">
    <?php echo $form->textFieldRow($model,'venue',array('class'=>'span12')); ?>
    </div>
   </div>
</div>
</div>
<div class="clearfix span12" style="padding: 0px 5px 0 0;margin:20px 0 0 0;">
<div class="span3">
<?php $collapse = $this->beginWidget('bootstrap.widgets.TbCollapse'); ?>
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle " data-toggle="collapse" data-parent="#accordion2" href="#alipay">
            报名费<?php if($model->prechange > 0):?><i class="icon-ok pull-right"></i><?php endif;?>
            </a>
        </div>
        <div id="alipay" class="accordion-body collapse ">
            <div class="accordion-inner">
                <?php echo $form->textFieldRow($model,'prechange',array('class'=>'span12')); ?>
                <?php echo $form->textFieldRow($model,'alipay',array('class'=>'span12')); ?>
            </div>
        </div>
    </div>
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle " data-toggle="collapse" data-parent="#accordion2" href="#needinput">
            需要填写的信息 
            </a>
        </div>
        <div id="needinput" class="accordion-body collapse ">
            <div class="accordion-inner">
                <?php echo $form->textFieldRow($model,'prechange',array('class'=>'span12')); ?>
                <?php echo $form->textFieldRow($model,'alipay',array('class'=>'span12')); ?>
            </div>
        </div>
    </div>
<?php $this->endWidget(); ?>
</div>
<div class="span9" style="height: 450px" id="mytabs">
     <ul class="nav nav-tabs">
         <li class="active"><a data-toggle="tab" href="#tab_thumb">图片展示</a></li>
         <li><a data-toggle="tab" href="#tab_desc_info">活动介绍</a></li>
         <li><a data-toggle="tab" href="#tab_desc_trip">时间行程</a></li>
         <li><a data-toggle="tab" href="#tab_desc_need">装备要求</a></li>
         <li><a data-toggle="tab" href="#tab_desc_note">注意事项</a></li>
         <li><a data-toggle="tab" href="#tab_desc_declare">免责声明</a></li>
     </ul>
    <div class="tab-content" style="padding-right:10px;">
        <div id="tab_thumb" class="tab-pane fade active in" >
            <div id="desc_thumb_up" >
            <?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
                array(
                    //'id'=>'uploadFile',
                    'id'=>'tab_thumb',
                    'config'=>array(
                        'debug'=>false,
                        'action'=>Yii::app()->createUrl('/hd/activity/uploadimg'),
                        'allowedExtensions'=>array('jpg', 'jpeg', 'png', 'gif', 'bmp'),
                        'sizeLimit'=>2*1024*1024,// maximum file size in bytes
                        'minSizeLimit'=>1,
                        'template'=>'<ul class="qq-upload-list" style="display:none;"> </ul>
                        <div class="qq-upload-drop-area" style="display:none;"></div>
                        <div class="qq-upload-button btn btn-small ">上传</div>
                        ',	
                        'onComplete' => "js:function(id, fileName, response) {
                            if (response.state == 'SUCCESS') {
                                var baseUrl = '" . Yii::app()->baseUrl . "';
                                $('#HdActivity_thumb').val(response.url);
                                $('#pre_thumb').attr('src',baseUrl+response.url).show();
                                $('.pre_text').hide();
                                $('.thumb_mask').hide();
                            }else{
                                $('#hdCreateHeader').notify(response.state,'error');
                            }
                        }"
                    )
                )); ?>
            </div>
            <div class="" >
            </div>
        </div>
        <div id="tab_desc_info" class="tab-pane fade " >
            <?php $this->renderPartial('_triptextarea',array('model'=>$model,'attr'=>'desc_info')); ?>
        </div>
        <div id="tab_desc_trip" class="tab-pane fade " >
            <?php $this->renderPartial('_triptextarea',array('model'=>$model,'attr'=>'desc_trip')); ?>
        </div>
        <div id="tab_desc_need" class="tab-pane fade " >
            <?php $this->renderPartial('_triptextarea',array('model'=>$model,'attr'=>'desc_need')); ?>
        </div>
        <div id="tab_desc_note" class="tab-pane fade " >
            <?php $this->renderPartial('_triptextarea',array('model'=>$model,'attr'=>'desc_note')); ?>
        </div>
        <div id="tab_desc_declare" class="tab-pane fade" >
            <?php $this->renderPartial('_triptextarea',array('model'=>$model,'attr'=>'desc_declare')); ?>
        </div>
     </div>
    
    
</div>
</div>
    <script >
    $(function(){
        $('.previewThumb').hover(function(){
            $(".upload_mask").show();
        },function(){
            $(".upload_mask").hide();
        });
        $('#mytabs').tab('show');
    });
    </script>
