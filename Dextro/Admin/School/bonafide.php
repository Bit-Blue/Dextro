<?php

        include('../db.php');
	include('../attach/header_sch.php');
	$query=mysqli_query($con,"
SELECT admin_sch.Name,bonafide.Gr_no, bonafide.sr_no, user_sch.Name, user_sch.Medium, user_sch.Std,user_sch.Section, bonafide.date FROM bonafide INNER JOIN admin_sch ON bonafide.unique_id=admin_sch.unique_id INNER JOIN user_sch WHERE bonafide.Gr_no = user_sch.Gr_num");
	$i=0;
	$toal_Today_Amount = 0 ;
        $toal_late = 0;
		$amt=0;
		$qry=mysqli_query($con,"SELECT amount FROM expenses where date= CURRENT_DATE()");
		$i=0;
		while($t=mysqli_fetch_row($qry)){
				$amt=$amt+$t[0];
		}
			$bon=mysqli_query($con,"SELECT COUNT( * ) FROM bonafide");	
			$res=mysqli_fetch_row($bon)
		
	
		?>

		<!--<div class="span-right" >
		<div class="main-container" style="width: 1145px;height:520px; overflow:auto">
		
		<div class="post-text" style=" width:100%;">
		
		<!--<div class="post-header" style="width:1055px;font-weight:bold;">  -->
		<div class="span-right" style="width: 1134px;">
		<div class="main-container">
			 <div class="post-header" style="width:1134px;text-align:center">
				<span s>Bonafide Certificate</span>
			 </div>
		
			
		</div>
		 <div class="box-right" style="font-weight:bold;">
					    Total Bonafide :
								 
		<?php	
		echo $res[0];
		?>
		</div>
		<?php
		if(mysqli_num_rows($query)!=0){
		?>
		<div class="post-content">
		<!-- Modified By : Ranjeet|| 22-Dec || Added class  post-text-today with width :100% || fixed overlap  -->
                <div class="post-text-today" style="width:100%;height:400px;margin-left:7%;">
		</br></br><ul class="table-view" style="width: 1080px;">
					<li class="table-view-header" style="width:100px;">
							User
						</li>
						<li class="table-view-header" style="width:100px;">
							Enroll_no
						</li>
						<li class="table-view-header" style="width:100px;">
							sr_no
						</li>
						
						<li class="table-view-header" style="width:200px;">
							Name
						</li >
						<li class="table-view-header" style="width:100px;">
							Medium
						</li>
						<li class="table-view-header" style="width:100px;">
							Std
						</li>
						<li class="table-view-header" style="width:100px;">
							Div
						</li>
					
                       <li class="table-view-header" style="width:100px;">
							Date
						</li>
								
					</ul>
					<?php
							while($result=mysqli_fetch_row($query)){				
							
							$i++; 
					?>
					
                            <br>
					<ul class="table-view " style="width: 1080px;">
						<li class="table-view-header" style="width:100px;">
							<?php echo $result[0] ; ?>
                                                 
						</li>
						<li class="table-view-header" style="width:100px;">
							<?php echo $result[1] ; ?>
						</li>
						
						<li class="table-view-header" style="width:100px;">
							<?php echo $result[2]; ?>
						</li>
						<li class="table-view-header" style="width:200px;">
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
	?>
			</div>
                
                
                
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