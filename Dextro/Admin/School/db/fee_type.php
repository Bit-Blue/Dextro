<?php
include('../../db.php');

$mnt=$_POST['order'];

$query=mysqli_query($con,"SELECT Distinct fee_type FROM sch_tran");

//print_r($count);
while($result=mysqli_fetch_row($query))
{
$arr['data']=$result;
}
echo json_encode($arr);
exit;
?>