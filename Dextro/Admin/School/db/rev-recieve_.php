<?php
	include('../../db.php');
	//Added By Ranjeet || Filter values
	$drpMedium=$_POST['drpMedium'];
	$drpStd=$_POST['drpStd'];
	$drpSec=$_POST['drpSec'];
//	$selectedMonths = $_POST['selectedMonths'];//Added | Ranjeet | 24-Nov
//	$query=mysqli_query($con,"select * from sch_tran where Month in  (".$selectedMonths.") order by date DESC;");
        
        $name=mysqli_query($con,"select adm_sch_tran.Gr_num,user_sch.Name,adm_sch_tran.Reciept,adm_sch_tran.Amount,"
. "adm_sch_tran.fee_type,adm_sch_tran.pay_mode, adm_sch_tran.cheque_num,adm_sch_tran.late_fee,adm_sch_tran.reason,adm_sch_tran.date "
. "FROM adm_sch_tran INNER JOIN user_sch ON user_sch.Gr_num=adm_sch_tran.Gr_num "
. "WHERE user_sch.Medium='".$drpMedium."' AND user_sch.Std='".$drpStd."' AND user_sch.Section='".$drpSec."'");
        
	$i=0;
	//if(mysqli_num_rows($query)!=0){					
	?>

		<div class="main-container">
		<div class="post-header">
			<span>Recieved Revenue</span>
	
		</div>
		<div class="post-content">
			<div class="post-text">
					<ul class="table-view">
					<li class="table-view-header"  style="width:100px;">
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
					<li class="table-view-header" style="width:100px;">
						cheque_num
					</li>
                                        <li class="table-view-header" style="width:100px;">
                                                late_fee
					</li>
                                        <li class="table-view-header" style="width:100px;">
                                                reason 
					</li>
                                        <li class="table-view-header" style="width:100px;">
                                                Date 
					</li>
				</ul>
			
      <?php
      try{
          $t_amount=0;
	while($result=mysqli_fetch_row($name)){
            ?>
        					<ul class="table-view ">
                                                  
						<li style="width:100px;">
							<?php echo $result[0] ; ?>
						</li>
						<li style="width:100px;">
							<?php echo $result[1]; ?>
						</li>
						<li style="width:100px">
							<?php echo $result[2]; ?>
						</li>
						<li style="width:100px">
							<?php echo $result[3];
                                                            $t_amount+=$result[3];
                                                        ?>
						</li>
						<li style="width:100px">
							<?php echo $result[4]; ?>
						</li>
						<li style="width:100px">
							<?php echo $result[5]; ?>
						</li>
						
						<li style="width:100px">
							<?php echo $result[6]; ?>
						</li>
						<li style="width:100px">
							<?php echo $result[7]; ?>
						</li>
                                                <li style="width:100px">
							<?php echo $result[8]; ?>
						</li>
                                                <li style="width:100px">
							<?php echo $result[9]; ?>
						</li>
					</ul>

			
	<?php
      } 
      ?>
                   
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
        <ul class="table-view "style="padding-left: 214px;">
                                                 <li class="table-view-header" style="width:100px; ">
						Total  Fee
					</li> 
						<li style="width:100px;">
                                                    <?php echo $t_amount ; ?>
						</li>
                                                </ul>
                            
                            
         <?php                                       
      }
  catch (Exception $e) {}
        
       
       ?>
	
			</div>
			</div>
                    

                    