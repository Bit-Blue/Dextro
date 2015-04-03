 <?php
	include('../../db.php');
		$fee=0;
		$late=0;
		$str=$_POST['sdate'];
		$end=$_POST['edate'];
		$query=mysqli_query($con,"select * from expenses where date between '$str' and '$end' order by date DESC");
		// echo("select * from sch_tran where date between '$str'and '$end' order by date DESC");
		$i=0;
	if(mysqli_num_rows($query)!=0){
		?>
		<div class="main-container">
		<div class="post-header">
			<span>Filted Expenses</span>
		</div>
		<div class="post-content">
                    <div class="post-text" style="width: 566px;height:auto; overflow: auto" >
					<ul class="table-view">
						<li class="table-view-header" style="width:100px;">
							to
						</li>
						<li class="table-view-header" style="width:50px;">
							mode
						</li>
						
						<li class="table-view-header" style="width: 100px;">
							check no
						</li >
						<li class="table-view-header" style="width:110px;">
							amount
						</li>
						<li class="table-view-header" style="width:70px;">
							remark
						</li>
						<li class="table-view-header" style="width: 71px;">
							date
						</li>
						
                                        </ul>
                                        <?php
							while($result=mysqli_fetch_row($query)){				
							
							$i++; 
					?>
					<ul class="table-view " style="width: 543px;">
						<li class="table-view-header" style="width:100px;">
							<?php echo $result[1] ; ?>
						</li>
						<li class="table-view-header" style="width:50px;">
							<?php echo $result[2] ; ?>
						</li>
						
						<li class="table-view-header" style="width: 100px;">
							<?php echo $result[3]; ?>
						</li>
						<li class="table-view-header" style="width:110px;">
							<?php echo $result[4]; ?>
						</li>
						<li class="table-view-header" style="width:70px;">
							<?php echo $result[5]; ?>
						</li>
                                                <li class="table-view-header" style="width:71px;">
							<?php echo $result[6]; ?>
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
       