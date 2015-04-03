<?php

        include('../db.php');
	include('../attach/header_sch.php');
	$query=mysqli_query($con,"SELECT admin_sch.Name,adm_sch_tran.Reciept,
	adm_sch_tran.Month ,adm_sch_tran.fee_type,adm_sch_tran.pay_mode,
	adm_sch_tran.cheque_num,adm_sch_tran.Amount,adm_sch_tran.late_fee, adm_sch_tran.reason,adm_sch_tran.date,adm_sch_tran.Gr_num FROM adm_sch_tran INNER JOIN admin_sch ON adm_sch_tran.unique_id=admin_sch.unique_id  where date= CURRENT_DATE() union all Select admin_sch.Name,sch_tran.Reciept,
	sch_tran.Month,sch_tran.fee_type,sch_tran.pay_mode,
	sch_tran.cheque_num,sch_tran.Amount,sch_tran.late_fee,sch_tran.reason,sch_tran.date,sch_tran.Gr_num from sch_tran INNER JOIN 
	admin_sch ON sch_tran.unique_id=admin_sch.unique_id where 
	date= CURRENT_DATE()");
    
	$i=0;
	$toal_Today_Amount = 0 ;
        $toal_late = 0;
	
		?>

		<div class="span-right" >
		<div class="main-container" style="width: 1145px;">
		<div class="post-header" style="width: 1055px;">
			<span>Recieved Revenue</span>
		</div>
		<?php
		if(mysqli_num_rows($query)!=0){
		?>
		<div class="post-content">
		<!-- Modified By : Ranjeet|| 22-Dec || Added class  post-text-today with width :100% || fixed overlap  -->
                <div class="post-text-today" style="width:100%;height:400px;">
					<ul class="table-view" style="width: 1080px;">
                        <li class="table-view-header" style="width:80px;">
							user
						</li>
						<li class="table-view-header" style="width:150px;">
							Name
						</li>
						<li class="table-view-header" style="width:50px;">
							Reciept
						</li>
						
						<li class="table-view-header" style="width:100px;">
							Month
						</li >
						<li class="table-view-header" style="width:110px;">
							Fee type
						</li>
						<li class="table-view-header" style="width: 70px;">
							Pay mode
						</li>
						<li class="table-view-header" style="width:80px;">
							Cheque No
						</li>
					<!-- lflag	<li class="table-view-header" style="width:100px;">
							Paid on time 
						</li> -->
                                                <li class="table-view-header" style="width:50px;">
							Amount
						</li>
						<li class="table-view-header" style="width:70px;">
							Late fee 
						</li>
                                                <li class="table-view-header" style="width:100px;">
							Reason 
						</li>
						<li class="table-view-header" style="width:100px;">
							Date
						</li>		
					</ul>
					<?php
							while($result=mysqli_fetch_row($query)){				
							$name=mysqli_fetch_row(mysqli_query($con,"select Name from user_sch where Gr_num='".$result[10]."'"));
							$i++; 
                                                       

					?>
                            <br>
					<ul class="table-view " style="width: 1080px;">
                        <li style="width:80px;">
							<?php echo $result[0] ; ?>
						</li>
						<li style="width:150px;">
							<?php echo $name[0] ; ?>
                                                 
						</li>
						<li style="width:50px;">
							<?php echo $result[1] ; ?>
						</li>
						
						<li style="width:100px;">
							<?php echo $result[2]; ?>
						</li>
						<li style="width:110px;">
							<?php echo $result[3]; ?>
						</li>
						<li style="width:70px;">
							<?php echo $result[4] ?>
						</li>
						<li style="width:80px;">
							<?php echo $result[5]; ?>
						</li>
					<!--lflag	<li style="width:100px;">
							<?php echo $result[6]; ?>
						</li>-->
                                                <li  style="width:50px;">
							<?php echo $result[6]; 
							$toal_Today_Amount = $toal_Today_Amount + $result[6]; ?>
						</li>
						<li style="width:70px;">
							<?php echo $result[7]; 
                                                        
                                                        $toal_late = $toal_late + $result[7]; 
                                                        ?>
						</li>
                                                <li style="width:100px;">
							<?php echo $result[8]; ?>
						</li>
						<li style="width:100px;">
							<?php echo $result[9]; ?>
						</li>
                                                
					</ul>
			
			
	<?php
	}
	?>
			</div>
                
                
                <ul class="table-view" style="margin-left: 259px;margin-top: 10px;">
			
					<li class="table-view-header" style="width: 115px;">
						Total Today Fee
					</li>
					<li class="table-view-header" style="width:110px;">
						<?php echo $toal_Today_Amount;?>
					</li>
					<li class="table-view-header" style="width: 100px;">
                                                Late Fee
					</li>
                                        <li class="table-view-header" style="width:110px;">
						<?php echo $toal_late;?>
					</li>
					
		</ul>
                </div>
		
	<?php
	}
	else{
	?>
	<div class="post-content">
	No fee history for today
	</div>
	<?php
	}
?>	
	</div></div>	
		
	
	<?php
	include('../attach/footer_sch.php');
?>