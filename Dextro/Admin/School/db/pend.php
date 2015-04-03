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
?>

				
<div class="post-header">
			<span>Monthly Pending Fees </span>
		</div>
		<div class="post-content">
			<div class="post-text" style="width:950">
			<?php
				$totalUserquery=mysqli_query($con,"Select user_sch.Gr_num, sch_cls_fee.fee_type, user_sch.Name, sch_cls_fee.fee
					,user_sch.Medium,user_sch.Std,user_sch.Section
				from user_sch
				Inner Join sch_cls_fee
				On user_sch.Medium=sch_cls_fee.Medium 
				And user_sch.Std=sch_cls_fee.Std 
				AND user_sch.Medium = '".$drpMedium."' AND user_sch.Std = '".$drpStd."' 
				AND user_sch.Section = '".$drpSec."' 
				where sch_cls_fee.one_time ='Per Month' and sch_cls_fee.one_time not in ('Per Year')
				order by user_sch.Gr_num	
		");
				// echo "Select user_sch.Gr_num, sch_cls_fee.fee_type, user_sch.Name, sch_cls_fee.fee
				// 	,user_sch.Medium,user_sch.Std,user_sch.Section
				// from user_sch
				// Inner Join sch_cls_fee
				// On user_sch.Medium=sch_cls_fee.Medium 
				// And user_sch.Std=sch_cls_fee.Std 
				// AND user_sch.Medium = '".$drpMedium."' AND user_sch.Std = '".$drpStd."' 
				// AND user_sch.Section = '".$drpSec."' 
				// where sch_cls_fee.one_time ='Per Month'
				// order by user_sch.Gr_num";
// $totalTransQuery=mysqli_query($con,"Select user_sch.Gr_num, sch_tran.fee_type ,user_sch.Name, sch_tran.amount, sch_tran.month
// 				,user_sch.Medium,user_sch.Std,user_sch.Section
// 				from user_sch
// 				Inner Join sch_tran
// 				On user_sch.Gr_num=sch_tran.Gr_num  
// 				AND user_sch.Medium = '".$drpMedium."' AND user_sch.Std = '".$drpStd."' 
// 				AND user_sch.Section = '".$drpSec."' 
// 				where sch_tran.month NOT In ('One time') AND sch_tran.Month in  (".$selectedMonths.") 
// 				order by user_sch.Gr_num
// 		");
if($totalUserquery === FALSE ){//|| mysql_num_rows($exeQuery)== 0){
	 die(mysql_error()); 
  echo('No fee has been added, try adding fees.');
	exit;
}
else{

			?>
				<ul class="table-view">
					<li class="table-view-header" style="width:200px;">
						Name
					</li>
					<li class="table-view-header" style="width:100px;">
						Med
					</li>
					<li class="table-view-header" style="width:100px;">
						Std
					</li>
					<li class="table-view-header" style="width:100px;">
						Sec
					</li>
					<li class="table-view-header" style="width:100px;">
						GR Number
					</li>
					<li class="table-view-header" style="width:100px;">
						Amount
					</li>
					<li class="table-view-header" style="width:200px;">
						Month
					</li>
				</ul>
				
				<?php 
			$mon  = explode(',', $selectedMonths);
			
			while($val = mysqli_fetch_row($totalUserquery)) {
				
				$mon_query=mysqli_query($con,"select  Month, Amount from sch_tran  where Gr_num='".$val[0]."' And fee_type='".$val[1]."' " ) ;
				// echo "select  Month,Amount from sch_tran  where Gr_num='".$val[0]."' And fee_type='".$val[1]."' ";
				 $j =0 ;
				 $add = array(); //empty array
				
				while($mon_add=mysqli_fetch_array($mon_query)){
					$add[$j]= "'".$mon_add[0]."'";
					// print_r($mon_add[0]);
					 $j = $j + 1 ;
				}
				// print_r($add);
				// print_r("wcwec");
				// print_r(var_dump(array_diff($mon,$add)));

				$k = 0 ;
				$months = "";
				$t_amount = 0 ;
				
				// print_r($mon);
				// print_r("||");
				// print_r($add);
				$newArray = array_diff($mon,$add);
				// print_r("result");
				// print_r($newArray);
	
				if(!empty($newArray)){	
				
					foreach( $newArray as $key){
							 // print_r("key".$key);
							$months = $months." " .$key;
							$t_amount = $t_amount +  $val[3];
						// }}}
					}
				}
				// print_r($GrArra);

		if(!empty($months)){

		?>
			<ul class="table-view">
					<li style="width:200px;">
						<?php echo $val[2];?>
					</li>
					<li style="width:100px;">
						<?php echo $val[4];?>
					</li>
					<li style="width:100px;">
						<?php echo $val[5];?>
					</li>
					<li style="width:100px;">
						<?php echo $val[6];?>
					</li>
					<li style="width:100px;">
						<?php echo $val[0];?>
					</li>
					<li style="width:100px;">
						<?php 
						// $t_amount = $t_amount +  $val[3];
						echo $t_amount ;
						$monthly=$t_amount+$monthly;
						;?>
					</li>
					<li  class="revenue-pend" style="width:300px;">
						<?php
						//echo "Test";//$add; 
						echo $months;
						// print_r($mon);
						?>
					</li>
				</ul>
				<?php
			}
		}
	}
		
?>
<ul class="table-view">

					<li class="table-view-header" style="width:100px;">
						Total Pending Fee
					</li>
					<li class="table-view-header" style="width:100px;">
						<?php echo $monthly;?>
					</li>
				
				</ul>
</div>
</div>
</div>
<?php
exit;
?>
