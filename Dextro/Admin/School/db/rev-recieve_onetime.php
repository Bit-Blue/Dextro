<?php
	include('../../db.php');
	//Added By Ranjeet || Filter values
	$total_amt=0;
	$total_late=0;
	$drpMedium=$_POST['drpMedium'];
	$drpStd=$_POST['drpStd'];
	$drpSec=$_POST['drpSec'];
	$oneTimeType=$_POST['onetimeType'];
		$query=mysqli_query($con,"SELECT T.Gr_num, T.Reciept,US.Name, T.Amount,T.late_fee,T.pay_mode,T.cheque_num,T.fee_type,T.date FROM sch_tran AS T INNER JOIN user_sch AS US ON US.Gr_num=T.Gr_num WHERE US.Medium='".$drpMedium."' AND US.Section='".$drpSec."' AND US.Std='".$drpStd."' AND T.fee_type='One time' AND T.Month='".$oneTimeType."'"); 					
	?>

		<div class="main-container">
			<span>Recieved Revenue</span>		<div class="post-header">

	
		</div>
		<div class="post-content">
			<div class="post-text">
					<ul class="table-view">
						
						<li class="table-view-header" style="width:100px" >
						Gr_No
						</li>
                        <li class="table-view-header" style="width:100px" >
						Reciept

						 </li>
						<li class="table-view-header" style="width:100px;" >
							Name
						</li>
						
						
						<li class="table-view-header" style="width:100px">
							Amount
						</li >
						<li class="table-view-header" style="width:100px">
							Late_Fee
						</li >
						
						<li class="table-view-header" style="width:100px">
							Pay_Mode
						</li>
						<li class="table-view-header" style="width:100px">
							Cheque_No
						</li>
						
						<li class="table-view-header" style="width:100px">
							Fee_Type
						
							 
						</li>
						<li class="table-view-header" style="width:100px">
							Date
						</li>		
					</ul>
					<?php
							while($result=mysqli_fetch_row($query)){
							if($result[0] !=""){		
							?>		
									<ul class="table-view ">
						
						<li style="width:100px;" >
							<?php echo $result[0] ; ?>
						</li>
                                                <li style="width:100px;" >
							<?php echo $result[1] ; ?>
						</li>
						<li  style="width:100px;">
							<?php echo $result[2] ; ?>
						</li>
						
						<li style="width:100px;" >
							<?php echo $result[3] ; ?>
							<?php $total_amt+= $result[3] ; ?>
						</li>
						<li style="width:100px;" >
							<?php echo $result[4] ; ?>
							<?php $total_late+= $result[4] ; ?>
						</li>
						<li style="width:100px;" >
							<?php echo $result[5] ; ?>
						</li>
						<li style="width:100px" >
							<?php echo $result[6]; ?>
						</li>
						<li style="width:100px">
							<?php echo $result[7]; ?>
						</li>
						<li style="width:100px">
							<?php echo $result[8]; ?>
						</li>
											</ul>
											
	<?php                                                                  
							}


                                                            
						else	
						{		
					?>					
							<ul class="table-view ">							
							Data is Not available.
							</ul>

					
					
							
	<?php
	}
						}//if
   ?>
	
			</div>
			</div>
		</div>
<ul class="table-view" style="margin-left:0px; width:auto">
                                    <!--<hr>-->
					<li class="table-view-header" style="width:100px;margin-left:250px;">
                                            
						Total Amount Receive
					</li>
					<li class="table-view-header" style="width:100px;margin-left:;">
						<?php echo $total_amt;?>
					</li>
					
					<li class="table-view-header" style="width:100px;margin-left: 210px;">
                                            
						Total Late Fee
					</li>
					<li class="table-view-header" style="width:100px;margin-left:;">
						<?php echo $total_late;?>
					</li>
					
					
				</ul>
                                


