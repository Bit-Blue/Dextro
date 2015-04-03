

<?php
include('../../db.php');
$admission=0;
$adm_late=0;
$query2=mysqli_query($con,"SELECT IFNULL(SUM(Amount),0) ,IFNULL(SUM(late_fee),0)FROM adm_sch_tran WHERE lflag =  'no' LIMIT 0 , 30");
$adm=mysqli_fetch_row($query2)	;
       // $admission=$adm[0];
        
//{$i=0;
//	while($adm=mysqli_fetch_row($query2))
//			$admission=$admission+$adm[0];
//		if($adm[2]=='Yes'){
//			$adm_late=$adm_late+$adm[1];
//		}	
//        }


 $balance=0;
		$query1=mysqli_query($con,"SELECT bal FROM bal_amt");
		{$i=0;
		while($bal=mysqli_fetch_row($query1)){
				$balance=$balance+$bal[0];
				
                }}
 ?>  

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../../css/index.css"/>
	</head>
	<body>
	<div class="wrapper">
		<div class="nav-bar">
			<div class="nav-bar-inner">
				<div class="menu-container">
					<h3>Dextro campus</h3>
				</div>
				<div class="sub-container">
					<ul class="sub-container-menu">
						<li class="header-menu">
						Hello, admin						</li>
						<li class="header-menu">
						Account Type:Admin						</li>
						<li class="header-menu logout-span">
						logout
						</li>
					</ul>
				</div>
			</div>
		</div>			
		<div class="cover">	
			<div class="row">	
				<div class="span-left">
					<ul class="left-menu">
						 <a class="left-menu-link" href="index.php"><li class="left-menu-li" ><span>Home</span></li></a>
						 <a class="left-menu-link" href="class.php"><li class="left-menu-li"><span>Create New Class</span></li></a>
						 <a class="left-menu-link" href="set_fee.php"><li class="left-menu-li"><span>Set Class Fees</span></li></a>
						 <a class="left-menu-link" href="update_std.php"><li class="left-menu-li"><span>Update Student Info</span></li></a>
						 <a class="left-menu-link" href="tran.php"><li class="left-menu-li"><span>Transaction</span></li></a>
						 <a class="left-menu-link" href="src_std.php"><li class="left-menu-li"><span>Search Student</span></li></a>
						 <a class="left-menu-link"href="crt_user.php"><li class="left-menu-li"><span>Create New User</span></li></a>
						 <a class="left-menu-link"href="edit_pro.php"><li class="left-menu-li"><span>Edit Account</span></li></a>
                                                 <a class="left-menu-link"href="enquiry.php"><li class="left-menu-li"><span>Enquiry</span></li></a>
                                                 <a class="left-menu-link"href="bonafide.php"><li class="left-menu-li"><span>Bonafide</span></li></a>
					 </ul>
				</div>
		<style>
	ul.table-view{
	  width:100%;/*Ranjeet*/
}
.post-text{

	 width:100%;/*Ranjeet*/
}
</style>

   
<div class="span-right">
	<div class="main-container">
		<div class="post-header">
			<span><a href="revenue.php" style="color:#fff;" > Revenue </a></span>
			<span> Admission </span>
			</div>
 
	    <div class="post-content">
			<div class="post-text">
				<div class="rev-div rev-recieve">
					<div class="rev-div-header">
						Total admission Revenue
					</div>
					<div class="rev-content">
						<div class="content-block">
							<div class="block-top">
								From Direct 
							</div>
							<div class="block-bottom">
								<?php echo $adm[0] ?>							</div>
						</div>
						<div class="content-block">
							<div class="block-top">
								From Late Fee
							</div>
							<div class="block-bottom">
							<?php echo $adm[1] ?>								</div>
						</div>
					</div>
				</div>
				<div class="rev-div rev-pend" style="cursor:pointer">
					<div class="rev-div-header">
						Total Pending
					</div>
					<div class="rev-content">
                                              <div class="content-block">
							<div class="block-top">
								From Direct 
							</div>
							<div class="block-bottom">
								<?php echo $balance ?>							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Added By Ranjeet ||	filter -->
	<div id="revenue_filter" class='hide'>
	
  <div class="filter-div"><span>Sec :</span>
			<select id="div-update-show" class="filter-reset" ></select> 
   </div>
  <div class="filter-div"><span>Std :</span>
  	<select id="drpStand" class="filter-reset" name="sch_ads_std" onchange="getdiv_count()" disabled>
							<option value="default">Select One</option>
							 <option value="Mr.dextro">Mr.dextro</option>
							 <option value="nursery">Nursery</option>
                                                         <option value="junior.kg">jr.kg</option>
                                                         <option value="senior.kg">sr.kg</option>
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

<div class="filter-div"><span>Med :</span>
		<select id="drpMedium" class="filter-data" name="sch_ads_mdm" onchange="enable_std()">
							 <option value="default">Select One</option>
							 <option value="English">English</option>
							 <option value="Hindi">Hindi</option>
							 <option value="Marathi">Marathi</option>
 		 </select>
</div>


<div><!--	end of filter -->

	<div class="rev-div-main">
	</div>
</div>
				</div>		
		</div>
	</div>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/s_s.js"></script>
	
</body>
    </html><script>

//on change enable std dropdown
function enable_std(){
	var drpMedium=$('#drpMedium').val();
	$('#div-update-show').html("");
	//alert(drpMedium)
	if(drpMedium !="default" && drpMedium != "" && drpMedium!= undefined)
	{
		//enable std dropdown
		 document.getElementById("drpStand").disabled=false;
	}
}

/* division dynamic filter||Added By Ranjeet */
function getdiv_count(){
	var mdm=$("select[name='sch_ads_mdm']").val();
	var std=$("select[name='sch_ads_std']").val();
	//alert(mdm);
//	console.log(mdm,std)
if(mdm != "" && mdm != undefined && std != "" && std != undefined)
{
	$.ajax({
		url:'db/filter.php',
		method:'POST',
		datatype:'json',
		data:{
			mdm:mdm,
			std:std
		},
		success:function(e){
			//alert(e);
			try{
			var div=JSON.parse(e);
			var block='';
			block +='<option value="-1">-select-</option>'
			$.each(div['data'],function(index,value){
				block +='<option value='+value+'>'+value+'</option>'
			});
			block=block+'</select>';
			//console.log(block);
			$("#div-update-show").html(block);
		}
		catch(ex)
		{console.log("Error for division filter data:"+ex);}
	}});
}
else
{
	alert("Please Select Medium and Standard.")
}
}
</script>
                                        