<?php
		include('../attach/header_sch.php');
		
?>

        <div class="span-right" style="width: 1134px;">
		<div class="main-container">
			 <div class="post-header" style="width: 1134px;">
				<span><a href="revenue.php" style="color:#fff;" > Revenue </a></span>
				<span>Expenses</span>
			 </div>
			
                            <div class="post-content">
                                    <div class="post-text">
					<div class="box-left" style="width: 220px;">
						 Start Date:<input type="date" name="sdate" id="sdate">
					</div>
					<div class="box-right" style="width: 280px;">
						 End Date:<input type="date" name="edate" id="edate">
					</div>					
                                    </div>
                               
                            </div>
                     <button style="margin-left: 510px;" id="call" class="callAjax"><span>Show</span></button>
                       
                </div>
                
                <div class="show-by-date">
                </div>
        </div>

               
               <?php
               
		$query=mysqli_query($con,"select * from expenses order by date DESC limit 20");
		$i=0;
                if(mysqli_num_rows($query)!=0){
		?>
                    
                <div id="hidediv" class="span-right" style="width: 1134px;">
		<div class="post-header">
			<span>Top Expenses</span>
		</div>
		<div class="post-content">
                    <div class="post-text" style="width: auto;height:auto;">
					<ul class="table-view">
                        <li class="table-view-header" style="width:100px;">
							unique_id
						</li>
						<li class="table-view-header" style="width:100px;">
							Receipt No
						</li>
						<li class="table-view-header" style="width:100px;">
							Name
						</li>
						<li class="table-view-header" style="width:100px;">
							Mode

						</li>
						<li class="table-view-header" style="width:100px;">
							Cheque_no
						</li>
						<li class="table-view-header" style="width:100px;">
							Amount
						</li>
						<li class="table-view-header" style="width:100px;">
							Remark
						</li>
                          <li class="table-view-header" style="width:100px;">
							Date
						</li>
						
                                        </ul>
                                        <?php
							while($result=mysqli_fetch_row($query)){				
							
							$i++; 
					?>
					<ul class="table-view ">
                                                 <li class="table-view-header" style="width:100px;">
							<?php echo $result[0] ; ?>
						</li>
						<li class="table-view-header" style="width:100px;">
							<?php echo $result[1] ; ?>
						</li>
						<li class="table-view-header" style="width:100px;">
							<?php echo $result[2] ; ?>
						</li>
						
						<li class="table-view-header" style="width:100px;">
							<?php echo $result[3]; ?>
						</li>
						<li class="table-view-header" style="width:100px;">
							<?php echo $result[4]; ?>
						</li>
						<li class="table-view-header" style="width:100px;">
							<?php echo $result[5]; ?>
						</li>
                        <li class="table-view-header" style="width:100px;">
							<?php echo $result[6]; ?>
						</li>
                        <li class="table-view-header" style="width:100px;">
							<?php echo $result[7]; ?>
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