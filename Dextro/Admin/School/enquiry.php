<?php
		include('../attach/header_sch.php');
		
?>

        <div class="span-right" style="width: 1134px;">
		<div class="main-container">
			 <div class="post-header" style="width: 1134px;">
				<span>Enquiry</span>
			 </div>
			
                            <div class="post-content">
                                    <div class="post-text">
					<div class="box-left" style="width: 220px;">
						 Start Date:<input type="date" name="start">
					</div>
					<div class="box-right" style="width: 280px;">
						 End Date:<input type="date" name="end">
					</div>					
                                    </div>
                               
                            </div>
                     <button style="margin-left: 510px;" id="call" class="callAjax1" onclick="addfun()"><span>Show</span></button>
                       
                </div>
                
                <div class="show-by-date">
                </div>
        </div>

               
               <?php
               
		$query=mysqli_query($con,"select admin_sch.Name, enquiry.sr_no,enquiry.name,enquiry.std,enquiry.medium,enquiry.sex,enquiry.cont_num,enquiry.address,enquiry.timestamp from enquiry INNER JOIN admin_sch ON enquiry.unique_id=admin_sch.unique_id order by timestamp DESC limit 10");
		$i=0;
                if(mysqli_num_rows($query)!=0){
		?>
                    
                <div id="hidediv" class="span-right" style="width: 1134px;">
		<div class="post-header">
			<span>Top Enquiry</span>
		</div>
		<div class="post-content" style="">
                    <div class="post-text" style="width: auto;height:auto;font-weight:bold;">
					<ul class="table-view">
						<li class="table-view-header" style="width:55px;">
							Name
						</li>
                        <li class="table-view-header" style="width:50px;">
							Sr_No
						</li>
						<li class="table-view-header" style="width:200px;">
							Name
						</li>
						<li class="table-view-header" style="width:60px;">
							Std
						</li>
						
						<li class="table-view-header" style="width: 100px;">
							Medium
						</li>
                                                
                        <li class="table-view-header" style="width:70px;">
							Gender
						</li>
						<li class="table-view-header" style="width:110px;">
							Contact No
						</li>
						<li class="table-view-header" style="width:300px;">
							Address
						</li>
                        <li class="table-view-header" style="width: 100px;">
							Date
						</li>
						
                                        </ul>
                                        <?php
							while($result=mysqli_fetch_row($query)){				
							
							$i++; 
					?>
					<ul class="table-view " style="width:auto;height: auto">
						<li class="table-view-header" style="width:55px;height:50px">
							<?php echo $result[0] ; ?>
						</li>
                        <li class="table-view-header" style="width:50px;height:50px">
							<?php echo $result[1] ; ?>
						</li>
						<li class="table-view-header" style="width:200px;height:50px">
							<?php echo $result[2] ; ?>
						</li>
						<li class="table-view-header" style="width:60px;height:50px">
							<?php echo $result[3] ; ?>
						</li>
						
						<li class="table-view-header" style="width: 100px;height:50px">
							<?php echo $result[4]; ?>
						</li>
						<li class="table-view-header" style="width:70px;height:50px">
							<?php echo $result[5]; ?>
						</li>
						<li class="table-view-header" style="width:110px;height:50px">
							<?php echo $result[6]; ?>
						</li>
						<li class="table-view-header" style="width:300px;height:50px ">
							<?php echo $result[7]; ?>
						</li>
                        <li class="table-view-header" style="width: 100px;height:50px ">
							<?php echo $result[8]; ?>
						</li>
						
					</ul>

	<?php
	}
        }
?>
                                   
                    </div>
                </div>
                </div>

		<?php
		include('../attach/footer_sch.php');
	
?>