
<?php
include'../attach/header_sch.php';
include('../db.php');


$header=mysqli_fetch_row(mysqli_query($con,"SELECT * FROM sch_details ORDER BY Gr_num DESC LIMIT 1"));

$header1=mysqli_fetch_row(mysqli_query($con,"SELECT * FROM user_sch ORDER BY Gr_num DESC LIMIT 1"));





//$oh=$_GET['env'];
?>


<div class=" span-right book" style="height: 1485px; width:1000px;">
    <div class="subpage" style="padding-top: 20px;height: 1477.7952766418457px; width:1000px;">
        <div style="display:flex">
        <div style="width: 300px;">
            <img src="../img/bit.gif" alt="" style="width: 100px;height: 100px;margin-right: 50px;"/>
        </div>
         <div style="width: 600px;margin-left: 89px;">
                        <p style="text-align: center;margin-left:-50px; font-size: 14px;font-weight:bold; margin-top:15px;height: 20px;"> Educational Charitable Trust(Mumbai)</p>
			<p style="text-align: center ; margin-left:-70px; font-weight:bold; margin-top:-20px;font-size:20px">Dextro High School</p>
			<p style="text-align: center; font-weight:bold;margin-left:-70px; margin-top:-22px; font-size:14px">PRIMARY/SECONDARY</p>
			<p style="text-align: center; font-weight:bold;margin-left:-70px; margin-top:-17px; font-size:12px">Survey No.44,,Ostwal Nagari,Moregaon,Nallasopara(E),Palgar-401 209.
                        <p style="text-align: center;margin-top:-10px;margin-left:-70px; font-size:12px">Index No. s-16.13.181  & 16.13.189 & J-16.13.042</p>
        </div>
        <div style="width: 300px;">
           <div style="border:2px solid black;margin-top: 0px; float:right; width:130px; height:120px;margin-right: 30px;">
           </div>
        </div>
        </div>
        
        <div>
            <span style="text-align: center;font-family: initial;font-weight: 700;margin-right: 90px;">APPLICATION FOR ADMISSION</span>
            <hr>
            <p style="text-align: left;font-size: smaller;margin-left: 5px;font-family: initial;margin-bottom: 0px;margin-top: 0px;font-weight: 700;">Sr.NO <?php echo $header[1];?></p>
        </div>
        
         <div style="display: flex;font-family: initial;">
            <p style="margin-left: 180px;margin-right: 30px;">Academic Year :- <b><?php echo date("Y"); ?></b></p>            
            <p style="margin-right: 30px;"> Medium :- <b><?php echo $header1[4]; ?></b></p>
            <p style="margin-right: 30px;">Std :- <b><?php echo $header1[5]; ?></b></p> 
        </div>
        
        
        <div>
            <p>Sir/Madam<p>
            <p>Be kind enough to admit my son/daughter/ward to Std <b><?php echo $header1[5];?> </b>in your school I shall abide by all rules and regulations prescribed and to be 
            prescribed and to be prescrived by the school authorities.</p>
        </div>
        <div style="width: 965px;">
            <ol style="font-size: initial;">
                <li style="margin-bottom: 5px;text-align: left;">Student's Full Name- <b><?php echo $header[3];?></b></li></br>
                <li style="margin-bottom: 5px;text-align: left;">Father's Name - <b><?php echo $header[4];?></b></li></br>
                <li style="margin-bottom: 5px;text-align: left;">Mother's Name - <b><?php echo $header[5];?></b></li></br>
                <li style="margin-bottom: 5px;text-align: left;">Religion - <b> <?php echo $header[14];?> </b></li></br>
			     <li style="margin-bottom: 5px;text-align: left;">Caste - <b><?php echo $header[15];?></b></li></br>
				 <li style="margin-bottom: 5px;text-align: left;">Nationality - <b><?php echo $header[16];?></b></li></br>
                <li style="margin-bottom: 5px;text-align: left;">Date of birth - <b><?php echo $header[7];?></b></li></br>
                <li style="margin-bottom: 5px;text-align: left;">Place of Birth - <b><?php echo $header[8];?></b></li></br>
                <li style="margin-bottom: 5px;text-align: left;">Last School attend - <b><?php echo $header[17];?></b></li></br>
                <li style="margin-bottom: 5px;text-align: left;">Father's Address - <b><?php echo $header[10];?></b></li></br>
                <li style="margin-bottom: 5px;text-align: left;">Occupation - <b><?php echo $header[12];?></b></li></br>
                <li style="margin-bottom: 5px;text-align: left;">Office Address - <b><?php echo $header[11];?></b></li></br>
                <li style="margin-bottom: 5px;text-align: left;">Telephone No. - <b><?php echo $header[9];?></b></li></br>
                <li style="margin-bottom: 5px;text-align: left;">Document Submitted - <b><?php echo $header[13];?></b></li></br>
                <li style="margin-bottom: 5px;text-align: left;">Standard in which admission is sought</li></br>
            </ol>
        </div>
        
        <p>I declare that the information furnished above is true to my knowledge.</p>
        
            <div style="height: 270px;">
            <p>N.B</p>
                 <ol style="font-size: initial;">
                    <li style="text-align:left">If Coming from a state other that Maharashtra, Please ensure that the Leaveing Certificate is counter signed by competent Educational Officer at that state.</li><br>
                    <li style="text-align:left">If the student attended a school before seeking admission in this school,please procedure Leaving Certificate</li>
                 </ol>
            
                <p style="margin-top: 60.667;padding-left: 100px;padding-top: 20px;">Parent's/Guardian's Signature</p>
                <p style="text-align: right;margin-right: 90px;">Head Master</p>
                <p style="text-align: right;margin-right: 17px;padding-right: 50px;">Dextro High School</p>
                
            </div>
                                    
               <button type="submit" class="no-print print_add_fee" name="generate"><span>Print</span></button>         
   
        </div>
</div>
<?php 
include'../attach/footer_sch.php';?>