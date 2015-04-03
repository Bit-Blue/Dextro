<?php
		include('../attach/header_sch.php');
		
?>

<?php

include('../db.php');

$header=mysqli_fetch_row(mysqli_query($con,"SELECT * FROM expenses ORDER BY receipt_no DESC LIMIT 1"));


?>
<div class="span-right" style="width: 704px;">
		<div class="main-container">
			 <div class="post-header" style="width: 700px;">
				<span>Expenses</span>
			 </div>
			 <form class="sch_ads" method="post" action="" style="margin-top: 30px;margin-bottom: 0px;width: 700px;">
                             <div style="text-align:center">
                                 <b><p style="margin-top: 0px; margin-bottom: 0px;">Acknowledgement</p></b>
                                 <hr>
                             </div>
                                    <div class="main-container" style="width: 700px;margin-left: 30px;height: 245px;">
                               
                                        <div style="display:flex;margin-left: 110px;">
                                        <div style="width: 300px;"> 
                                            <div style="display:flex;margin-left: 0px;FONT-FAMILY: initial;font-weight: 500;font-size: medium;">
                                            <p style="margin-top: 0px;margin-right: 5px;font-weight: 700;font-family: -webkit-pictograph;">Receipt No:</p> <b><?php echo $header[1];?></b>
                                          
                                            </div>
                                         
					<div style="display:flex;margin-left: 0px;FONT-FAMILY: initial;font-weight: 500;font-size: medium;">
                                            <p style="margin-top: 0px;margin-right: 5px;font-weight: 700;font-family: -webkit-pictograph;">Name:</p> <b><?php echo $header[2];?></b>
					</div>
					
                                   
                                
                                   
					<div style="display:flex;margin-left: 0px;FONT-FAMILY: initial;font-weight: 500;font-size: medium;">
						 <p style="margin-top: 0px;margin-right: 5px;font-weight: 700;font-family: -webkit-pictograph;">  Cheque No: </p>  <b> <?php echo $header[4];?> </b>
					</div>
					
                                      
                                         
                                
                                    
					<div style="display:flex;margin-left: 0px;FONT-FAMILY: initial;font-weight: 500;font-size: medium;">						
                                            <p style="margin-top: 0px;margin-right: 5px;font-weight: 700;font-family: -webkit-pictograph;"> REMARK:</p> <b> <?php echo $header[6];?></b>                                          
					</div>
                                        <div>
                                            <p style="margin-top: 35px;margin-right: 0px;font-weight: 700;font-family: -webkit-pictograph;width: 382px;text-align: right;">Sign</p>
                                        </div>
                                        <div style="text-align: center;margin-right: 0px; FONT-FAMILY: initial;width: 140px;margin-left: 135px;margin-top: 20px;">
                                            <button class="no-print print_add_fee" type="submit" name="submit" style="width: 67px;height: 27px;"><span>Print</span></button>
                                           
                                            <!-- <button class="no-print print_add_fee"><span>Print</span></button>-->
                                            
                                        </div>
                                    </div>
                                    <div style="width: 300px;"> 
                                        
                                         <div style="display:flex;margin-left: 0px;FONT-FAMILY: initial;font-weight: 500;font-size: medium;">
                                            <p style="margin-top: 0px;margin-right: 5px;font-weight: 700;font-family: -webkit-pictograph;">Date:</p> <b><?php echo $header[7];?></b>
                                        
                                         </div>
                                        <div style="display:flex;margin-left: 0px;FONT-FAMILY: initial;font-weight: 500;font-size: medium;">
                                             <p style="margin-top: 0px;margin-right: 5px;font-weight: 700;font-family: -webkit-pictograph;">  Mode:  <b><?php echo $header[3];?> </b>
					</div>
                                        <div style="display:flex;margin-left: 0px;FONT-FAMILY: initial;font-weight: 500;font-size: medium;">
						  <p style="margin-top: 0px;margin-right: 5px;font-weight: 700;font-family: -webkit-pictograph;"> AMOUNT:</p>  <b><?php echo $header[5];?> </b>
					</div>
                                    </div>
                                        </div>
                                    </div>
                         </form>
                </div>
        </div>
		<?php
		include('../attach/footer_sch.php');
	
?>