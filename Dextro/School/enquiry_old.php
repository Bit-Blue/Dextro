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
                     <button style="margin-left: 510px;" id="call" class="callAjax"><span>Show</span></button>
                       
                </div>
                
                <div class="show-by-date">
                </div>
        </div>

               
               <?php
               //$id=$_COOKIE['Id'];
		//$query=mysqli_query($con,"select * from enquiry   where enquiry.unique_id='".$id."'  order by timestamp DESC limit 20");
		$query=mysqli_query($con,"select * from enquiry   order by timestamp DESC limit 20");
		$i=0;
                if(mysqli_num_rows($query)!=0){
		?>
                    
                <div id="hidediv" class="span-right" style="width: 1134px;">
		<div class="post-header">
			<span>Top Enquiry</span>
		</div>
		<div class="post-content">
                    <div class="post-text" style="width: auto;height:auto;">
					<ul class="table-view">
                                                <li class="table-view-header" style="width:100px;">
							Enrol.No
						</li>
						<li class="table-view-header" style="width:100px;">
							Name
						</li>
						<li class="table-view-header" style="width:100px;">
							Std
						</li>
						
						<li class="table-view-header" style="width: 100px;">
							Med
						</li>
						<li class="table-view-header" style="width:100px;">
							Gender
						</li>
						<li class="table-view-header" style="width:110px;">
							Contact No
						</li>
						<li class="table-view-header" style="width: 150px;">
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
                                                <li class="table-view-header" style="width:100px;">
							<?php echo $result[1] ; ?>
						</li>
						<li class="table-view-header" style="width:100px;">
							<?php echo $result[2] ; ?>
						</li>
						<li class="table-view-header" style="width:100px;">
							<?php echo $result[5] ; ?>
						</li>
						
						<li class="table-view-header" style="width: 100px;">
							<?php echo $result[6]; ?>
						</li>
						<li class="table-view-header" style="width:100px;">
							<?php echo $result[7]; ?>
						</li>
						<li class="table-view-header" style="width:110px;">
							<?php echo $result[10]; ?>
						</li>
                                                <li class="table-view-header" style="width:150px;">
							<?php echo $result[11]; ?>
						</li>
                                                <li class="table-view-header" style="width: 100px;">
							<?php echo $result[21]; ?>
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