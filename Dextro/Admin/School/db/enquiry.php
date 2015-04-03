 <?php
	include('../../db.php');
		$fee=0;
		$late=0;
		$str=$_POST['sdate'];
		$end=$_POST['edate'];
		$query=mysqli_query($con,"select admin_sch.Name, enquiry.sr_no,enquiry.name,enquiry.std,enquiry.medium,enquiry.sex,enquiry.cont_num,enquiry.address,enquiry.timestamp from enquiry INNER JOIN admin_sch ON enquiry.unique_id=admin_sch.unique_id where timestamp between '$str' and '$end' order by timestamp DESC");
		// echo("select * from sch_tran where date between '$str' and '$end' order by date DESC");
		$i=0;
	if(mysqli_num_rows($query)!=0){
		?>
		<div class="main-container">
		<div class="post-header">
			<span>Total Enquiry</span>
		</div>
		<div class="post-content">
                    <div class="post-text" style="width:auto;height:auto; overflow: auto" >
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
	else{
		echo('No details exists for this duration');
	}
?>
                                   
                    </div>
                   
                </div>
                </div>
       