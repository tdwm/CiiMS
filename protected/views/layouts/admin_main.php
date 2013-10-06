<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <?php $asset=Yii::app()->assetManager->publish(dirname(__FILE__).'/../assets'); ?>
        <?php Yii::app()->clientScript->registerCssFile($asset.'/css/main.css'); ?>
        <?php Yii::app()->clientScript->registerCssFile($asset.'/css/glyphicons.css'); ?>
    </head>
    <body>
        <section class="hbox">
          <?php $this->renderPartial("//layouts/admin_pannel");?>
          <main class="tc-container">
                <div class="topbar" style="position:relative;" >
                <?php
                    if($this->menu){
                        $this->widget('bootstrap.widgets.TbNavbar', array(
                            'fixed' => 'top',
                            'htmlOptions' => array('style' => 'position:absolute'),
                            'brand'=>'',
                            'items'=> array(
                                array(
                                    'class' => 'bootstrap.widgets.TbMenu',
                                    'items'=>$this->menu,
                                )
                            )
                        ));
                    }
                ?>
                </div>
                <div style="margin-top:40px;clear:both;" ></div>
                <div class="main-body" >
                          <?php $this->widget('bootstrap.widgets.TbAlert', array(
                              'block'=>true,
                              'fade'=>true,
                              'closeText'=>'×',
                          ));
                            Yii::app()->clientScript->registerScript(
                                'myHideEffect',
                                '$(".fade").animate({opacity: 1.0}, 3000).fadeOut("slow");',
                                CClientScript::POS_READY
                            );
                        ?>
                        <?php echo $content; ?>  
                </div>
          </main>
       </section>
    </body>
</html>
