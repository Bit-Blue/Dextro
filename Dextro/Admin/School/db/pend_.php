<?php
include('../../db.php');
$yearly=0;
$monthly=0;

//Modified By Ranjeet || 23-Sep
$drpMedium=$_POST['drpMedium'];
$drpStd=$_POST['drpStd'];
$drpSec=$_POST['drpSec'];
$selectedMonths = $_POST['selectedMonths'];//Added | Ranjeet | 24-Nov
// $newSelectedMonth  = $_POST['newSelectedMonth'];//For month


				// and sch_tran.Month in  (".$selectedMonths.") //'Per Year'
				
				


				
				
				
$exeQuery=mysqli_query($con,"SELECT bal_amt.Gr_num,user_sch.Name,bal_amt.amt,bal_amt.bal,bal_amt.date FROM bal_amt INNER JOIN user_sch ON user_sch.Gr_num=bal_amt.Gr_num
where user_sch.Medium='".$drpMedium."' AND user_sch.Std=  '".$drpStd."'   AND user_sch.Section='".$drpSec."'");


// $exeQuery = mysql_query($queryContents);
$count_Rows = 0 ; 
$balRemaing=0;
$yearlyData = array();
if($exeQuery === FALSE ){//|| mysql_num_rows($exeQuery)== 0){
	 die(mysql_error()); 
  echo('No fee has been added, try adding fees.');
	exit;
}
else{

   // while($fetchSet = mysql_fetch_array($exeQuery)) {

?>
	<div class="main-container">
		<div class="post-header">
			<span class="yearly">Pending Fees ( Yearly Fee )</span>
		</div>
		<div class="post-content">
			<div class="post-text">
				<ul class="table-view">
					<li class="table-view-header"  style="width:200px;">
						EnRoll No.
					</li>
					<li class="table-view-header" style="width:100px;">
						Name
					</li>
					<li class="table-view-header" style="width:100px;">
						Amount
					</li>
					<li class="table-view-header" style="width:100px;">
						Balance
					</li>
					<li class="table-view-header" style="width:100px;">
						Date
					</li>
					
				</ul>
			
		<?php
		// foreach($arr1 as $key=>$val){
		
		while($fetchSet = mysqli_fetch_row($exeQuery)) {
			//$yearlyData = $fetchSet[$count_Rows];
		?>
			<ul class="table-view">
					<li style="width:200px;">
						<?php echo $fetchSet[0];?>
					</li>
					<li style="width:100px;">
						<?php echo $fetchSet[1];?>
					</li>
					<li style="width:100px;">
						<?php echo $fetchSet[2];?>
					</li>
					<li style="width:100px;">
						<?php echo $fetchSet[3];
						$balRemaing +=$fetchSet[3];
						
						?>
					</li>
					<li style="width:100px;">
						<?php echo $fetchSet[4];?>
					</li>
				</ul>
				<?php
				$count_Rows += 1 ; //increase count for while loop
		  }
}
?>
<ul class="table-view" style="margin-left: 200px">
					<li class="table-view-header" style="width:100px;">
						
				
					</li>
					<li class="table-view-header" style="width:100px;">
						Total Pending Fee
					</li>
					<li class="table-view-header" style="width:110px;">
						<?php echo $balRemaing;?>
					</li>
					<li class="table-view-header" style="width:100px;">
						
					</li>
				</ul>
	</div>
</div>
