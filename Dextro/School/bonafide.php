<?php
include('../db.php');

    $date =  $_POST['dt'];
    $gr_no= $_POST['grn'];
    $name =  $_POST['nm'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $dob   = $_POST['dob'];
    $place = $_POST['place'];
    $std =   $_POST['std'];
    $rel   = $_POST['religion'];
     $id=$_POST['NewId'];
    $result=mysqli_query($con,"INSERT INTO bonafide (unique_id,sr_no,Gr_no,date,name,FatherName,m_name,DOB,place,std,religion) VALUES ('$id','null','$gr_no','$date','$name','$fname','$mname','$dob','$place','$std','$rel')");


?> 
<?php
		include('../attach/header_sch.php');
		
?>

<?php

include('../db.php');

$header=mysqli_fetch_row(mysqli_query($con,"SELECT * FROM bonafide ORDER BY sr_no DESC LIMIT 1"));

 
 ?>
<style>
.value
{
margin-left:200px;
margin-top:-30.5px;
padding-top: 6px;


}
.title
{
	width:190px;
	
}
</style>
     						
		
            <!--bonafide certificate-->
                
            <div class="span-right book" style=" width: 1000px; margin-left: 50px; height: 700px; margin-top: 10px; padding-top: 7px; padding-bottom: 0px;">
                     <form action="" method="post">
                         <div class="subpage" style="width: 1000px;height: 695.5905532836914px;padding-bottom: 0px;padding-top: 10px;">
                             <div style="display:flex">
                             <div style="height: 61px;width: 73px;">
                                <img src="../img/bit.gif" alt="" style="text-align:left;float:left;width: 100px;height: 90px;margin-top: 0px;"/> 
                             </div>
                             <div style="width: 400px;margin-left:150px">
                             <p style="font-size: 25px; font-weight: 700;font-family: initial;margin-left: 31px;text-align: center;margin-bottom: 0px;">DextroHigh School<br></p>
                              <span style="font-size:15px"><b style="font-size: smaller;font-family: initial;">(Govt Recognised)</b></span>
                             <div><p style="font-size: initial;font-family: initial;margin-top: 5px;margin-bottom: 10px;margin-left: 23px;text-align: center;">Survey No.44,,Ostwal Nagari,Moregaon,Nallasopara(E),Palgar-401 209.</p>
 <p style="text-align: center;margin-top:-10px;margin-left:-70px; font-size:12px">Index No. s-16.13.181  & 16.13.189 & J-16.13.042</p>							 </div>
                             							
                             </div>
                             </div>
                             <div style="background-color: black; color: white;">
                                            <span style="font-size:15px"><b>BONAFIDE CERTIFICATE</b></span> 
                             </div>
                             <div class="row" style="height: 40px;display: flex; color:rgb(52,73,94)">
                             <div class="col-lg-6" style="text-align:left;width: 400px;display:flex;">
                                 <div>
                                 <p style="border-top-width: 0px;margin-top: 16px;margin-right: 5px;font-family: initial;font-size: 17px;font-weight: 800;">Sr.No.:</p>
                                 </div>
                                 <div style=" padding-top: 13px;margin-top:3px">
                                 <b style="font-family: initial;font-weight: 600;margin-top:1px;font-size: smaller;"><?php echo "<p style='font-family: initial;font-size:24px;margin-top:0px;font-weight: 800;'>$header[1]";?> </b>
                                 </div>
                             </div>
                             
                             <div class="col-lg-6" style="text-align:right; display: flex">
                                 
                                     <div>
                                        <p  style="border-top-width: 0px;margin-top: 16px;margin-right: 5px;font-family: initial;font-size: medium;font-weight: 800;margin-left: 50px;">Date</p>
                                     </div>
                                     <div  style=" padding-top: 13px;">
                                        <b style="font-family: initial;font-weight: 600;"><?php echo $header[3];?></b>
                                     </div>
                                  
                             </div>
                        </div>
                        <div style='text-align:left'>
							</br>
							<div class='title'>Gr_no:</div><?php	echo "<div class='value' >$header[2]</div>";?></br>
							<div class='title'>Name:</div><?php	echo "<div class='value' >$header[4]</div>";?></br>
							<div class='title'>Father Name:</div><?php echo "<div class='value' > $header[5]</div>";?></br>
							<div class='title'>Mother Name:</div><?php echo "<div class='value' > $header[6]</div>";?></br>
							<div class='title'>Class: </div><?php echo"<div class='value' > $header[9]</div>";?></br>
							<div class='title'>Date of Birth:</div><?php echo"<div class='value' > $header[7]</div>";?></br>
							<div class='title'>Place of Birth:</div><?php echo "<div class='value' >$header[8]</div>";?></br>
							<div class='title'>Religion and Caste:</div><?php echo"<div class='value' >$header[10]</div>";?></br>
								
							</p>
                        </div>    
                        <div style="display:flex;margin-top: 20px;">
                           
                            <b style="text-align: left;padding-left: 15px;padding-right: 286px;font-family: initial;font-weight: 600;">clerk</b>
                            
                            <b style="text-align: left;padding-left: 15px;font-family: initial;font-weight: 600;">Head Mistress/Head Master<b/>                      
                            
                       </div> 
							<div style='margin-top:-25px;margin-left:200px;'>
                            <button class="no-print print_add_fee" type="submit" style=" margin-top: -5px;margin-right: 38px;" ><span>Print</span></button>  
							</div>
                         
                            
                     </div>
                         
                         
                         
                     </form>
                   
		 
               
            </div>
               
                    </div>
            </div>
            
		
                <?php
		include('../attach/footer_sch.php');
	
?>