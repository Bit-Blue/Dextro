 <?php
	include('../../db.php');
		$fee=0;
		$late=0;
		$str=$_POST['strdate'];
		$end=$_POST['enddate'];
		$query=mysqli_query($con,"
		SELECT A.Name,T.Gr_num,T.Reciept, T.Amount, T.Month, T.fee_type, T.pay_mode, T.cheque_num, T. late_fee, T.reason, T.date FROM sch_tran AS T INNER JOIN admin_sch AS A ON A.unique_id=T.unique_id WHERE T.date between '$str' and '$end'  UNION ALL SELECT A.Name,T.Gr_num, T.Reciept, T.Amount, T.Month, T.fee_type, T.pay_mode, T.cheque_num, T. late_fee, T.reason, T.date FROM adm_sch_tran AS T INNER JOIN admin_sch AS A ON A.unique_id=T.unique_id WHERE T.date between '$str' and '$end' Order by date DESC");
		
		// echo("select * from sch_tran where date between '$str'and '$end' order by date DESC");
		$i=0;
	if(mysqli_num_rows($query)!=0){
		?>
		<div class="main-container">
		<div class="post-header">
			<span>Recieved Revenue</span>
		</div>
		<div class="post-content" >
			<div class="post-text" style="width: 1006px;">
					<ul class="table-view">
                                            <li class="table-view-header" style="width:60px">
							User
						</li>
						<li class="table-view-header" style="width:70px">
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
							Receipt
						</li>
						<li class="table-view-header" style="width:60px">
							Amount
						</li>
						<li class="table-view-header" style="width:60px">
							Month
						</li >
						<li class="table-view-header" style="width:60px">
							Fee type
						</li>
						<li class="table-view-header" style="width:60px">
							Pay mode
						</li>
						<li class="table-view-header" style="width:60px">
							Cheque No
						</li>
						<li class="table-view-header" style="width:60px">
							Late fee 
						</li>
                                                <li class="table-view-header" style="width:60px">
							Reason
						</li>
						<li style="width:90px" class="table-view-header">
							Date
						</li>		
					</ul>
					<?php
							while($result=mysqli_fetch_row($query)){				
							$name=mysqli_fetch_row(mysqli_query($con,"select Name,Medium,Std,Section  from user_sch where Gr_num='".$result[1]."'"));
							$i++; 
					?>
					<ul class="table-view ">
                                            <li style="width:60px;">
							<?php echo $result[0] ; ?>
						</li>
						<li style="width:70px;">
							<?php echo $name[0] ; ?>
						</li><li style="width:60px;" >
							<?php echo $name[1] ; ?>
						</li><li style="width:60px;">
							<?php echo $name[2] ; ?>
						</li><li style="width:60px;">
							<?php echo $name[3] ; ?>
						</li>
						<li style="width:60px;">
							<?php echo $result[2] ; ?>
						</li>
						<li style="width:60px;" >
							<?php echo $result[3];
							$fee=$fee+$result[3];?>
						</li>
						<li style="width:60px;">
							<?php echo $result[4]; ?>
						</li>
						<li style="width:60px" >
							<?php echo $result[5]; ?>
						</li>
						<li style="width:60px;">
							<?php echo $result[6]; ?>
						</li>
						<li style="width:60px;">
							<?php echo $result[7]; ?>
						</li>
						<li style="width:60px;">
							<?php echo $result[8]; $late=$late+$result[8];?>
						</li>
                                                <li style="width:60px;">
							<?php echo $result[9]; ?>
						</li>
						<li style="width:90px">
							<?php echo $result[10]; ?>
						</li>
					</ul>
			
	<?php
	}
	}
	else{
		echo('No details exists for this duration');
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