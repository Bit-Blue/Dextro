<?php
include('../../db.php');
	if($con){
		//echo("otehrde");
	}
//$arr=array();
parse_str($_POST['adm_set'], $set);


/*
if($set['adm_set_fee_type']=='bus'){
    
    $id=mysqli_fetch_assoc(mysqli_query($con,"SELECT * from sch_class	
	where Medium='".$set['adm_set_mdm']."'
	")
);
    
}
else
{
    $id=mysqli_fetch_assoc(mysqli_query($con,"SELECT * from sch_class	
	where Medium='".$set['adm_set_mdm']."' AND
		Std='".$set['adm_set_std']."'
	")
);
    
}

if($id==null)
    {
	?>
	0
	<?php
	exit;
    }
*/
    
       if($set['adm_set_std']=='all')
       {
                
                $arrr = mysqli_query($con,"SELECT Std from sch_class") or die(mysql_error());
                
                $num_rows = mysqli_num_rows($arrr);
                
                while($row=  mysqli_fetch_array($arrr))
                {
                
                        for ($x = 0; $x <$num_rows; $x++) 
                        {                    
                            $result= mysqli_query($con,"INSERT INTO sch_cls_fee
                                values(
								'".$_POST['NewId']."',
								'".trim($set['adm_set_mdm'])."',
									
                                '".trim($row[0])."',
                                '".trim($set['adm_set_fee_type'])."',
                                '".trim($set['adm_set_fee'])."',
                                '".trim($set['adm_set_lfee'])."',
                                '".trim($set['adm_set_one'])."'
				)
                            ");
                  
                        }
                }
                
                
                    
                
                
                
                /*              
                while($row = mysqli_fetch_assoc($result)) 
                {
                   
                    $result= mysqli_query($con,"INSERT INTO sch_cls_fee
                                values(
				'".trim($set['adm_set_mdm'])."',
                                '".trim($row["Std"])."',
                                '".trim($set['adm_set_fee_type'])."',
                                '".trim($set['adm_set_fee'])."',
                                '".trim($set['adm_set_lfee'])."',
                                '".trim($set['adm_set_one'])."',
                                '".trim($set['location'])."'
				)
			");
                }                 
                 */
        
        }

    else{
$result=mysqli_query($con,"INSERT INTO sch_cls_fee
	 values(
		1,
		'".trim($set['adm_set_mdm'])."',
		'".trim($set['adm_set_std'])."',
		'".trim($set['adm_set_fee_type'])."',
		'".trim($set['adm_set_fee'])."',
		'".trim($set['adm_set_lfee'])."',
		'".trim($set['adm_set_one'])."'
                    
	);"
	);
    }
    
        ?>
        
                <?php
                
                
                   
                $header = mysqli_query($con,"SELECT * from sch_cls_fee") or die(mysql_error());
                $i=1;
                while($row=  mysqli_fetch_array($header))
                {
                         
                         ?>
        
        
                <ul class="table-view" style="width: 900px;" >
                    <li style="width:65px;">
                             <?php  echo $i++;?>
                            <?php #  echo $_POST['table_view_id']; ?>
                    </li>
                    <li style="width:65px;">
                            
                            <?php echo $row[1];?>
                            <?php #  echo $_POST['table_view_id']; ?>
                    </li>
                    <li style="width:65px;">
                             <?php echo $row[2];?>
                            <?php # echo $set['adm_set_mdm']; ?>
                    </li>
                    <li style="width:100px;">
                            <?php echo $row[3];?>
                            <?php # echo $row[0]; ?>
                    </li>
                    <li   style="width:65px;">
                             <?php echo $row[4];?>
                            <?php # echo $set['adm_set_fee_type'] ?>
                    </li>
                    <li style="width:65px;" >
                            <?php echo $row[5];?>
                            <?php # echo $set['adm_set_fee'] ?>
                    </li>
                    <li style="width:65px;">
                        <?php echo $row[6];?>
                        <?php # echo $set['adm_set_lfee'] ?>
                    </li>
                  
                    <li style="width:65px;">
                        0
                    </li>
                </ul>
        
        
        
                            
                  
                       <?php } ?>
           
	<?php

exit;
?> 