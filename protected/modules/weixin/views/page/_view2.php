<div class="media_preview_area">        
    <div class="appmsg multi editing">        
        <div id="js_appmsg_preview" class="appmsg_content">                                            
            <div id="appmsgItem1" data-fileid="<?php echo $data->id; ?>" data-id="1" class="js_appmsg_item ">
                <div class="appmsg_info">
                    <em class="appmsg_date"></em>
                </div>
                <div class="cover_appmsg_item">
                    <h4 class="appmsg_title"><a href="javascript:void(0);" onclick="return false;" target="_blank">标题</a></h4>
                    <div class="appmsg_thumb_wrp">
                        <img class="js_appmsg_thumb appmsg_thumb" src="">
                        <i class="appmsg_thumb default">封面图片</i>
                    </div>
                    <div class="appmsg_edit_mask">
                        <a onclick="return false;" class="icon-pencil edit_gray js_edit" data-id="1" href="javascript:;">编辑</a>
                    </div>
                </div>
            </div>
            <div id="appmsgItem2" data-fileid="<?php echo $data->child->id; ?>" data-id="2" class="appmsg_item js_appmsg_item ">
                <img class="js_appmsg_thumb appmsg_thumb" src="">
                <i class="appmsg_thumb default">缩略图</i>
                <h4 class="appmsg_title"><a onclick="return false;" href="javascript:void(0);" target="_blank">标题</a></h4>
                <div class="appmsg_edit_mask">
                    <a class="icon-pencil edit_gray js_edit" data-id="2" onclick="return false;" href="javascript:void(0);">编辑</a>
                    <a class="icon-bin del_gray js_del" data-id="2" onclick="return false;" href="javascript:void(0);">删除</a>
                </div>
            </div>
        </div>                        
        <div class="appmsg_add">                
            <a onclick="return false;" id="js_add_appmsg" href="javascript:void(0);"> <i class="icon-plus add_gray">增加一条 </i> </a>            
        </div>                
    </div>
</div>
<script>
    var dataid = 1;
    $(function(){
        //添加
        $('#js_add_appmsg').click(function(){
            _num = $('.appmsg_item').length;
            if(_num >= 8){
                $('#weixinCreateHeader').notify('最多添加八条');
                return false;
            }
            _last = $('.appmsg_item:last');
            _dataid = 1+parseInt(_last.attr('data-id'));
            _new = _last.clone(true);
            _new.removeClass('has_thumb');
            _new.find('h4').text('标题');
            _new.find('.js_appmsg_thumb').attr('src','');
            _new.attr('id','appmsgItem'+_dataid)
            _new.attr('data-id',_dataid)
            _new.find('a').attr('data-id',_dataid);
            _new.appendTo($('#js_appmsg_preview'));
            dataid = _dataid;
        });
        //编辑
        $('.js_edit').click(function(){
            dataid = $(this).attr('data-id');
        });
        //删除
        $('.js_del').click(function(){
            _tid = $(this).attr('data-id');
            if( dataid == _tid){
                dataid = 1; 
                //move
            }
            _num = $('.appmsg_item').length;
            if(_num == 1){
                $('#weixinCreateHeader').notify('无法删除，多条图文至少需要2条消息。');
                return false;
            }
            $('#appmsgItem'+_tid).remove();
        });

    });
</script>
