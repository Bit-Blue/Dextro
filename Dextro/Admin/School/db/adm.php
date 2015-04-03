<?php
	include('../../db.php');
	//Added By Ranjeet || Filter values
	$drpMedium=$_POST['drpMedium'];
	$drpStd=$_POST['drpStd'];
	$drpSec=$_POST['drpSec'];  
        $drptype=$_POST['ftype']; 
	
        $selectedSort = $_POST['drpSort'];
        
        if($selectedSort =="discount")
        {
            $query=mysqli_query($con,"select * from adm_sch_tran");
            $i=0;  
        }
       
        
       
	if(mysqli_num_rows($query)!=0){					
	?>

		<div class="main-container">
		<div class="post-header">
			<span>Recieved Revenue</span>
	
		</div>
		<div class="post-content">
			<div class="post-text">
					<ul class="table-view">
						
						<li class="table-view-header"  style="width:100px;">
							Reciept
						</li>
						<li class="table-view-header" style="width:200px;" >
							Name
						</li>
						<li class="table-view-header" >
							En No 
						</li>
						<li class="table-view-header" >
							Amount
						</li>
						<li class="table-view-header" >
							Standard
						</li >
						<li class="table-view-header" style="width:100px">
							Division
						</li>
						<li class="table-view-header" >
							Discount
						</li>
						
						<li class="table-view-header" style="width:100px">
							Date
						</li>		
					</ul>
					<?php
                                            while($result=mysqli_fetch_row($query)){
							

                                                                
                                            if($selectedSort =="Per Month")
                                                                {
								//Commented : Ranjeet | 22-dec|| removed Medium, section. std | Added Gr_num | Fixed overlap
								//modified : Ranjeet || 24 Nov
							// $name=mysqli_fetch_row(mysqli_query($con,"select user_sch.Name,user_sch.Medium,user_sch.Std,user_sch.Section ,user_sch.Gr_num from user_sch 
							// 	INNER JOIN sch_tran ON user_sch.Gr_num = sch_tran.Gr_num
							// 	and sch_tran.Month in  (".$selectedMonths.") 
							// 	where user_sch.Gr_num='".$result[1]."' AND user_sch.Medium='".$drpMedium."' 
							// 	AND user_sch.Std='".$drpStd."' AND user_sch.Section='".$drpSec."' "));

								//
                                                                
								$name=mysqli_fetch_row(mysqli_query($con,"select user_sch.Name ,user_sch.Gr_num from user_sch 
								INNER JOIN sch_tran ON user_sch.Gr_num = sch_tran.Gr_num where user_sch.Gr_num='".$result[1]."' AND user_sch.Medium='".$drpMedium."' 
								AND user_sch.Std='".$drpStd."' AND user_sch.Section='".$drpSec."' "));
                                                                }
                                                     
                                                        else	
                                                        {
							  $name=mysqli_fetch_row(mysqli_query($con,"select Name,Medium,Std,Section,Gr_num from user_sch where Gr_num='".$result[1]."'"));
							  $i++; 
                                                        }
                                                        
                                                        
					if($name[0] !="")
                                        {		
					?>
					<ul class="table-view ">
						
						<li style="width:100px;">
							<?php echo $result[0]; ?>
						</li>
						<li  style="width:200px;">
							<?php echo $name[0]; ?>
						</li>
						<li >
							<?php echo $name[1]; ?>
						</li>
						<!-- <li>
							<?php echo $name[1]; ?>
						</li>
						<li >
							<?php echo $name[2]; ?>
						</li>
						<li >
							<?php echo $name[3]; ?>
						</li> -->
						<li  >
							<?php echo $result[2]; ?>
						</li>
						<li >
							<?php echo $result[4]; ?>
						</li>
						<li style="width:100px">
							<?php echo $result[6]; ?>
						</li>
						<li >
							<?php echo $result[7]; ?>
						</li>
						<li >
							<?php echo $result[8]; ?>
						</li>
						
						<li >
							<?php echo $result[10]; ?>
						</li>
						<li style="width:100px">
							<?php echo $result[12]; ?>
						</li>
					</ul>
	<?php
	}
   ?>
			
	<?php
	}
	}
	else{
	?>
	No fee history for this student.
	<?php
	}
?>
			</div>
			</div>
		</div>