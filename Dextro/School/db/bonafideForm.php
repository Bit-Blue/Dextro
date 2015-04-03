<?php
include('../../db.php');

parse_str($_POST['fee_show'], $grn);
$id=mysqli_fetch_assoc(mysqli_query($con,"SELECT * from sch_details where Gr_num='".$grn['bonafide_grn']."'"));

$id1=mysqli_fetch_assoc(mysqli_query($con,"SELECT * from user_sch where Gr_num='".$grn['bonafide_grn']."'"));


if(!$id){
	?>
	<p>No Matches Found of this GR/SR number</p>
	<?php
	exit;
}
             
?>

<div class="span-right">
		<div class="main-container">
			 <div class="post-header">
				<span> Bonafide</span>
			 </div>
			 <div class="post-content">
				<div class="post-text">
                                    <form  class="sch_bona" method="post" action="bonafide.php">
                                        
                                       
                                        
				<!--<div class="box-left">
					   <br>
					</div>-->
					<div class="box-left">
                                             GR No:  <input  type="text" value="<?php echo $id['Enroll'];?>"  name="grn"/>
					</div>
					<div class="box-right">
						Date : <input  type="date"  name="dt" style="width: 137px;"/>
					</div>
					 
                                        
                                        <div class="box-left">
                                            Student Name:  <input  type="text" value="<?php echo $id['name'];?>"  name="nm"/>
					</div>
					<div class="box-right">
                                            Fathers Name:<input type="text" value="<?php echo $id['f_name'];?>" name="fname"/>
					</div>
					<div class="box-right">
                                            MOTHERS Name:<input type='text' value="<?php echo $id['m_name'];?>" name="mname"/>
					</div>
					<div class="box-left" >
                                            Std:<input type="text" value="<?php echo $id1['Std'];?>" name="std"/> 
					</div>
					<div class="box-right">
                                            Dob:<input type='date' value="<?php echo $id['DOB'];?>" name='dob'/>
					</div>
					
					<div class="box-left">
                                            Place of Birth:</b><input type="text" value="<?php echo $id['birth_place'];?>" name="place"/>
					</div>
					<div class="box-right">
                                            Religion:<input type="text" value="<?php echo $id['religion'];?>" name="religion"/>
					</div>
					<!-- Getting User Id -->
					<div class="box-right" style="display:none">
					<script type='text/javascript'>
					var cookieId=document.cookie.split(';');
	                var id=cookieId[1].split('=') ;
	                var NewId=id[1];
					document.getElementById("NewId").value=id[1];
					</script>
					                                            <input type="text"  value=""  Id="NewId"  name="NewId"/>
											
					</div>
					
					<div class="box-right" style="width: 376px;margin-top: 60px;">
                                          
                                           <button><span>Add</span></button>
					</div>
				</form>
				</div>
			 </div>
		</div>
                
</div>
            
		
                <?php
		include('../../attach/footer_sch.php');
	
?>