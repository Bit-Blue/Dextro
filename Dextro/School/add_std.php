<?php
	include('../attach/header_sch.php');
?>


<?php 

$header=mysqli_fetch_row(mysqli_query($con,"SELECT * FROM sch_details ORDER BY Gr_num DESC LIMIT 1"));
$max = $header[1]+1;

?>
<div class="span-right">
	<div class="main-container">
		 <div class="post-header">
			<span> Add Student</span>
		 </div>
		 <div class="post-content">
			<div class="post-text">
				<form class="sch_ads" method="post" action="">
					<div class="box-left">
					     Gr.No : <input  type="text" class="mando" name="sch_ads_enr">
					</div>
					<div class="box-right">
						Enroll No : <?php echo $max;?> <!--<input  type="text" class="mando" name="sch_ads_grn">-->
					</div>
					<div class="box-left">
						 Student Name: <input  type="text" class="mando" name="sch_ads_name">
					</div>
					<div class="box-right">
						 Father Name: <input  type="text" class="mando" name="sch_ads_fname">
					</div>
					<div class="box-left" >
						 Mother Name: <input type="text" class="mando" name="sch_ads_mname">
					</div>
					<div class="box-right">
						 Gender: <select name="sch_ads_sex" class="mando">
							 <option value="default">Select One</option>
							 <option value="male">Male</option>
							 <option value="female">Female</option>
						</select>
					</div>
					<div class="box-left">
						 Medium:<select name="sch_ads_mdm" class="mando">
							 <option value="default">Select One</option>
							  <option value="English">English</option>
							 <option value="Hindi">Hindi</option>
							 <option value="Marathi">Marathi</option>
						</select>
					</div>
					<div class="box-right">
					     Standard::<select name="sch_ads_std" class="mando" onchange="div_count()">
							<option value="default">Select One</option>
						<!--	 <option value="Mr.dextro">Mr.dextro</option> -->
							 <option value="nursery">Nursery</option>
                                                         <option value="junior.kg">junior kg</option>
                                                         <option value="senior.kg">senior kg</option>
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
						</select>
					</div>
					<div class="box-left div-update-show">
						 Division:	 
					</div>
					<div class="box-right">
					     Date of Birth: <input  class="mando" type="date" name="sch_ads_dob">
					</div>
					<div class="box-left" >
						 Birth Place: <input  type="text" name="sch_ads_bplc">
					</div>
					<div class="box-right">
					     Contact No.: <input  type="text" class="mando inputpn" name="sch_ads_cont_num">
					</div>
					<div class="box-left">
                                            Address: <textarea style="margin-left: 50px;margin-left: 82px;" class="mando" name="sch_ads_adrs"> </textarea>
					</div>
                                    
                                    <div class="box-right">
                                            Office Address: <textarea  style="margin-left: 50px;margin-left: 44px;" class="mando" name="sch_ads_offads"> </textarea>
					</div>
                                    
                                    <div class="box-left">
                                            Occupation: <input style="margin-left: 50;margin-left: 82px;" class="mando" name="sch_ads_occ"/>			</div>
                                    
                                       
                                    <div class="box-right" style="display:flex" >
					     Documents: <input type="checkbox" name="d1" value="lc" style=" margin-top: 10px; margin-left: 90px;" >L.C
                                                        <input type="checkbox" name="d2" value="bc" style=" margin-top: 10px;">B.C
                                                        <input type="checkbox" name="d3" value="affidavite" style=" margin-top: 10px;">Aff
                                                        <input type="checkbox" name="d4" value="all" style=" margin-top: 10px;">All
					</div>
                                    <div class="box-left">
						 Religion: <input  type="text" name="sch_ads_relg">
                                    </div>
                                    
					<div class="box-right">
					     Caste: <select name="sch_ads_cast">
                                                                <option value="default">Select One</option>
                                                                <option value="sc">SC</option>
                                                                <option value="st">ST</option>
                                                                <option value="open">open</option>
                                                                <option value="other">other</option>
                                                    </select>
					</div>
					
					<div class="box-left">
					     Nationality: <input  type="text" name="sch_ads_ntn">
					</div>
					<div class="box-right">
						 Last School: <input  type="text" name="sch_ads_lsch">
					</div>
					
					<div class="box-left">
						 Adhar Card No.: <input  type="text" name="sch_ads_adhar">
					</div>
					<div class="box-right">
					    Tax-Status:<select name="sch_ads_tax_status">
							 <option value="default">Select One</option>
							 <option value="paying">Paying</option>
							 <option value="non-paying">Non-paying</option>
						</select>
					</div>
					<div class="box-left">
					     Roll_No.: <input  type="text" class="mando" name="roll_no">
					</div>
                                    
                                        <div class="box-right">
                                            Process:
                                            <select id="efor" name="sch_ads_type">
                                            <option value='default'>-select-</option>
                                            <option value='admission'>Admission</option>
                                            <option value='enquiry'>Enquiry</option>
                                            </select>
					</div>
                                    
					<div class="box-left">
                                            <button class="sch_ads_sub"><span>Submit</span></button>
					</div>
                                   
				</form>
			</div>
		 </div>
            
	</div>
</div>
	<?php
	include('../attach/footer_sch.php');
?>
