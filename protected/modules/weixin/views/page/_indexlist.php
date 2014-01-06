<?php
if($index%3 == $colnum){
   $this->renderPartial('_view',array('data'=>$data));
}
?>
