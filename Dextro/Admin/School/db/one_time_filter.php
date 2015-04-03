<?php
include('../../db.php');
$query=mysqli_query($con,"select DISTINCT  fee_type from sch_cls_fee where fee_type NOT IN ('Admission Fee' ,'Monthly Fee') ");
//$result=mysqli_featch_row($query);
$a = array();
$i=0;
while($result=mysqli_fetch_row($query)){
$a[$i] = $result[0]; 
$i++;
}
echo json_encode($a);
exit;
?>

