<?php
	include('../../db.php');
        
//        $res2=;
	if($_POST['count']=='1'){
		parse_str($_POST['adm_src'], $grn);
                
                
//		$id=mysqli_fetch_assoc(mysqli_query($con,"SELECT * from user_sch	
//			where Gr_num='".$grn['sch_src_grn']."'
                            $id=mysqli_fetch_assoc(mysqli_query($con,"Select user_sch.Gr_num,user_sch.Name ,user_sch.Medium ,user_sch.Std,
                                user_sch.Section,user_sch.roll_no,sch_details.Gr_num,sch_details.Enroll,sch_details.f_name,sch_details.m_name,sch_details.sex,sch_details.DOB,
                                sch_details.birth_place,sch_details.docs,sch_details.religion,sch_details.caste,sch_details.nationality,
                                sch_details.last_school,sch_details.adhar_num,sch_details.status,sch_details.timestamp,sch_details.cont_num,sch_details.address,sch_details.occupation 
                                FROM user_sch INNER JOIN sch_details ON sch_details.Gr_num=user_sch.Gr_num WHERE user_sch.Gr_num='".$grn['adm_sch_src_grn']."'
		")
		);
		// $query=mysqli_query($con,"SELECT a.* FROM adm_sch_tran as a where Gr_num ='".$grn['adm_sch_src_grn']."' union all Select b.* from sch_tran as b where Gr_num ='".$grn['adm_sch_src_grn']."'");
		
		$query=mysqli_query($con,"SELECT AD.Name, T.Reciept, T.Amount, T.Month, T.fee_type, T.pay_mode, T.cheque_num, T.late_fee, T.reason, T.date FROM adm_sch_tran AS T INNER JOIN admin_sch AS AD ON AD.unique_id=T.unique_id WHERE T.Gr_num ='".$grn['adm_sch_src_grn']."' UNION ALL SELECT AD.Name, T.Reciept,T.Amount,T.Month,T.fee_type,T.pay_mode,T.cheque_num,T.late_fee,T.reason,T. date FROM sch_tran AS T INNER JOIN admin_sch AS AD ON AD.unique_id=T.unique_id WHERE T.Gr_num ='".$grn['adm_sch_src_grn']."'");
			
		
		
		
                $unpaid=mysqli_query($con,"SELECT bal FROM `bal_amt` where Gr_num ='".$grn['adm_sch_src_grn']."'");
                $res = mysqli_fetch_row($unpaid);
                 $quer=mysqli_query($con,"SELECT admin_sch.Name,sch_attendance.grNum, sch_attendance.date FROM sch_attendance  
				 INNER JOIN admin_sch  ON admin_sch.unique_id=sch_attendance.unique_id  WHERE sch_attendance.grNum='".$grn['adm_sch_src_grn']."'");
               $AbsentCount=mysqli_fetch_row(mysqli_query($con,"SELECT COUNT(grNum) FROM sch_attendance WHERE grNum='".$grn['adm_sch_src_grn']."'"));
				 
                
	}
          
	else{
            
            $id=mysqli_fetch_assoc(mysqli_query($con,"Select user_sch.Gr_num,user_sch.Name ,user_sch.Medium ,user_sch.Std,
                                user_sch.Section,user_sch.roll_no,sch_details.Enroll,sch_details.f_name,sch_details.m_name,sch_details.sex,sch_details.DOB,
                                sch_details.birth_place,sch_details.docs,sch_details.religion,sch_details.caste,sch_details.nationality,
                                sch_details.last_school,sch_details.adhar_num,sch_details.status,sch_details.timestamp,sch_details.cont_num,sch_details.address,sch_details.occupation 
                                FROM user_sch INNER JOIN sch_details ON sch_details.Gr_num=user_sch.Gr_num WHERE user_sch.Gr_num='".$_POST['adm_src']."'
		")
		);
			$query=mysqli_query($con,"SELECT AD.Name, T.Reciept, T.Amount, T.Month, T.fee_type, T.pay_mode, T.cheque_num, T.late_fee, T.reason, T.date FROM adm_sch_tran AS T INNER JOIN admin_sch AS AD ON AD.unique_id=T.unique_id WHERE T.Gr_num ='".$_POST['adm_src']."' UNION ALL SELECT AD.Name, T.Reciept,T.Amount,T.Month,T.fee_type,T.pay_mode,T.cheque_num,T.late_fee,T.reason,T. date FROM sch_tran AS T INNER JOIN admin_sch AS AD ON AD.unique_id=T.unique_id WHERE T.Gr_num ='".$_POST['adm_src']."'");
			
			 $unpaid=mysqli_query($con,"SELECT bal FROM `bal_amt` where Gr_num ='".$_POST['adm_src']."'");
                $res = mysqli_fetch_row($unpaid);
			//SELECT a.* FROM adm_sch_tran as a  where Gr_num ='".$_POST['adm_src']."' union all Select b.* from sch_tran as b where Gr_num ='".$_POST['adm_src']."'");
           
           $quer=mysqli_query($con,"SELECT admin_sch.Name,sch_attendance.grNum, sch_attendance.date FROM sch_attendance  
				 INNER JOIN admin_sch  ON admin_sch.unique_id=sch_attendance.unique_id  WHERE sch_attendance.grNum='".$_POST['adm_src']."'");
		   $AbsentCount=mysqli_fetch_row(mysqli_query($con,"SELECT COUNT(grNum) FROM sch_attendance  WHERE grNum='".$_POST['adm_src']."'"));
                     
	}
       
	if(!$id){
		?>
		invalid GR number
		<?php
		exit;
	}
  ?>      

	<div class="main-container">
		<div class="Post-header">
			<span>Personal Details</span>
		</div>
		<div class="post-content">
			<div class="post-text">
				<div class="box-left">
                                        Enroll No: <span class="form-text src_grn"><b><?php echo $id['Gr_num'];?></b></span>
					
                                </div>
				<div class="box-right" >
					Gr No: <span class="form-text src_grn"><b><?php echo $id['Enroll'];?></b></span>
				</div>
                                <div class="box-left" >
                                        Name:<span class="form-text"><b><?php echo $id['Name'];?></b></span>
					
				</div>
                                <div class="box-right" >
					F_name: <span class="form-text src_grn"><b><?php echo $id['f_name'];?></b></span>
				</div>
                                <div class="box-left" >
                                        M_Name:<span class="form-text"><b><?php echo $id['m_name'];?></b></span>
					
				</div>
                                <div class="box-right" >
					sex: <span class="form-text src_grn"><b><?php echo $id['sex'];?></b></span>
				</div>
                                <div class="box-left" >
                                        DOB:<span class="form-text"><b><?php echo $id['DOB'];?></b></span>
					
				</div>
                                <div class="box-right" >
					Birth_place: <span class="form-text src_grn"><b><?php echo $id['birth_place'];?></b></span>
				</div>
				<div class="box-right">
					Medium:<span class="form-text"> <b><?php echo $id['Medium'];?></b></span>
				</div>
				<div class="box-left">
					Standard: <span class="form-text"><b><?php echo $id['Std'];?></b><span>
				</div>
				<div class="box-right" >
					Section: <span class="form-text"><b><?php echo $id['Section'];?></b></span>
				</div>
                                <div class="box-left">
					Contact_No: <span class="form-text"><b><?php echo $id['cont_num'];?></b></span>
				</div>
                               <div class="box-right" >
					Address: <span class="form-text"><b><?php echo $id['address'];?></b></span>
				</div>
                                <div class="box-left">
					Occupation: <span class="form-text"><b><?php echo $id['occupation'];?></b></span>
				</div>
<!--                                <div class="box-right" >
					Off_Address: <span class="form-text"><b><?php echo $id['offaddress'];?></b></span>
				</div>-->
                                <div class="box-left">
					Docs: <span class="form-text"><b><?php echo $id['docs'];?></b></span>
				</div>
                                <div class="box-right" >
					Caste: <span class="form-text"><b><?php echo $id['caste'];?></b></span>
				</div>
                                <div class="box-left">
					religion: <span class="form-text"><b><?php echo $id['religion'];?></b></span>
				</div>
                                <div class="box-right" >
					Nationality: <span class="form-text"><b><?php echo $id['nationality'];?></b></span>
				</div>
                                <div class="box-left">
					Last_school: <span class="form-text"><b><?php echo $id['last_school'];?></b></span>
				</div>
                                 <div class="box-right" >
                                        Adhar_num: <span class="form-text"><b><?php echo $id['adhar_num'];?></b></span>
				</div>
                                <div class="box-left">
					Status: <span class="form-text"><b><?php echo $id['status'];?></b></span>
				</div>

			</div>
		</div>
	</div>
	<div class="main-container">
	<div class="Post-header">
			<span>Fee history</span>
		</div>
		<div class="post-content">
			<div class="post-text" style="width: 1060px;">
<?php
	$i=0;
	if(mysqli_num_rows($query)!=0){
?>
	
                  <ul class="table-view" style="width: 1000px;">
                    <li class="table-view-header" style="width:60px;">
						User
					</li>
					<li class="table-view-header" style="width:50px;">
						Receipt
					</li>
					<li class="table-view-header" style="width:100px;">
						Amount
					</li>
					<li class="table-view-header" style="width:100px;">
						Month
					</li >
					<li class="table-view-header" style="width:100px;">
						Fee type
					</li>
					<li class="table-view-header" style="width:100px;">
						Pay mode
					</li>
					<li class="table-view-header" style="width:100px;">
						Cheque No
					</li>
				<!--	<li class="table-view-header" style="width:100px;">
						Paid on time 
					</li>-->
					<li class="table-view-header" style="width:100px;">
						Late fee 
					</li>
                                        <li class="table-view-header" style="width:100px;">
						Reason
					</li>
					<li class="table-view-header" style="width:100px;">
						Date
					</li>
					<!--<li class="table-view-header" style="width:50px;">
						Delete
					</li>-->	
				</ul>
				<?php
						while($result=mysqli_fetch_row($query)){
						$i++; 
				?>
				<ul class="table-view <?php echo 'delete-fee-'.$i?>" style="width: 1000px;">
                    <li class="<?php echo 'rec-delete-fee-'.$i?>"style="width:60px">
						<?php echo $result[0]; ?>
					</li>
					<li class="<?php echo 'rec-delete-fee-'.$i?>"style="width:50px">
						<?php echo $result[1]; ?>
					</li>
					<li  style="width:100px;">
						<?php echo $result[2]; ?>
					</li>
					<li style="width:100px;" class="<?php echo 'mon-delete-fee-'.$i?>">
						<?php echo $result[3]; ?>
					</li>
					<li class="<?php echo 'feet-delete-fee-'.$i?>"style="width:100px;">
						<?php echo $result[4]; ?>
					</li>
					<li style="width:100px;">
						<?php echo $result[5]; ?>
					</li>
					<li style="width:100px;">
						<?php echo $result[6]; ?>
					</li>
				<!--	<li style="width:80px;">
						
					</li>-->
					<li style="width:100px;">
						<?php echo $result[7]; ?>
					</li>
                                        <li style="width:100px;">
						<?php echo $result[8]; ?>
					</li>
					<li style="width:100px;">
						<?php echo $result[9]; ?>
					</li>
					<!--<li style="width:50px;" class="delete-fee" id="<?php echo 'delete-fee-'.$i?>">
						<span style="display:block;cursor:pointer;"><b>X</b></span>
					</li>-->
				</ul>
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
                
                
                <div class="main-container">
		<div class="Post-header">
			<span>Attendance</span>
			<span style="float:right;margin-right:20%"> Absent Count: <?php echo $AbsentCount[0];?><span>
		</div>
		<div class="post-content">
                    <div class="post-text" style="width: auto;">
                        			<div class="post-text" style="width: 1060px;">
<?php
	$i=0;
	if(mysqli_num_rows($quer)!=0){
?>
        

				<ul class="table-view">
					<li class="table-view-header" style="width:100px;">
						User
					</li>
					<li class="table-view-header" style="width:100px;">
						Enroll_No
					</li>
					<li class="table-view-header" style="width:100px;">
						Absent_Date
					</li >
<!--					<li class="table-view-header" style="width:100px;">
						IsActive
					</li>
					<li class="table-view-header" style="width:250px;">
						PresentDays
					</li>
                                        <li class="table-view-header" style="width:250px;">
						AbsentDays
					</li>-->
                      </ul></br>
<?php
						while( $que = mysqli_fetch_row($quer))
                                                {
                                                
						$i++; 
                                                
				?>
							<ul class="table-view"></br>
								<li style="width:100px;">
									<?php echo $que[0];?>
								</li>
								<li  style="width:100px;">
									<?php echo $que[1];?>
                                </li>
								<li style="width:100px;">
									<?php echo $que[2];?>
								</li>
                                                       
							</ul></br>

                       <?php
				}

	}
	else{
	?>
	No Absent history for this student.
	<?php
	}
?>
			</div>
                    
		</div>
	</div>
                
                </br></br>
	        
                
                
                
	
                
        </div>
		</div>
	</div>
                <div class="main-container">
		<div class="Post-header">
			<span>Unpaid fees</span>
		</div>
		<div class="post-content" style="width:auto">
			<div class="post-text" style="width:auto">
				<ul class="table-view">
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
						$tran_query=mysqli_query($con,"select * from sch_tran where Gr_num='".$id['Gr_num']."' And fee_type='".$fees[0]."'");
						// if(mysqli_num_rows($tran_query)==0 && $fees[3]=='Per Year'){
						if(mysqli_num_rows($tran_query)==0 && $fees[0] =='Admission Fee'){
						// if($fees[0]='Admission Fee')
						// {
							$tran=mysqli_fetch_row($tran_query);
						?>
				<ul class="table-view">
								<li class="table-view-header" style="width:100px;">
									<?php echo $fees[0];?>
								</li>
								<li class="table-view-header" style="width:100px;">
									<?php echo $fees[1];?>
								</li>
								<li class="table-view-header" style="width:100px;">
									<?php echo $fees[3];?>
								</li >
								<li class="table-view-header" style="width:100px;">
									<?php echo $fees[2];?>
								</li>
								<li class="table-view-header" style="width:250px">
									NA
								</li>
                                                                <li class="table-view-header" style="width:250px">
									<?php echo $res[0]; ?>
								</li>   
                                                                
                                </ul>
					<?php
						}
						if($fees[3]=='Per Month'){
								$j=0;
								$mon=array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
								$mon_query=mysqli_query($con,"select month from sch_tran  where Gr_num='".$id['Gr_num']."' And fee_type='".$fees[0]."'");
								$add=array();
								while($mon_add=mysqli_fetch_array($mon_query)){
									$add[$j]=$mon_add[0];
									$j++;
								}
							//	print_r($add);
								//echo("select month from sch_tran  where Gr_num='".$id['Gr_num']."' And fee_type='".$fees[0]."'");
								?>
                                                    <ul class="table-view">
									<li class="table-view-header" style="width:100px;">
										<?php echo $fees[0];?>
									</li>
									<li class="table-view-header" style="width:100px;">
										<?php echo $fees[1];?>
									</li>
									<li class="table-view-header" style="width:100px;">
										<?php echo $fees[3];?>
									</li >
									<li class="table-view-header" style="width:100px;">
										<?php echo $fees[2];?>
									</li>
									<li class="table-view-header" style="display:block;width:250px;">
										<?php 
										foreach(array_diff($mon,$add) as $key){
											echo $key;
										}
										?>
									</li>
                                                                        <li class="table-view-header" style="width:250px;">
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
	<?php 
	
	exit;
	?>