<aside class="navigation tc-container">
 <headre></header>
<?php 
if (Yii::app()->getModule('user')->isAdmin()){
    $left_menu = array(
        array('icon'=>'icon-show-big-thumbnails','url'=>'','active'=>''),
        array('icon'=>'icon-pencil','url'=>'/admin/content','active'=>''),
        array('icon'=>'icon-cogwheels','url'=>'','active'=>''),
        array('icon'=>'icon-user','url'=>'/user/admin','active'=>''),
    );
} else {
    $left_menu = array(
        array('icon'=>'icon-show-big-thumbnails','url'=>'','active'=>''),
        array('icon'=>'icon-pencil','url'=>'','active'=>''),
        array('icon'=>'icon-cogwheels','url'=>'','active'=>''),
        array('icon'=>'icon-user','url'=>'/user/user/update','active'=>'')
    );

}
$this->widget('bootstrap.widgets.TbMenu',array(
    'type'=>'list',
    'htmlOptions'=>array('style'=>'color:white'),
    'items'=> $left_menu
));
?> 
 <footer>
    <section>
        <?php
        $this->widget('bootstrap.widgets.TbButton',
            array(
                'icon' => 'icon-power',
                'url'=>'/user/logout',
            )
        );
        ?>
    </section>
</footer>
</aside>
