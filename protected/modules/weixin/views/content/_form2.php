<div id="js_appmsg_editor" class="media_edit_area">
    <div class="appmsg_editor" style="">
        <div class="inner">
            <?php
                $this->widget('bootstrap.widgets.TbExtendedGridView', array(
                    'type' => 'striped bordered',
                    'dataProvider' => $singles->search(),
                    'filter' => $singles,
                    //'responsiveTable' => true,
                    'columns' => array(
                        'title'=>array(
                            'class'=>'DataColumn',
                            'name'=>'title',
                            'evaluateHtmlOptions'=>true,
                            'htmlOptions'=>array(
                                'data-id'=>'$data->id',
                                'data-img'=>'$data->img->source',
                                'data-thumb'=>'$data->img->id',
                                'data-title'=>'$data->title',
                                'class'=>'changeItem',
                            )
                        )
                    )
                ));
            ?>                
        </div>
        <i class="arrow arrow_out" style="margin-top: 0px;"></i>
        <i class="arrow arrow_in" style="margin-top: 0px;"></i>
        <div class="mask" style="display: none;"><iframe frameborder="0" style="filter:progid:DXImageTransform.Microsoft.Alpha(opacity:0);position:absolute;top:0px;left:0px;width:100%;height:100%;" src="about:blank"></iframe></div></div>
</div>
<script>
    var dataItems = {},hasAdd={};
$(function(){
    $('.js_addURL').click(function(){$('.js_url_area').show()});
    $('.js_addDesc').click(function(){$('.js_desc_area').show()});
    $('.changeItem').click(function(){
            var t = $(this);
            _id  = t.attr('data-id');
            if($('.js_appmsg_item[data-fileid='+_id+']').length>0){
                $('#weixinCreateHeader').notify('这个已经添加了啊');
                return false;
            }
            dataItems[dataid] = {
                'id':t.attr('data-id'),
                 'thumb':t.attr('data-thumb'),
                'img':t.attr('data-img'),
                'title':t.attr('data-title'),
            }
            _item = $('#appmsgItem'+dataid);
            _item.find('h4').text(dataItems[dataid].title);
            _item.find('.js_appmsg_thumb').attr('src',dataItems[dataid].img);
            _item.attr('data-fileid',_id);
            _item.addClass('has_thumb');
    });
});
</script>
