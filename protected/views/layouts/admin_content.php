<?php $this->beginContent('//layouts/admin_main'); ?>
	<?php echo $content; ?>
    <?php $this->beginWidget( 'bootstrap.widgets.TbModal', array('id' => 'myModal')); ?>
        <div class="modal-header">
            <a class="close" data-dismiss="modal">&times;</a>
            <h4></h4>
        </div>
        <div class="modal-body"> <p></p> </div>
        <div class="modal-footer"> </div>
    <?php $this->endWidget(); ?>
    <?php  Yii::app()->clientScript->registerScript('modaljs',"
        function modalShow(link){
            $.ajax({
                type:'get',
                data:{ajax:'true'},
                url:link,
                cache:true,
                success:function(data){
                    if(data.title)
                        $('.modal-header h4','#myModal').text(data.title);
                    if(data.body)
                        $('.modal-body p','#myModal').html(data.body);
                    else
                        $('.modal-body p','#myModal').html(data);
                    $('#myModal').modal({'show':true});
                }
           });
        }    
    ");
    ?>
<?php $this->endContent(); ?>

