<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <?php $asset=Yii::app()->assetManager->publish(dirname(__FILE__).'/../assets'); ?>
        <?php Yii::app()->clientScript->registerCssFile($asset.'/css/main.css'); ?>
        <?php Yii::app()->clientScript->registerScriptFile($asset.'/js/jquery.animate-colors-min.js'); ?>
        <?php Yii::app()->clientScript->registerScriptFile($asset.'/js/jquery-ui-effect.min.js'); ?>
        <?php Yii::app()->clientScript->registerScriptFile($asset.'/js/notify.min.js'); ?>
        <?php Yii::app()->clientScript->registerScriptFile($asset.'/js/jquery.nanoscroller.min.js'); ?>
        <?php Yii::app()->clientScript->registerCssFile($asset.'/css/glyphicons.css'); ?>
        <?php Yii::app()->clientScript->registerCssFile($asset.'/css/nanoscroller.css'); ?>
    </head>
    <body>
        <section class="hbox">
          <?php $this->renderPartial("//layouts/admin_pannel");?>
          <main class="tc-container">
                <div class="settings-container" style="position:relative;overflow:hidden;z-index: 1;" >
                        <?php
                            if($this->menu){
                                $this->widget('bootstrap.widgets.TbNavbar', array(
                                    'htmlOptions' => array('style' => 'position:absolute;'),
                                    'brand'=>'',
                                    'brandOptions' => array('style' => 'width:auto;margin-left: 0px;'),
                                    'collapse' => true,
                                    'items'=> $this->menu,
                                ));
                                echo "<div style='margin-top:50px;clear:both;'></div>";
                            }
                        ?>
                          <?php $this->widget('bootstrap.widgets.TbAlert', array(
                              'block'=>true,
                              'fade'=>true,
                              'closeText'=>'×',
                          ));
                        ?>
                        <?php echo $content; ?>  
                </div>
          </main>
       </section>
        <?php $this->beginWidget( 'bootstrap.widgets.TbModal', array('id' => 'myModal')); ?>
            <div class="modal-header">
                <a class="close" data-dismiss="modal">&times;</a>
                <h4></h4>
            </div>
            <div class="modal-body"> <p></p> </div>
            <div class="modal-footer"> </div>
        <?php $this->endWidget(); ?>
    </body>
</html>
<?php
Yii::app()->clientScript->registerScript(
    'myHideEffect',
    '$(".alert.fade").animate({opacity: 1}, 1500).effect("blind",1800);
    $(".nano").nanoScroller();                         
    ',
    CClientScript::POS_READY
);
?>
