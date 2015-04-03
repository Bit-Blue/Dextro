   <div id="revenue_filteradm" class='hide' style="font-family: initial; font-weight: 700;">
	
        
        <form class="filterfrm" method="post" action="">
        <div class="filter-div" >
                <span style="font-size: small;margin-top: 5px;font-weight: 600; margin-right: 3px;">Sec :</span>
                <select id="div-update-showadm" class="filter-reset" >
          
          
          
                </select> 
        </div>
        <div class="filter-div" style="width: 132px;"> 
                <span style="font-size: small;margin-top: 5px;font-weight: 600; margin-right: 3px;">Std :</span>
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

        <div class="filter-div">
    
                <span style="font-size: small;margin-top: 5px;font-weight: 600; margin-right: 3px;">Med :</span>
		<select id="drpMedium" class="filter-data" name="sch_ads_mdm" onchange="enable_std()">
							 <option value="default">Select One</option>
							 <option value="English">English</option>
							 <option value="Hindi">Hindi</option>
							 <option value="Marathi">Marathi</option>
 		 </select>
        </div>
        <div id="from" style="width:185px;float:right; display: none">
                <span style="font-size: small;margin-top: 5px;font-weight: 600; margin-right: 3px;">To Month :</span>
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
            <div id="to" style="width: 195px; float: right; display: none;">
    
                <span style="font-size: small;margin-top: 5px;font-weight: 600; margin-right: 3px;">From Month :</span>
		<select id="drpFMonth" class="filter-data" name="sch_ads_fMonth" style="width: 96px;" >
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

                
            <!-- ADDED FOR SORTING -->
            <div id="drpFtype" class="div-update-show" style="width:185px;float:right;">
               
            </div>
            
            <div style="width: 160px;float:left; display:flex;margin-left: 0px;">
    
                <span style="font-size: small;margin-top: 5px;font-weight: 600; margin-right: 3px;">Search by:</span>
		<select id="drpSORT" class="filter-data" name="sch_ads_drpSort" style="width: 96px;" >
							 <option value="default">Select One</option>
							 <option value="Per Year">Year</option>
							 <option value="Per Month">Month</option>
 		</select>
            </div>
            
        </form>
                <br><br><br><br>
    </div>
<!--	end of filter -->
        <div>

            <div class="rev-div-mainadm">
                
            </div>
        </div>
	<?php
	include('../attach/footer_sch.php');
?>
<script>

 $(document).on('change','#drpSORT',function() {

        var drpSearch=$('#drpSORT').val();
        //alert(drpSearch);
        if(drpSearch =="default")
        {
            
            
            document.getElementById("from").style.display="none";
            document.getElementById("to").style.display="none";
       
       
       
      
        }
        else if(drpSearch!="default" && drpSearch =="Per Year"){
      
          
            document.getElementById("from").style.display="none";
            document.getElementById("to").style.display="none";
      
        }
        else if(drpSearch!="default" && drpSearch =="Per Month")
        {
           
            document.getElementById("from").style.display="block";
            document.getElementById("to").style.display="block";
       
        }
        
        var order=$("select[name='sch_ads_drpSort']").val();

	//console.log(mdm,std)
	$.ajax({
		url:'db/fee_type.php',
		method:'POST',
		datatype:'json',
		data:{
			order:order,
			
		},
		success:function(e){
			var div=JSON.parse(e);
			var block='<span style="font-size: small;  margin-top: 5px;  font-weight: 600;  margin-right: 3px;">Fee Type:</span> <select name="sch_updc_show_div" class="mando">';
			$.each(div['data'],function(index,value){
				block=block+'<option value='+value+'>'+value+'</option>'
			});
			block=block+'</select>';
			//console.log(block);
			$("div.div-update-show").html(block);
		}
	});
        
        
        
        /*
        var d=$('.filterfrm').serialize();

        $.ajax({
            url: "db/fee_type.php",
            type: "post",
            data:d,
            success: function(response){
                
                        if(response.status=="Year"){
                        
                 
                        
                        $('#drpFtype').html(data.data.html);
                        }
                        else
                        {
                        
                            $('#drpFtype').html(data.data.html);
                        }
            }
        }); */
        
        
        
        
});
//on change hide


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