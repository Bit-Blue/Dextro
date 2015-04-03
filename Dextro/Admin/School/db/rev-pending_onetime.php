<?php
	include('../../db.php');
	//Added By Ranjeet || Filter values
	$drpMedium=$_POST['drpMedium'];
	$drpStd=$_POST['drpStd'];
	$drpSec=$_POST['drpSec'];
	$onetimeType=$_POST['onetimeType'];
	$total_amt=0;
	$query=mysqli_query($con,"SELECT user_sch.Gr_num,user_sch.Name,user_sch.Medium,user_sch.Std,user_sch.Section,sch_cls_fee.fee, sch_cls_fee.fee_type,sch_cls_fee.one_time FROM user_sch INNER JOIN sch_cls_fee ON sch_cls_fee.Medium =user_sch.Medium WHERE user_sch.Medium='".$drpMedium."' AND user_sch.Std='".$drpStd."' AND user_sch.Section='".$drpSec."' AND sch_cls_fee.fee_type = '".$onetimeType."' AND sch_cls_fee.one_time='Per Year' AND user_sch.Gr_num NOT IN (SELECT DISTINCT sch_tran.`Gr_num` FROM sch_tran WHERE sch_tran.fee_type <> 'Monthly Fee'  AND sch_tran.Month ='".$onetimeType."'  )");


	
	?>

		<div class="main-container">
			<span>Received Revenue</span>		<div class="post-header">

	
		</div>
		<div class="post-content">
			<div class="post-text">
					<ul class="table-view">
						
						<li class="table-view-header" style="width:100px" >
						Gr_No
						</li>
                        
						<li class="table-view-header" style="width:100px;" >
							Name
						</li>
						
						
						<li class="table-view-header" style="width:100px">
							Medium
						</li >
						<li class="table-view-header" style="width:100px">
							Std
						</li >
						
						<li class="table-view-header" style="width:100px">
							Div
						</li>
						<li class="table-view-header" style="width:100px">
							Pending Fee
						</li>
						
						<li class="table-view-header" style="width:100px">
							Fee_Type
						
							 
						</li>
						<li class="table-view-header" style="width:100px">
							One time
						</li>		
					</ul>
					<?php
							while($result=mysqli_fetch_row($query)){
							if($result[0] !=" "){		
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
						</li>
						<li style="width:100px;" >
							<?php echo $result[4] ; ?>
						</li>
						<li style="width:100px;" >
							<?php echo $result[5] ; ?>
							<?php $total_amt+= $result[5] ; ?>
						</li>
						<li style="width:100px" >
							<?php echo $result[6]; ?>
						</li>
						<li style="width:100px">
							<?php echo $result[7]; ?>
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
					<li class="table-view-header" style="width:100px">
                                            
						Total Amount Pending
					</li>
					<li class="table-view-header" style="width:100px;margin-left:;">
						<?php echo $total_amt;?>
					</li>
					
					
					
				</ul>




