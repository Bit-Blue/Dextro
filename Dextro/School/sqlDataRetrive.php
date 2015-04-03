
<?php  
include('../../db.php');
parse_str($_POST['adm_cls'], $class); 


 $query=mysqli_query($con,"select fee_type from sch_cls_fee where one_time='".trim($class['adm_cls_mdm'])."' AND sch_class.Std='".trim($class['adm_cls_std'])."'");
       
?>