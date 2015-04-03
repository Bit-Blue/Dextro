<?php

        include('../db.php');
	include('../attach/header_sch.php');
	$id=$_COOKIE['Id'];
	$query=mysqli_query($con,"SELECT * FROM adm_sch_tran where date= CURRENT_DATE() AND adm_sch_tran.unique_id='".$id."' union all Select * from sch_tran where date= CURRENT_DATE() AND sch_tran.unique_id='".$id."'");
        
	$i=0;
	$toal_Today_Amount = 0 ;
        $toal_late = 0;
	
		?>

		<div class="span-right" >
		<div class="main-container" style="width: 1145px;">
		<div class="post-header" style="width: 1055px;">
			<span>Recieved Revenue</span>
		</div>
		<?php
		if(mysqli_num_rows($query)!=0){
		?>
		<div class="post-content">
		<!-- Modified By : Ranjeet|| 22-Dec || Added class  post-text-today with width :100% || fixed overlap  -->
                <div class="post-text-today" style="width:100%;height:400px;">
					<ul class="table-view" style="width: 1080px;">
						<li class="table-view-header" style="width:100px;">
							Name
						</li>
						<li class="table-view-header" style="width:50px;">
							Reciept
						</li>
						
						<li class="table-view-header" style="width:100px;">
							Month
						</li >
						<li class="table-view-header" style="width:110px;">
							Fee type
						</li>
						<li class="table-view-header" style="width: 70px;">
							Pay mode
						</li>
						<li class="table-view-header" style="width:100px;">
							Cheque No
						</li>
					<!-- lflag	<li class="table-view-header" style="width:100px;">
							Paid on time 
						</li> -->
                                                <li class="table-view-header" style="width:50px;">
							Amount
						</li>
						<li class="table-view-header" style="width:70px;">
							Late fee 
						</li>
                                                <li class="table-view-header" style="width:100px;">
							Reason 
						</li>
						<li class="table-view-header" style="width:100px;">
							Date
						</li>		
					</ul>
					<?php
							while($result=mysqli_fetch_row($query)){				
							$name=mysqli_fetch_row(mysqli_query($con,"select Name from user_sch where Gr_num='".$result[2]."'"));
							$i++; 
                                                       

					?>
                            <br>
					<ul class="table-view " style="width: 1080px;">
						<li style="width:100px;">
							<?php echo $name[0] ; ?>
                                                 
						</li>
						<li style="width:50px;">
							<?php echo $result[1] ; ?>
						</li>
						
						<li style="width:100px;">
							<?php echo $result[5]; ?>
						</li>
						<li style="width:110px;">
							<?php echo $result[7]; ?>
						</li>
						<li style="width:70px;">
							<?php echo $result[8]; ?>
						</li>
						<li style="width:100px;">
							<?php echo $result[11]; ?>
						</li>
					<!--lflag	<li style="width:100px;">
							<?php echo $result[10]; ?>
						</li>-->
                                                <li  style="width:50px;">
							<?php echo $result[3]; 
							$toal_Today_Amount = $toal_Today_Amount + $result[3]; ?>
						</li>
						<li style="width:70px;">
							<?php echo $result[11]; 
                                                        
                                                        $toal_late = $toal_late + $result[11]; 
                                                        ?>
						</li>
                                                <li style="width:100px;">
							<?php echo $result[12]; ?>
						</li>
						<li style="width:100px;">
							<?php echo $result[13]; ?>
						</li>
                                                
					</ul>
			
			
	<?php
	}
	?>
			</div>
                
                
                <ul class="table-view" style="margin-left: 259px;margin-top: 10px;">
			
					<li class="table-view-header" style="width: 115px;">
						Total Today Fee
					</li>
					<li class="table-view-header" style="width:110px;">
						<?php echo $toal_Today_Amount;?>
					</li>
					<li class="table-view-header" style="width: 100px;">
                                                Late Fee
					</li>
                                        <li class="table-view-header" style="width:110px;">
						<?php echo $toal_late;?>
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