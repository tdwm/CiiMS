<?php 
$this->widget('bootstrap.widgets.TbUEditor',
    array(
        'id'=>'editor_'.$attr,
        'model'=>$model,
        'attribute'=>$attr,
        'editorOptions'=>array(
            //'initialContent'=>'',
            //'autoFloatEnabled'=>true,
            //'wordCount'=>false,
            'autoHeightEnabled'=>false,
            'initialFrameWidth' => '500px',
            'minFrameHeight' => '300',
            'initialFrameHeight'=>'300',
            'elementPathEnabled'=>false,
            'imageUrl'=>$this->createUrl('/ueditor/default/uploadimg'),
            'imagePath'=>Yii::app()->baseUrl,
            'imageManagerUrl'=>$this->createUrl('/ueditor/default/ManageImg'),
            'imageManagerPath'=>Yii::app()->baseUrl,
            'toolbars'=>array(
                array(
                    'fullscreen',
                    'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', '|',
                    'fontsize',
                    'bold', 'italic', 'underline', 
                    'indent', 'autotypeset', 
                    'link', 'unlink',
                    'justifyleft', 'justifycenter', 'justifyright', 
                    'imagenone', 'imageleft',
                    'insertimage', 'insertvideo', 'inserttable','template',
                    '|', 'preview',
                )
            ),             
        ),

    ));
?>
