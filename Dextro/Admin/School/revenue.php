<?php
	include('../attach/header_sch.php');
	$rev=0;
	$income=0;
	$late=0;
	$pending=0;
	//$query=mysqli_query($con,"select fee,one_time,medium,std from sch_cls_fee");
	//$i=0;
	/*while($id=mysqli_fetch_row($query)){
		$count=mysqli_num_rows(mysqli_query($con,"select * from user_sch where medium='".$id[2]."' AND std='".$id[3]."'"));
	//	echo $count;
		if($id[1]=='Per Year'){
				$rev=($id[0]*$count+$rev);
			}
			else{
				$rev=(($id[0]*12)*$count)+$rev;
			}
	}*/
	$query=mysqli_query($con,"SELECT SUM(`Amount`),SUM(`late_fee`) FROM `sch_tran` ");
	$jd=mysqli_fetch_row($query);
	
	// {$i=0;
	// while($jd=mysqli_fetch_row($query)){
			// $income=$income+$jd[0];
		// if($jd[2]=='Yes'){
			// $late=$late+$jd[1];
		// }	
        // }}

//$balance=0;
$query1=mysqli_query($con,"SELECT SUM(sch_cls_fee.fee) FROM user_sch INNER JOIN sch_cls_fee ON sch_cls_fee.Medium =user_sch.Medium WHERE sch_cls_fee.one_time='Per Year' AND sch_cls_fee.fee_type <> 'Admission Fee' AND user_sch.Gr_num NOT IN (SELECT DISTINCT sch_tran.`Gr_num` FROM sch_tran WHERE sch_tran.fee_type <> 'Monthly Fee' )");

// //Pening Total Amount Monthly 
// $t_amount = 0 ;

// $totalUserquery=mysqli_query($con,"Select user_sch.Gr_num, sch_cls_fee.fee_type, user_sch.Name, sch_cls_fee.fee
					// ,user_sch.Medium,user_sch.Std,user_sch.Section
				// from user_sch
				// Inner Join sch_cls_fee
				// On user_sch.Medium=sch_cls_fee.Medium 
				// And user_sch.Std=sch_cls_fee.Std 
				// ");

// $selectedMonths="'Jun','Jul','Aug','Sep','Oct','Nov','Dec','Jan','Feb','Mar','Apr','May'";
// $mon  = explode(',', $selectedMonths);
			
			// while($val = mysqli_fetch_row($totalUserquery)) {
				
				// $mon_query=mysqli_query($con,"select  Month, Amount from sch_tran  where Gr_num='".$val[0]."' And fee_type='".$val[1]."' " ) ;
				// $j =0 ;
				 // $add = array(); //empty array
				
				// while($mon_add=mysqli_fetch_array($mon_query)){
					// $add[$j]= "'".$mon_add[0]."'";
					// // print_r($mon_add[0]);
					 // $j = $j + 1 ;
				// }
				// // print_r($add);
				// // print_r("wcwec");
				// // print_r(var_dump(array_diff($mon,$add)));

				// $k = 0 ;
				// $months = "";
				// $t_amount = 0 ;
				
				// // print_r($mon);
				// // print_r("||");
				// // print_r($add);
				// $newArray = array_diff($mon,$add);
				// // print_r("result");
				// // print_r($newArray);
	
				// if(!empty($newArray)){	
				
					// foreach( $newArray as $key){
							 // // print_r("key".$key);
							// $months = $months." " .$key;
							// $t_amount = $t_amount +  $val[3];
						// // }}}
					// }
				// }

$balance=mysqli_fetch_row($query1);

		// $query1=mysqli_query($con,"SELECT bal FROM bal_amt");
		// {$i=0;
		// while($bal=mysqli_fetch_row($query1)){
				// $balance=$balance+$bal[0];
				
                // }}
                
                
                
                $amt=0;
		$qry=mysqli_query($con,"SELECT amount FROM expenses ");
		$i=0;
		while($t=mysqli_fetch_row($qry)){
				$amt=$amt+$t[0];
			
				
		}
                
                
$admission=0;
$adm_late=0;
$query2=mysqli_query($con,"select Amount,late_fee,lflag from adm_sch_tran");
	{$i=0;
	while($adm=mysqli_fetch_row($query2))
			$admission=$admission+$adm[0];
		if($adm[2]=='Yes'){
			$adm_late=$adm_late+$adm[1];
		}	
       } 
?>
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
			<span> Revenue</span>
		</div>
	    <div class="post-content">
			<div class="post-text">
				<div class="rev-div rev-recieve">
					<div class="rev-div-header">
						Total Recieved Revenue	
					</div>
					<div class="rev-content">
						<div class="content-block">
							<div class="block-top">
								From Direct Fee
							</div>
							<div class="block-bottom">
								<?php echo $jd[0] ?>
							</div>
						</div>
						<div class="content-block">
							<div class="block-top">
								From late Fee
							</div>
							<div class="block-bottom">
								<?php echo $jd[1] ?>
							</div>
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
								Fee
							</div>
							<div class="block-bottom">
								<?php echo $balance[0]   ; ?>
							</div>
						</div>
					</div>
				</div>
				<a href="Admission.php">
				<div class="rev-div rev-recieve">
					<div class="rev-div-header">
						Admission
					</div>
					<div class="rev-content">
						<div class="content-block">
							<div class="block-top">
								From Direct Fee
							</div>
							<div class="block-bottom">
								<?php echo $admission ?>  
							</div>
						</div>
						<div class="content-block">
							<div class="block-top">
								From late Fee
							</div>
							<div class="block-bottom">
								<?php echo $adm_late ?> 
							</div>
						</div>
					</div>
				</div></a>
				<a href="totalexpenses.php">
				<div class="rev-div rev-recieve">
					<div class="rev-div-header">
						Total Expenses	
					</div>
					<div class="rev-content">
						<div class="content-block">
							<div class="block-top">
								 Fee
							</div>
							<div class="block-bottom">
								<?php echo $amt ?>
							</div>
						</div>
						
					</div>
				</div></a>
			</div>
		</div>
	</div>
	<!-- Added By Ranjeet ||	filter -->
	<div id="revenue_filter" class='hide'>
	
  <div class="filter-div"><br/><span>Division :</span><br/>
			<select id="div-update-show" class="filter-reset" ></select> 
   </div>
    <!-- Added One Time Select Option -->
<div class="filter-div" id='one_time_fee'><br/><span>Type :</span><br/>
			<select id="one-time-type" class="filter-reset"></select> 
</div>
   
  <div class="filter-div"><br/><span>Std :</span><br/>
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

<div class="filter-div"> <br/><span>Med :</span><br/>
		<select id="drpMedium" class="filter-data" name="sch_ads_mdm" onchange="enable_std()">
							 <option value="default">Select One</option>
							 <option value="English">English</option>
							 <option value="Hindi">Hindi</option>
							 <option value="Marathi">Marathi</option>
 		 </select>
</div>
<div  style="width:185px;float:right;" id="toMonth"><br/><span>To Month :</span><br/>
		<select id="drpTMonth" class="filter-data" name="sch_ads_tMonth" >
							 <option value="0">Select One</option>
							 <option value="1">Jun</option>
							 <option value="2">Jul</option>
							 <option value="3">Aug</option>
							 <option value="4">Sep</option>
							 <option value="5">Oct</option>
							 <option value="6">Nov</option>
							 <option value="7">Dec</option>
							 <option value="8">Jan</option>
							 <option value="9">Feb</option>
							 <option value="10">Mar</option>
							 <option value="11">Apr</option>
							 <option value="12">May</option>
 		 </select>
</div>
<div style="width:185px;float:right;" id="fromMonth"><br/><span>From Month :</span><br/>
		<select id="drpFMonth" class="filter-data" name="sch_ads_fMonth" >
							 <option value="0">Select One</option>
							 <option value="1">Jun</option>
							 <option value="2">Jul</option>
							 <option value="3">Aug</option>
							 <option value="4">Sep</option>
							 <option value="5">Oct</option>
							 <option value="6">Nov</option>
							 <option value="7">Dec</option>
							 <option value="8">Jan</option>
							 <option value="9">Feb</option>
							 <option value="10">Mar</option>
							 <option value="11">Apr</option>
							 <option value="12">May</option>
 		 </select>
</div> 
 

<div class="filter-div"><br/><span>Fee Type :</span><br/>
		<select id="drpFeeType" class="filter-data" name="" onchange="changefun()">
							  						 <option value="Monthly">Monthly</option>
                                                         <option value="One Time">One Time</option>
 		 </select>
</div>
<div><!--	end of filter -->

	<div class="rev-div-main">
	</div>
</div>
	<?php
	include('../attach/footer_sch.php');
?>
<script>
//for one time fee
function changefun()
{
        if($("#drpFeeType").val()=="One Time"){
                $("#fromMonth").hide();
                $("#toMonth").hide();
				$('#one_time_fee').show();
					      $.ajax({
		url:'db/one_time_filter.php',
		method:'POST',
		datatype:'json',
		data:{
		count:1
			 },
		success:function(e){
		try{
			var div=JSON.parse(e);
			 var len=div.length;
			  var block='';
			  for (var i = 0; i < len; i++) {
		      block +='<option value='+div[i]+'>'+div[i]+'</option>'
              }
			  $("#one-time-type").html(block);
		}
		catch(ex)
		{console.log("Error for Getting  one Time Fees:"+ex);}
	}});
}
          else{
                $("#fromMonth").show();
                $("#toMonth").show();
				$('#one_time_fee').hide();
                  }
}




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