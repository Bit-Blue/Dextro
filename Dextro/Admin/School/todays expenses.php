<?php

        include('../db.php');
	include('../attach/header_sch.php');
	$query=mysqli_query($con,"SELECT  admin_sch.Name,expenses.receipt_no,expenses.to,expenses.mode,expenses.cheque_no,expenses.amount,expenses.remark,
	expenses.date
	FROM expenses INNER JOIN admin_sch ON expenses.unique_id=admin_sch.unique_id
	where date= CURRENT_DATE() ");
         
	$i=0;
	$toal_Today_Amount = 0 ;
        $toal_late = 0;
		$amt=0;
		$qry=mysqli_query($con,"SELECT amount FROM expenses where date= CURRENT_DATE()");
		$i=0;
		while($t=mysqli_fetch_row($qry)){
				$amt=$amt+$t[0];
			
				
		}
	
		?>

		<div class="span-right" >
		<div class="main-container" style="width: 1145px;">
		<div class="post-header" style="width: 1055px;">
			<span>Today Expenses</span>
		</div>
		<?php
		if(mysqli_num_rows($query)!=0){
		?>
		<div class="post-content">
		<!-- Modified By : Ranjeet|| 22-Dec || Added class  post-text-today with width :100% || fixed overlap  -->
                <div class="post-text-today" style="width:100%;height:400px;">
					<ul class="table-view" style="width: 1080px;">
					<li class="table-view-header" style="width:80px;">
							User
						</li>
						<li class="table-view-header" style="width:80px;">
							Reciept No
						</li>
						<li class="table-view-header" style="width:200px;">
							Name
						</li>
						
						<li class="table-view-header" style="width:100px;">
							Mode
						</li >
						<li class="table-view-header" style="width:100px;">
							cheque no
						</li>
						<li class="table-view-header" style="width:100px;">
							amount
						</li>
						<li class="table-view-header" style="width:200px;">
							remark
						</li>
					
                       <li class="table-view-header" style="width:100px;">
							date
						</li>
								
					</ul>
					<?php
							while($result=mysqli_fetch_row($query)){				
							
							$i++; 
					?>
					
                            <br>
					<ul class="table-view " style="width: 1080px;">
						<li style="width:80px;">
							<?php echo $result[0] ; ?>
                                                 
						</li>
						<li style="width:80px;">
							<?php echo $result[1] ; ?>
						</li>
						
						<li style="width:200px;">
							<?php echo $result[2]; ?>
						</li>
						<li style="width:100px;">
							<?php echo $result[3]; ?>
						</li>
						<li style="width:100px;">
							<?php echo $result[4]; ?>
						</li>
						<li style="width:100px;">
							<?php echo $result[5]; ?>
						</li>
						<li style="width:200px;">
							<?php echo $result[6]; ?>
						</li>
						<li style="width:100px;">
							<?php echo $result[7]; ?>
						</li>
                            
						
                                                
					</ul>
			
			
	<?php
	}
	?>
			</div>
                
                
                <ul class="table-view" style="margin-left:130px;margin-top: 10px;">
			
					<li class="table-view-header" style="width: 115px;">
						Total expenses
					</li>
					<li class="table-view-header" style="width:110px;">
						<?php echo $amt;?>
					</li>

					
		</ul>
                </div>
		
	<?php
	}
	else{
	?>
	<div class="post-content">
	No fee history for today
	</div>
	<?php
	}
?>	
	</div></div>	
		
	
	<?php
	include('../attach/footer_sch.php');
?>