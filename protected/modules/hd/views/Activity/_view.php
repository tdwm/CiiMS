<div class="media_preview_area" >
    <div class="appmsg  editing">
        <div id="js_appmsg_preview" class="appmsg_content clearfix">
        <div id="appmsgItem1" data-fileid="" data-id="1" class="js_appmsg_item <?php if($data->thumb) {echo 'has_thumb';}?>">
            <h4 class="appmsg_title">
            <a onclick="return false;" href="javascript:void(0);" target="_blank">
                <?php 
                    if ($data->title) {
                        echo CHtml::encode($data->title); 
                    } else {
                        echo '标题';
                    }
                ?>
            </a>
            </h4>
                <div class="appmsg_info">
                    <em class="appmsg_date"> <?php echo CHtml::encode($data->created); ?></em>
                </div>
                <div class="appmsg_thumb_wrp">
                    <img class="js_appmsg_thumb appmsg_thumb" src="<?php echo CHtml::encode($data->thumb); ?>">
                    <i class="appmsg_thumb default">封面图片</i>
                </div>
                <p class="appmsg_desc"> <?php echo CHtml::encode($data->content); ?></p> 
            </div>
        </div>
        <?php if($editor): ?>
        <div class="appmsg_opr row-fluid clearfix">
            <div class="span5" style="text-align:center;text-font:14px;panding:10px 0px;margin:10px 0px 5px 0px;" >
                    <a class="js_edit" href="<?php echo $this->createUrl('/hk/activity/update',array('id'=>$data->act_id))?>"><i class="icon-pencil edit_gray">编辑</i></a>
</div>
            <div class="span5" style="text-align:center;text-font:14px;panding:10px 0px;margin:10px 0px 5px 0px;" >
                    <a class="js_del no_extra" data-id="<?php echo $data->id;?>" href="javascript:void(0);"><i class="icon-bin del_gray">删除</i></a>
</div>
         </div>
        <?php endif; ?>
    </div>
</div>
