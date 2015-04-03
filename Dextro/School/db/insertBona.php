<?php
include('../../db.php');
parse_str($_POST['add_bona'], $std);

//print_r($std);

		$result=mysqli_query($con,"INSERT INTO bonafide (sr_no,date,name,FatherName,m_name,DOB,place,std,religion) VALUES "
                        . "('".trim(NULL)."','".trim($std['dt'])."',
                        
			'".trim($std['nm'])."',
			'".trim($std['fname'])."',
			'".trim($std['mname'])."',
			'".trim($std['dob'])."',
			'".trim($std['place'])."',
			'".trim($std['std'])."',
			'".trim($std['religion'])."'
			)"
		);	
			
			$arr['status']="Bonafide Added";
                        
			echo json_encode($arr);
                       
			exit;
?>
	