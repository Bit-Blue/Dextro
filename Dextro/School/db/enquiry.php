 <?php
	include('../../db.php');
		$fee=0;
		$late=0;
		$str=$_POST['sdate'];
		$end=$_POST['edate'];
		$query=mysqli_query($con,"select * from enquiry where timestamp between '$str' and '$end' order by timestamp DESC");
		// echo("select * from sch_tran where date between '$str'and '$end' order by date DESC");
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
                                                <li class="table-view-header" style="width:100px;">
							Sr No
						</li>
						<li class="table-view-header" style="width:150px;">
							Name
						</li>
						<li class="table-view-header" style="width:100px;">
							Medium
						</li>
						
						<li class="table-view-header" style="width: 100px;">
							Std
						</li>
						<li class="table-view-header" style="width:100px;">
							Gender
						</li>
						<li class="table-view-header" style="width:110px;">
							Contact No
						</li>
						<li class="table-view-header" style="width: 250px;">
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
                                                 <li class="table-view-header" style="width:100px;height:50px">
							<?php echo $result[1] ; ?>
						</li>
						<li class="table-view-header" style="width:150px;height:50px">
							<?php echo $result[2] ; ?>
						</li>
						<li class="table-view-header" style="width:100px;height:50px">
							<?php echo $result[6] ; ?>
						</li>
						
						<li class="table-view-header" style="width: 100px;height:50px">
							<?php echo $result[5]; ?>
						</li>
						<li class="table-view-header" style="width:100px;height:50px">
							<?php echo $result[7]; ?>
						</li>
						<li class="table-view-header" style="width:110px;height:50px">
							<?php echo $result[10]; ?>
						</li>
                                                <li class="table-view-header" style="width:250px; height:50px">
							<?php echo $result[11]; ?>
						</li>
                                                <li class="table-view-header" style="width: 100px;height:50px">
							<?php echo $result[21]; ?>
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
       