<?php
include('../../db.php');
$id = $_POST['NewId'];
parse_str($_POST['fee_chng'][0], $fee);
//print_r($fee);
$obj = json_decode($_POST['fee_chng']);
$arrReturn = array();
// print_r(json_decode($_POST['fee_chng']));
$lflag = 'no';
$add_fee_query = "";
$reciept_Number = "";
$ArrayData_s = array();
$is_update = false;
$is_duplicate = true;
$insert = 0 ;

foreach ($obj as $k => $stdClass) {
	$ArrayData = array();
	$arr = array();
	$j = 0 ;
	
	foreach ($stdClass as $key => $val) {
			// print_r("val :" .$val);
			// print_r("key :" .$key);
			$ArrayData[$key] = $val;
		
	 	
		$reciept_Number = $ArrayData[0] ;
		$ArrayData_s[$k] = $ArrayData ;
		// print_r($k."Ke and data".$ArrayData_s);
		
	}
	if($ArrayData[7] > 0 )
		$lflag = 'yes';
	else
		$flag = 'no';

	// print_r($ArrayData);
        
        if($ArrayData[4]=="Admission Fee")
        {
            $chkcount = mysqli_fetch_row(mysqli_query($con,"SELECT count(Gr_num) from `bal_amt` WHERE Gr_num ='".$ArrayData[1]."'"));
           
            
            $add_fee_query[$insert] = " INSERT INTO `adm_sch_tran`(`unique_id`, `Reciept`, `Gr_num`, `Amount`, `balance`, `Month`, `year`, `fee_type`, `pay_mode`, `cheque_num`, `lflag`, `late_fee`, `reason`, `date`)
			values 
			 ($id,
				'".$ArrayData[0]."' , 
			 	'".$ArrayData[1]."',
			 	'".$ArrayData[2]."',
			 	'".$ArrayData[3]."',
                                '".$ArrayData[4]."',
			 	'".date("Y")."',
			 	'".$ArrayData[5]."',
			 	'".$ArrayData[6]."',
			 	'".$ArrayData[7]."',
			 	'".$lflag."',
			 	'".$ArrayData[8]."', 
                                '".$ArrayData[9]."', 
			 	'".date("Y-m-d")."'
			 	 ) ;" ;
		$insert = $insert + 1 ;
                
            if($chkcount[0]==0)
            {
                $bal =mysqli_query($con,"INSERT INTO `bal_amt`(`Gr_num`, `amt`, `bal`) VALUES ('".$ArrayData[1]."','".$ArrayData[2]."','".$ArrayData[3]."')");
                
                
            }
            else
            {
                $updt =mysqli_query($con,"UPDATE `bal_amt` SET `amt`='".$ArrayData[2]."',`bal`='".$ArrayData[3]."' where Gr_num='".$ArrayData[1]."'");
            }
               
        }
        else
        {
            $add_fee_query[$insert] = " INSERT INTO sch_tran 
			 (`unique_id`,`Reciept`,`Gr_num`,`Amount`,`Month`,`year`,`fee_type`,`pay_mode`,`cheque_num`,`lflag`,`late_fee`,`reason`,`date`) values 
			 ($id,
			 '".$ArrayData[0]."' , 
			 	'".$ArrayData[1]."',
			 	'".$ArrayData[2]."',
                                '".$ArrayData[4]."',
			 	'".date("Y")."',
			 	'".$ArrayData[5]."',
			 	'".$ArrayData[6]."',
			 	'".$ArrayData[7]."',
			 	'".$lflag."',
			 	'".$ArrayData[8]."', 
                                '".$ArrayData[9]."', 
			 	'".date("Y-m-d")."'
			 	 ) ;" ;
               
                
		$insert = $insert + 1 ;
        }
                
	
	$i=0;
	$late_fee=0;
	//print_r($fee['fee_chng_form_month'][$i]);
	$check=mysqli_num_rows(mysqli_query($con,
		"select * from sch_tran where Gr_num='".$ArrayData[1]."' AND 
			Fee_type='".$ArrayData[4]."' AND Month='".$ArrayData[3]."'"));
	if($check==0){
		// $result=mysqli_query($con,$add_fee_query);
		$is_duplicate = false;
		$i++;
	}
	else{
		$arr['status']='failed';
		echo json_encode($arr);
		exit;
	}
}
	// print_r($add_fee_query);
	// $add_fee_query .= " select  1 as status ; " ; 
	
	foreach ($add_fee_query as $key => $value) {
		$result=mysqli_query($con,$value); //finally insert
		// print_r($value);
		// print_r($result);
		
	}
	
	// Update recipt number
	//  print_r($reciept_Number);
	if(!$is_update)
		{
			$result=mysqli_query($con,"update sch_Reciept set Reciept = '".$reciept_Number."' where id=1 ");
			$is_update = true; 
		}
	
	foreach ($ArrayData_s as $key => $value) {
	
		// print_r("value : ".$value);
		$details=mysqli_fetch_row(mysqli_query($con,"select Name,Medium,Std from user_sch where Gr_num='".$value[1]."'"));
		$arrReturn['det']=$details;
		$arr['rec']=trim($value[0]);
		$arr['month']=$value[4];
		$arr['chq']=$value[8];
		$arr['Gr']=$value[1];
		$arr['lfee']=$value[7];
		$arr['pay_mode']=$value[6];
		$arr['amount']=$value[2];   
		$arr['typ']=$value[5];
                $arr['bal']=$value[3];
		if($value[7] > 0 )
			$arr['ot']='yes';
		else
			$arr['ot']='no';
		$arrReturn['fees'][$j] = $arr ;
		$j = $j + 1 ; 
	}	// print_r($arrReturn);

$arrReturn['status'] = 'succeed';
echo json_encode($arrReturn);
exit;
// exit;
?>