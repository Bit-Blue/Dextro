 <?php
	include('../../db.php');
		$fee=0;
		$late=0;
		$str=$_POST['strdate'];
		$end=$_POST['enddate'];
		$id=$_COOKIE['Id'];
		
		// $query=mysqli_query($con,"SELECT a.* FROM adm_sch_tran as a where date between '$str' and '$end' order by date DESC union all Select b.* from sch_tran as b where date between '$str' and '$end' order by date DESC");
                
        $query=mysqli_query($con,"SELECT a.* FROM adm_sch_tran AS a WHERE DATE BETWEEN '$str' AND '$end' AND a.unique_id='".$id."' UNION ALL SELECT b.* FROM sch_tran AS b WHERE DATE BETWEEN '$str' AND  '$end' AND b.unique_id='".$id."' ORDER BY DATE DESC" );
                
                
                
		// echo("select * from sch_tran where date between '$str'and '$end' order by date DESC");
		$i=0;
	if(mysqli_num_rows($query)!=0){
		?>
		<div class="main-container">
		<div class="post-header">
			<span>Recieved Revenue</span>
		</div>
		<div class="post-content" >
			<div class="post-text" style="width: 100%;" >
					<ul class="table-view">
						<li class="table-view-header" style="width:120px">
							Name
						</li>
						
						<li class="table-view-header" style="width:60px">
							Medium
						</li><li class="table-view-header" style="width:60px" >
							Std
						</li>
						<li class="table-view-header" style="width:60px">
							Sec
						</li><li class="table-view-header" style="width:60px">
							Reciept
						</li>
						<li class="table-view-header" style="width:60px">
							Amount
						</li>
						<li class="table-view-header" style="width:80px">
							Month
						</li >
						<li class="table-view-header" style="width:80px">
							Fee type
						</li>
						<li class="table-view-header" style="width:60px">
							Pay mode
						</li>
						<li class="table-view-header" style="width:70px">
							Cheque No
						</li>
					<!--	<li class="table-view-header">
							Paid on time 
						</li>-->
						<li class="table-view-header" style="width:60px">
							Late fee 
						</li>
                                                <li class="table-view-header" style="width:150px">
							Reason
						</li>
						<li style="width:90px" class="table-view-header">
							Date
						</li>		
					</ul>
					<?php
							while($result=mysqli_fetch_row($query)){				
							$name=mysqli_fetch_row(mysqli_query($con,"select Name,Medium,Std,Section  from user_sch where Gr_num='".$result[2]."'"));
							$i++; 
					?>
					<ul class="table-view ">
						<li style="width:120px;">
							<?php echo $name[0] ; ?>
						</li><li style="width:60px">
							<?php echo $name[1] ; ?>
						</li><li style="width:60px">
							<?php echo $name[2] ; ?>
						</li><li style="width:60px">
							<?php echo $name[3] ; ?>
						</li>
						<li style="width:60px">
							<?php echo $result[1] ; ?>
						</li>
						<li  style="width:60px">
							<?php echo $result[3]; $fee=$fee+$result[3];?>
						</li>
						<li style="width:80px">
							<?php echo $result[5]; ?>
						</li>
						<li style="width:80px" >
							<?php echo $result[7]; ?>
						</li>
						<li style="width:60px">
							<?php echo $result[8]; ?>
						</li>
						<li style="width:60px">
							<?php echo $result[9]; ?>
						</li>
					
						<li style="width:60px">
							<?php echo $result[11]; $late=$late+$result[11];?>
						</li>
                                                <li style="width:150px">
							<?php echo $result[12]; ?>
						</li>
						<li style="width:90px">
							<?php echo $result[13]; ?>
						</li>
					</ul>
		
	<?php
	}
	?>
	<ul class="table-view">
						<li class="table-view-header" style="width:150px;">
							 <?php echo("Amount:-".$fee);?>
						</li>
						<li class="table-view-header" style="width:150px;">
							 <?php echo("Late fee:-".$late);?> 
						</li>
						<li class="table-view-header" style="width:150px;">
							 <?php echo("Total Amount:-".($fee+$late));?>
						</li>		
					</ul>
<?php					
	}
	else{
		echo('No details exists for this duration');
	}
?>
				