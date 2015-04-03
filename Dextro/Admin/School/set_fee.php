<?php
	include('../attach/header_sch.php');
	//echo($fcount);
	
?>
<div class="span-right">
	<div class="main-container">
		<div class="post-header">
			<span>View Class Fees</span>
		</div>
		<div class="post-content">
                    <div class="post-text" style=" width:100%; height:400px; overflow: auto">
				<ul class="table-view" style=" width: 900px;">
					<li class="table-view-header"style="width:65px;">
						User
					</li>
					<li class="table-view-header" style="width:65px;">
						Medium
					</li>
					<li class="table-view-header" style="width:65px;">
						Standard
					</li>
					<li class="table-view-header" style="width:100px;">
						Fee type
					</li>                                     
					<li class="table-view-header" style="width:120px;">
						Fee
					</li>
					<li class="table-view-header" style="width:65px;">
						Late fee 
					</li >
					<li class="table-view-header" style="width:100px;">
						Frequency
					</li >
			    	<li class="table-view-header" style="width:65px;">
				    	Fee count
					</li >
				    </ul>
				<?php

					$query=mysqli_query($con,"select admin_sch.Name,sch_cls_fee.Medium,sch_cls_fee.Std,"
                        . "sch_cls_fee.fee_type,sch_cls_fee.fee,sch_cls_fee.lfee,sch_cls_fee.one_time from "
                        . "sch_cls_fee INNER JOIN admin_sch ON sch_cls_fee.unique_id=admin_sch.unique_id");
					$i=0;
					if(mysqli_num_rows($query)!=0)
                                        {
					while($result=mysqli_fetch_row($query))
                                        {
					$i++;
				$count=0;
					$fcount=mysqli_query($con,"select count(sch_tran.Gr_num) 
						from user_sch 
						inner join sch_tran 
						on user_sch.Gr_num=sch_tran.Gr_num 
						where user_sch.Medium  = '".$result[1]."' and user_sch.Std = '".$result[2]."' 
						and sch_tran.fee_type = '".$result[3]."'
						
					");
					// echo " select user_sch.Medium,user_sch.Std,sch_tran.fee_type 
					// 	from user_sch 
					// 	inner join sch_tran 
					// 	on user_sch.Gr_num=sch_tran.Gr_num 
					// 	where user_sch.Medium  = '".$result[0]."' and user_sch.Std = '".$result[1]."' 
					// 	and sch_tran.fee_type = '".$result[2]."' ";
					while($set=mysqli_fetch_row($fcount)){
						// if($result[0]==$set[0] && $result[1]==$set[1] && $result[2]==$set[2])
						// $count++;
						$count = $set[0];
				}
					
                                ?>	
				<ul class="table-view " style=" width: 900px;">
					<li style="width:65px;">
						<?php echo $result[0]; ?>
					</li >
					<li style="width:65px;">
						<?php echo $result[1]; ?>
					</li>
					<li style="width:65px;">
						<?php echo $result[2]; ?>
					</li>
					<li style="width:100px;">
						<?php echo $result[3]; ?>
					</li>                                        
					<li style="width:120px;">
						<?php echo $result[4]; ?>
					</li>
					<li style="width:65px;">
						<?php echo $result[5]; ?>
					</li>
					<li style="width:100px;">
						<?php echo $result[6]; ?>
					</li>
					<li style="width:65px;">
						<?php 
						echo $count;
						?>
					</li>
				</ul>
				<?php
					}
					}
				?>
				<span style="display:none" class="table-view-id">
				<?php echo $i++?>
				</span>
                        
                        
				<div class="table-view-result">
				
				</div>
			</div>
		</div>
	</div>
	<div class="main-container">
		<div class="post-header">
			<span>Set Fees</span>
		</div>
		<div class="post-content">
			<div class="post-text">
				<form class="adm_set"  method="post">
					<div class="box-left">
						 Medium:<select name="adm_set_mdm">
						 <option value="default">Select One</option>
							<option value="English">English</option>
							 <option value="Hindi">Hindi</option>
							 <option value="Marathi">Marathi</option>
                                                        
						</select>
					</div>
					<div class="box-right">
						 Standard:<select id="drop" name="adm_set_std">
							<option value="default">Select One</option>
							  <option value="Mr.dextro">Mr.dextro</option>
							 <option value="nursery">Nursery</option>
                                                         <option value="junior.kg">jr.kg</option>
                                                         <option value="senior.kg">sr.kg</option>
							 <option value="first">First</option>
							 <option value="second">Second</option>
							 <option value="third">Third</option>
							 <option value="fourth">Fourth</option>
							 <option value="fifth">Fifth</option>
							 <option value="sixth">Sixth</option>
							 <option value="seventh">Seventh</option>
							 <option value="eighth">Eighth</option>
							 <option value="ninth">Ninth</option>
							 <option value="tenth">Tenth</option>
                                                         <option value="all">All</option>
						</select>
					</div>
                                  
                                    
                                    
					<div class="box-left">
						 Fee type: <input  name="adm_set_fee_type" list="languages"/>
                                                                 
                                                     
                                                        <datalist id="languages">
                                                        <option value="default"></option>
                                                        <option value="Admission Fee"></option>
								                       <option value="Monthly Fee"></option>
								                       <option value="Exam Fee 1 "></option>
								                        <option value="Exam Fee 2 "></option>
								                       <option value="Computer Fee 1 "></option>
													   <option value="Computer Fee 2 "></option>
								                     <option value="Sports"></option>
								                      <option value="Workbook"></option>
								                     <option value="Notebook"></option>
								                      <option value="OtherActivity"></option>
								                         <option value="Summer Camp"></option>
                                                                
                                                     
                                                        </datalist> 
                                                                 
							
					</div>
                                    
                                        <div class="box-right">
					     Fees: <input  type="text" name="adm_set_fee">
					</div>
                                    
					<div class="box-left">
						 Late fee:<input  type="text" name="adm_set_lfee">
					</div>
					<div class="box-right">
						 Frequency:
							<br/>
						<label class="checkbox-text"><input  type="radio" name="adm_set_one" value ="Per Year">Per Year</label><br/>
						<label class="checkbox-text"><input  type="radio" name="adm_set_one" value="Per Month">Per Month</label>
							<button class="adm_set_sub_button"><span>Add</span></button>
					</div>
                                    
	
				</form>
			
			</div>
		</div>
	</div>
		
</div>
 <?php
	include('../attach/footer_sch.php');
?>