<?php
include('../../db.php');
parse_str($_POST['add_std'], $std);
$id=$_POST['NewId'];
//print_r($std);


if($std['sch_ads_type']=="admission")
{
$count=mysqli_query($con,"SELECT * from sch_class where medium='".$std['sch_ads_mdm']."' AND std='".$std['sch_ads_std']."'");
$grn=mysqli_query($con,"select Gr_num from user_sch where Gr_num='".$std['sch_ads_grn']."' OR Enroll ='".$std['sch_ads_enr']."'");
if(mysqli_num_rows($grn)==0){
	if(mysqli_num_rows($count)!=0){
		$result=mysqli_query($con,"Insert into sch_details (`unique_id`,`Enroll`, `name`, `f_name`, `m_name`, `sex`, `DOB`, `birth_place`, `cont_num`, `address`, `off address`, `occupation`, `docs`, `religion`, `caste`, `nationality`, `last_school`, `adhar_num`, `status`, `timestamp`) VALUES (
		    $id, 
		    '".trim($std['sch_ads_enr'])."',             
			'".trim($std['sch_ads_name'])."',
			'".trim($std['sch_ads_fname'])."',
			'".trim($std['sch_ads_mname'])."',
			'".trim($std['sch_ads_sex'])."',
			'".trim($std['sch_ads_dob'])."',
			'".trim($std['sch_ads_bplc'])."',
			'".trim($std['sch_ads_cont_num'])."',
			'".trim($std['sch_ads_adrs'])."', 
                        '".trim($std['sch_ads_offads'])."', 
                        '".trim($std['sch_ads_occ'])."',                            
			'".trim($std['d1']).trim($std['d2']).trim($std['d3']).trim($std['d4'])."',                        
                        '".trim($std['sch_ads_relg'])."',
                        '".trim($std['sch_ads_cast'])."', 
                        '".trim($std['sch_ads_ntn'])."',
			'".trim($std['sch_ads_lsch'])."',
                        '".trim($std['sch_ads_adhar'])."',
			'".trim($std['sch_ads_tax_status'])."',
			'".date("Y-m-d")."'
			)"
		);	
			//echo ($std['sch_ads_div']);
		$result1=mysqli_query($con,"Insert into user_sch
			(`Enroll`, `Name`, `Medium`, `Std`, `Section`, `roll_no`, `timestamp`)values('".trim($std['sch_ads_enr'])."',
			'".trim($std['sch_ads_name'])."',
			'".trim($std['sch_ads_mdm'])."',
			'".trim($std['sch_ads_std'])."',
			'".trim($std['sch_ads_div'])."',
			
			'".trim($std['roll_no'])."',
			'".date("Y-m-d")."'
			)"
		);	
		$arry['status1']="Details Added";                      
			echo json_encode($arry);
			exit;	
	}
        
	else{
		$arry['status1']="No class of this description available";
		echo json_encode($arry);
		exit;
	}
}
else{
	$arry['status1']="GRN";
		echo json_encode($arry);
		exit;
}
}
else
{
    
$count=mysqli_query($con,"SELECT * from sch_class where medium='".$std['sch_ads_mdm']."' AND std='".$std['sch_ads_std']."'");
$grn=mysqli_query($con,"select Gr_num from user_sch where Gr_num='".$std['sch_ads_grn']."' OR Enroll ='".$std['sch_ads_enr']."'");
if(mysqli_num_rows($grn)==0){
	if(mysqli_num_rows($count)!=0){
		$result=mysqli_query($con,"Insert into enquiry 
			values(1,'".trim(null)."','".trim($std['sch_ads_name'])."',
			'".trim($std['sch_ads_fname'])."',
			'".trim($std['sch_ads_mname'])."',
                        '".trim($std['sch_ads_std'])."',
                        '".trim($std['sch_ads_mdm'])."',			
			'".trim($std['sch_ads_sex'])."',
			'".trim($std['sch_ads_dob'])."',
			'".trim($std['sch_ads_bplc'])."',
			'".trim($std['sch_ads_cont_num'])."',
			'".trim($std['sch_ads_adrs'])."', 
                        '".trim($std['sch_ads_offads'])."', 
                        '".trim($std['sch_ads_occ'])."',                            
			'".trim($std['d1']).trim($std['d2']).trim($std['d3']).trim($std['d4'])."',                        
                        '".trim($std['sch_ads_relg'])."',
                        '".trim($std['sch_ads_cast'])."', 
                        '".trim($std['sch_ads_ntn'])."',
			'".trim($std['sch_ads_lsch'])."',
                        '".trim($std['sch_ads_adhar'])."',
			'".trim($std['sch_ads_tax_status'])."',
			'".date("Y-m-d")."'
			)"
		);
                
			$arr['status']="Details Added";
			echo json_encode($arr);
                        
			exit;
	}
	else{
		$arr['status']="No class of this description available";
		echo json_encode($arr);
		exit;
	}
}
else{
	$arr['status']="GRN";
		echo json_encode($arr);
		exit;
}
}
?> 