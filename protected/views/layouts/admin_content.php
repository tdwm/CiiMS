<?php $this->beginContent('//layouts/admin_main'); ?>
	<?php echo $content; ?>
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
                        /*
                        $('#myModal').modal({'show':true}).css({
                            width: 'auto',
                            'margin-left': function () {
                                 return -($(this).width() / 2);
                            }
                        });
                        */

                        $('#myModal').modal({'show':true}).css({
                           'width': function () { 
                              return ($(this).width() / $(document).width())*100 + '%';
                            },
                            'left': function () { 
                                return (100 - (($(this).width() / $(document).width())*100))/2 + '%';
                             },
                            'margin': 'auto'
                        });
                }
           });
        }    
    ");
    ?>
<?php $this->endContent(); ?>

