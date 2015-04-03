<?php
include('../../db.php');
//Added | Ranjeet | 22-Dec \ For random recipt number
$reciept_Number = "0";
$Valid = false;
parse_str($_POST['fee_show'], $grn);
$id=mysqli_fetch_assoc(mysqli_query($con,"SELECT * from user_sch	
	where Gr_num='".$grn['sch_grn']."'
	")
);
if(!$id){
	?>
	<p>No Matches Found of this GR/SR number</p>
	<?php
	exit;
}

       /* 
	$query=mysqli_query($con,"select one_time from sch_cls_fee");
	if(mysqli_num_rows($query)!=0)
        {
            while($result=mysqli_fetch_row($query))
            {
                echo $result[0];
            }
        }*/
	$qry=mysqli_fetch_row(mysqli_query($con,"SELECT SUBSTRING(Reciept,3) FROM sch_tran ORDER BY Reciept DESC LIMIT 1"));
               
          
                $add = $qry[0]+1;
             
                
                
               
?>
<div class="main-container">
	<div class="Post-header ">
		<span>Fee Details</span>
	</div>
	<div class="Post-header hidden-name" >
			
		<img src="<?php $header_query=mysqli_query($con,'SELECT name,logo from info where Key_p="007"');
		$header_name=mysqli_fetch_row($header_query);
		echo('../Admin/school/'.$header_name[1]);?>">
	<span><?php 
		echo $header_name[0];
		?>
	
		</span>
		
	</div>
	<div class="post-content">
		<div class="post-text">
				<div class="box-left">
					Name:<span class="form-text"><b><?php echo $id['Name'];?></b></span>
				</div>
				<div class="box-right" >
					 Enroll No:: <span class="fee_chng_grn form-text"><b id="fee_chng_grNum"><?php echo $id['Gr_num'];?></b></span>
				</div>
				<div class="box-left">
					Medium:<span class="fee_chng_mdm form-text"> <b><?php echo $id['Medium'];?></b></span>
				</div>
				<div class="box-right">
					Standard: <span class="fee_chng_std form-text"><b><?php echo $id['Std'];?></b><span>
				</div>
				<div class="box-left">
					Section: <span class="form-text"><b><?php echo $id['Section'];?></b></span>
				</div>
				<div class="fee_chng_div">
				<!-- <form class="fee_chng_form" name="fee-change"  method="POST"> -->
				
                                
                                <div class="box-right">
                                    Fee type:   <select onchange="fee_type()"  list="languages" name="fee_chng_form_fee_type">
                                                
                                                        <datalist id="languages">
								 <option value="default">Select One</option>
								 <option value="Admission Fee">Admission</option>
								 <option value="Monthly Fee">Monthly</option>
								 <option value="Exam Fee 1">Exam Fee 1</option>
								 <option value="Exam Fee 2 ">Exam Fee 2</option>
								
								 <!--<option value="Sports">Sports</option>-->
								 <option value="Computer Fee 1">Computer Fee 1</option>
								 	 <option value="Computer Fee 2">Computer Fee 2</option>
								 <option value="OtherAcitvity">OtherAcitvity</option>
								 <option value="Workbook">Workbookorkbook</option>
								 <option value="Notebook">Notebook</option>
     
														
                                                        </datalist>
                                    </select>
 
                                </div>
                                
                                
					</div>
					<!-- <input type="button" id="btn_fee_chng_pop_add" value="Add" /> -->
					<!-- <div><button class="sch_fee_mulAdd"><span>Add </span></button></div> -->
					<div class="box-left" style="height:140px">
							Reciept Number: <input class="fee-chng-form-reciept" style="width:80px"type="text" value="<?php echo "RC".$add; ?>" name="fee_chng_form_reciept">
					</div>
					<div class="box-right" >
						Month <span class="fee_chng_form_hide form-text" style="height:140px;width:170px;float:right;display:inline-block;overflow:auto;position:relative;left:10px;"></span>
						
					</div>
                               
					<div class="box-left">
							Payment mode:<select name="fee_chng_form_paym" onchange="cheque()">
							<option value="default">Select One</option>
							<option value="cash">Cash</option>
							<option value="cheque">Cheque</option>
						 </select>
					</div>					
					<div class="box-right">
						Cheque Number:<input style="width:60px;visibility:hidden" type='text' value="0" name="fee_chng_form_chq">
					</div>
					<div class="box-left">
						Amount:<b><span class="form-text fee_chng_form_hide_1"></span></b>
                                                       <b><span class="form-text fee_chng_form_hide_4" style="display:none;"></span></b>
					</div>
					<div class="box-right">
						Late Fees:<b><span class="form-text fee_chng_form_hide_2" style="display:none;"></span></b>
						<b><span class="form-text fee_chng_form_hide_3" style="display:none;"></span></b>
					</div>
					<div  style="display:none;" id="Dischide" class="box-left">
						Discount:<b><input style="width: 92px;" class="disc" type="text"/></b>
					</div>
					<div  style="display:none;" id="Resnhide" class="box-right">
                                            <span style="margin-right: 87px;">Reason:</span><b><textarea class="resn"></textarea></b>
					</div>
                                        <div  style="display:none;" id="Paidhide" class="box-left">
						Paid:<b><input style="width: 92px;" class="paid" type="text"/></b>
					</div>
                                        <div class="box-right ">
					<button id="btn_fee_chng_pop_add" >Add Fees</button>
						<!-- <button class="sch_fee_verify"><span>Add fees</span></button> -->
					</div>
                               </div>
				<!-- </form> -->
		</div>
		</div>
		 </div>
		 <!-- Added : Ranjeet | 05-Jan-15 | To add Multiple fee -->
	<div class="main-container ">
		 <div class="post-header">
		 	<span> Added Fees </span>
		 </div>
                     
		 	<form class="fee_chng_form" method="POST" name="fee_chng_form">
		 	<table id="tblAddedFeeSummary" width="80%" style="margin:10px 10% 10px 10%;padding:10px;">
		 	<tr class='tbl-header-text' style="display:none">
		 		<td>Recipt</td>
		 		<td>GR Number</td>
                                <td>Paid</td>
                                <td>Bal</td>
		 		<td>Month</td>
		 		<td>Fee Type</td>
		 		<td>Pay Mode</td>
		 		<td>Cheque</td>
		 		<td>Late Fee</td>
                                <td>Reason</td>
		 		<td><br/></td>
		 	</tr>
		 		<!-- <tr class="no-data-table" style="color:red;"><td>No Data</td></tr> -->
		 	</table>
		 	<span class="no-data-table" style="color:red;">No Data</span>
		 	
		 	</form>
		 	
		 	<div class="post-text" style="margin:5px;">
                            <button class="sch_fee_verify" onclick="discClicked()" >Submit</button>
			</div>

	</div>
		 <div class="main-container ">
			<div class="post-header">
				<span>Fee Available for this class</span>
			</div>
			<div class="post-content">
				<div class="post-text">
					<ul class="table-view">
					<li class="table-view-header" style="width:100px;">
						Fee type
					</li>
					<li class="table-view-header" style="width:100px;">
						Fee
					</li>
					<li class="table-view-header" style="width:100px;">
						Late fee 
					</li >
					<li class="table-view-header" style="width:100px;">
						One time 
					</li >
				</ul>
				<?php

					$query=mysqli_query($con,"select fee_type,fee,lfee,one_time from sch_cls_fee where Medium='".$id['Medium']."' AND Std='".$id['Std']."'");
					$i=0;
					if(mysqli_num_rows($query)!=0){
					while($result=mysqli_fetch_row($query)){
					$i++;
				?>	
				<ul class="table-view">
					<li style="width:100;">
						<?php echo $result[0]; ?>
					</li>
					<li  style="width:100px;">
						<?php echo $result[1]; ?>
					</li>
					<li style="width:100px;">
						<?php echo $result[2]; ?>
					</li>
					<li style="width:100px;">
						<?php echo $result[3]; ?>
					</li>

				</ul>
				<?php
					}
					}
					else{
					?>
					No fee added for this class
					<?php
					}
				?>

				</div>
			</div>
		 </div>
		 	<div class="main-container ">
		<div class="Post-header">
			<span>Unpaid fees</span>
		</div>
		<div class="post-content">
			<div class="post-text" style="width:auto">
				<ul class="table-view" >
					<li class="table-view-header" style="width:100px;">
						Fee type
					</li>
					<li class="table-view-header" style="width:100px;">
						Amount
					</li>
					<li class="table-view-header" style="width:100px;">
						Frequency
					</li >
					<li class="table-view-header" style="width:100px;">
						Late fees
					</li>
					<li class="table-view-header" style="width:250px;">
						Remaining Month(if per month)
					</li>
                                        <li class="table-view-header" style="width:250px;">
						Pending Admission Fee
					</li>
                                        
				</ul>
			<?php
			   	$query=mysqli_query($con,"select fee_type,fee,lfee,one_time from sch_cls_fee where Medium='".$id['Medium']."' AND Std='".$id['Std']."'");
				if(mysqli_num_rows($query)!=0){
					while($fees=mysqli_fetch_row($query)){
                                            
											static  $check_bal=0;
											if($fees[0]=="Admission Fee")
											{
                                                $check_bal = mysqli_query($con,"SELECT balance FROM `adm_sch_tran` where Gr_num ='".$grn['sch_grn']."'");
											}
											
						$tran_query=mysqli_query($con,"select * from sch_tran where Gr_num='".$id['Gr_num']."' And fee_type='".$fees[0]."'");
                                                
                                                $res = mysqli_fetch_row($check_bal);
                                                
                                                
						if(mysqli_num_rows($tran_query)==0&&$fees[3]=='Per Year'){
                                                    
                                                    
							$tran=mysqli_fetch_row($tran_query);
						?>
							<ul class="table-view">
								<li style="width:100px;">
									<?php echo $fees[0];?>
								</li>
								<li  style="width:100px;">
									<?php echo $fees[1];?>
								</li>
								<li style="width:100px;">
									<?php echo $fees[3];?>
								</li >
								<li  style="width:100px;">
									<?php echo $fees[2];?>
								</li>
								<li style="width:250px">
                                                                    <?php if(mysqli_fetch_row($check_bal)!=0)
                                                                    {
                                                                      $fec=mysqli_fetch_row($check_bal);
                                                                      echo $fec[0];
                                                                    }
                                                                    else {
                                                                        ?>
                                                                    NA
                                                                    
                                                                  <?php
                                                                  }
                                                                  ?>
									
								</li>
                                                                <li  style="width:250px;">
                                                                    
									<?php echo $res[0];?>
								</li>
							</ul>
					<?php
						}
						if($fees[3]=='Per Month'){
								$j=0;
								$add=array();
								$mon=array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec','Term 1','Term 2');
								$mon_query=mysqli_query($con,"select month from sch_tran  where Gr_num='".$id['Gr_num']."' And fee_type='".$fees[0]."'");
								while($mon_add=mysqli_fetch_array($mon_query)){
									$add[$j]=$mon_add[0];
									$j++;
								}
							//	print_r($add);
								//echo("select month from sch_tran  where Gr_num='".$id['Gr_num']."' And fee_type='".$fees[0]."'");
								?>
								<ul class="table-view">
									<li style="width:100px;">
										<?php echo $fees[0];?>
									</li>
									<li  style="width:100px;">
										<?php echo $fees[1];?>
									</li>
									<li style="width:100px;">
										<?php echo $fees[3];?>
									</li >
									<li  style="width:100px;">
										<?php echo $fees[2];?>
									</li>
									<li  style="display:block;width:250px;">
										<?php 
										foreach(array_diff($mon,$add) as $key){
											echo $key."-";
										}
										?>
									</li>
                                                                        <li  style="width:250px;">
										NA
									</li>
									</ul>
								<?php
						}
					}
				}
				else{
					?>
					No added fee available for this class, ask admin to add fee

				<?php 
				}
			
			?>
			</div>
		</div>
	</div>


                 