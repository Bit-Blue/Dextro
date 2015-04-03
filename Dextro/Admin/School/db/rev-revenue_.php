	
        
        
        
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
$exeQuery=mysqli_query($con,'select adm_sch_tran.Gr_num,user_sch.Name,'
        . 'adm_sch_tran.Reciept,adm_sch_tran.Amount,adm_sch_tran.fee_type,adm_sch_tran.pay_mode, '
        . 'adm_sch_tran.cheque_num,adm_sch_tran.late_fee,adm_sch_tran.reason '
        . 'FROM adm_sch_tran INNER JOIN user_sch ON user_sch.Gr_num=adm_sch_tran.Gr_num '
        . 'WHERE user_sch.Medium="English" AND user_sch.Std="Mr.dextro" AND user_sch.Section="A"');


// $exeQuery = mysql_query($queryContents);
$count_Rows = 0 ; 
$yearlyData = array();
if($exeQuery === FALSE ){//|| mysql_num_rows($exeQuery)== 0){
	 die(mysql_error()); 
  echo('No fee has been added, try adding fees.');
	exit;
}
else{

 ?>
	<div class="main-container">  
<!--            // while($fetchSet = mysql_fetch_array($exeQuery)) {-->-->


		<div class="post-header">
			<span class="yearly">Revenue Fees</span>
		</div>
		<div class="post-content">
			<div class="post-text">
				<ul class="table-view">
					<li class="table-view-header"  style="width:200px;">
						Gr_num
					</li>
					<li class="table-view-header" style="width:100px;">
						Name
					</li>
					<li class="table-view-header" style="width:100px;">
						Reciept
					</li>
					<li class="table-view-header" style="width:100px;">
						Amount
					</li>
					<li class="table-view-header" style="width:100px;">
						fee_type
					</li>
					<li class="table-view-header" style="width:100px;">
						pay_mode
					</li>
					<li class="table-view-header" style="width:auto">
						cheque_num
					</li>
                                        <li class="table-view-header" style="width:auto">
                                                late_fee
					</li>
                                        <li class="table-view-header" style="width:auto">
                                                reason 
					</li>
				</ul>
			
		<?php
		// foreach($arr1 as $key=>$val){
		while($fetchSet = mysqli_fetch_row($exeQuery)) {
			//$yearlyData = $fetchSet[$count_Rows];
		?>
			<ul class="table-view">
					<li style="width:200px;">
						<?php echo $fetchSet[1];?>
					</li>
					<li style="width:100px;">
						<?php echo $fetchSet[2];?>
					</li>
					<li style="width:100px;">
						<?php echo $fetchSet[0];?>
					</li>
					<li style="width:100px;">
						<?php echo $fetchSet[2];?>
					</li>
					<li style="width:100px;">
						<?php echo $fetchSet[6];?>
					</li>
                                        <li style="width:100px;">
						<?php echo $fetchSet[7];?>
					</li>
                                        <li style="width:100px;">
						<?php echo $fetchSet[8];?>
					</li>
                                        <li style="width:100px;">
						<?php echo $fetchSet[10];?>
					</li>
                                        <li style="width:100px;">
						<?php echo $fetchSet[11];?>
					</li>
					<li style="width:100px;">
						<?php echo $fetchSet[3];
						$yearly=$yearly+$fetchSet[3];
						?>
					</li>
					<li  class="revenue-pend" style="width:auto;">
						<?php echo $fetchSet[1];?>
					</li>
				</ul>
				<?php
				$count_Rows += 1 ; //increase count for while loop
		  }
}
?>
<ul class="table-view">
					<li class="table-view-header" style="width:100px;">
						
				
					</li>
					<li class="table-view-header" style="width:100px;">
						Total Pending Fee
					</li>
					<li class="table-view-header" style="width:110px;">
						<?php echo $yearly;?>
					</li>
					<li class="table-view-header" style="width:100px;">
						
					</li>
				</ul>
	</div>
</div>
