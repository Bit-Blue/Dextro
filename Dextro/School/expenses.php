<?php
		include('../attach/header_sch.php');
		
?>

<?php

include('../db.php');

if(isset($_POST['submit']))
{
   $one   = $_POST['to'];
   $two   = $_POST['one'];
   $three = $_POST['other'];
   $four  = $_POST['amount'];
   $five  = trim($_POST['remark']);
   $six   = date('Y-m-d');
   $Pid=$_POST['NewId'];
 mysqli_query($con,"INSERT INTO `expenses`(`unique_id`,`to`, `mode`, `cheque_no`, `amount`, `remark`,`date`) VALUES ($Pid,'$one','$two','$three','$four','$five','$six')");
 header ("Location: expensesForm.php");
}
?>

<?php 

include('../db.php');

$header=mysqli_fetch_row(mysqli_query($con,"SELECT MAX(receipt_no) FROM `expenses`"));

$max = $header[0]+1;


?>
        <div class="span-right" style="width: 704px;">
		<div class="main-container">
			 <div class="post-header" style="width: 700px;">
				<span>Expenses</span>
			 </div>
			 <form class="sch_ads" method="post" action="" style="margin-top: 30px;margin-bottom: 0px;width: 700px;">
                             
                                    <div class="main-container" style="width: 700px;margin-left: 30px;">
                                    <div style="display: flex">
                                    
                                    
                                            <div style="margin-left: 8px;margin-right: 245px;margin-bottom: 14px;margin-top: 0px;FONT-FAMILY: initial; display:flex;font-size: medium;font-weight: 600;">
                                            <p style="margin-left: 0px;margin-right: 4px;margin-bottom: 14px;margin-top: 0px;">Receipt No:</p>
                                            <?php echo $max?>
                                          
                                           
                                           
                                            </div>
                                            <div style="display: flex; FONT-FAMILY: initial;font-size: medium;font-weight: 600;">
                                            <p style="margin-top: 0px;margin-right: 2‒;margin-right: 5px;margin-left: 11px;">Date:</p>
                                            <?php echo date('d-m-Y')?>
                                        
                                            </div>
                                    </div>
                                    <div style="display: flex;height: 36px;">
					<div style="margin-right: 108px;margin-left: 44px; FONT-FAMILY: initial;font-weight: 600;font-size: medium;">
                                            Name:  <input class="no"  type="text" name="to">
					</div>
					<div style="margin-left: 12px;FONT-FAMILY: initial;font-weight: 600;font-size: medium;">
                                             Mode: <select name="one" onchange="if (this.value=='Cheque'){this.form['other'].style.visibility='visible'}else {this.form['other'].style.visibility='hidden'};">
                                                            <option value="">Select</option>
                                                            <option value="Cash">Cash</option>
                                                            <option value="Cheque">Cheque</option>
                           
                                                    </select>
					</div>
                                        <br><br>
                                     </div>
                                     <div style="display: flex;FONT-FAMILY: initial;font-weight: 600;font-size: medium;">
					<div style="margin-left: 7px;">
						 Cheque No: <input type="text" name="other" style="visibility:hidden;"/>
					</div>
					<div style="margin-left: 88px;">
						 AMOUNT: <input type="text" name="amount">
					</div>
                                         <br><br>
                                         
                                     </div>
									 
									 <div class="box-right" style="display:none">
					
					 <input type="text"  value=""  Id="NewId"  name="NewId"/>
					<script type='text/javascript'>
					var cookieId=document.cookie.split(';');
	                var id=cookieId[1].split('=') ;
	                var NewId=id[1];
					document.getElementById("NewId").value=id[1];
					</script>						
					</div>
									 
									 
									 
									 
									 
									 
									 
                                    
					<div style="text-align:left; display: flex;margin-left: 11px;FONT-FAMILY: initial;font-weight: 600;font-size: medium;">
						 
                                                
                                                REMARK: <textarea name="remark" style="width: 136px;margin-left: 4px;">
                                                       </textarea>
                                                
					</div>
															                                       <br><br>
                                        <div style="text-align: center;margin-right: 75px; FONT-FAMILY: initial;">
                                            <button class="" type="submit" name="submit" style="width: 138px;height: 32px;"><span>Generate Expenses</span></button>
                                           
                                            <!-- <button class="no-print print_add_fee"><span>Print</span></button>-->
                                            
                                        </div>
                                    </div>
                         </form>
                </div>
        </div>
     
		<?php
		include('../attach/footer_sch.php');
	
?>