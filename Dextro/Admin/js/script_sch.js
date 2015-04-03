$(document).on('click','.header-name-sub',function(){
	//alert('here');
	event.preventDefault();
	var header_name=$('.header-name').serialize();
	var flag8=0;
	$('.header-name').find('input').each(function(){
		if($(this).val()==null||$(this).val()==""){
			flag8++;
		
		}
	});
	if(flag8==0){
		$.ajax({
			type:'POST',
			datatype:'json',
			url:'db/header-name.php',
			data:{
				header_name:header_name
			},
			success:function(e){
				var str=JSON.parse(e);
				alert(str['status']);
				window.location.reload();
			}
		})
	}
	else{
		alert('Please Enter Name');
	}
});

/* Admin>>create class>> form*/ 
$(document).on('click','.adm_cls_sub',function(event){
	event.preventDefault();
	var adm_cls=$('.adm_cls').serialize();
	var class_view_id=$('.class-view-id').text();
	var flag2=0;
	
	var cookieId=document.cookie.split(';');
	var id=cookieId[1].split('=') ;
	var NewId=id[1];
	
	$('.adm_cls').find('input').each(function(){
		if($(this).val()==null||$(this).val()==""){
			flag2++;
		
		}
	});
	$('.amd_cls').find('select').each(function(){
		if($(this).val()=="default"){
			flag2++;
		}
	});
	if(flag2==0){
		$.ajax({
			type:'POST',
			datatype:'json',
			url:'db/class.php',
			data:{
				NewId:NewId,
				adm_cls:adm_cls,
				class_view_id:class_view_id
			},
			success:function(e){
				class_view_id++;
				if($(e).length){
					$("div.class-view-result").append(e);
					//window.location.reload();
					location.reload(true);
					}
				else{
					alert('details already exists');
				}
		
			}
		});
		
	}
	else{
		alert('please fill all the details');
	}
});
/*
$(document).on('click','div.class-view-cross',function(e){ 		
	var del_id = $(this).attr('id');
	var mdm=$('li.medium-'+del_id).text();
	var std=$('li.std-'+del_id).text();
	var count=$('li.count-'+del_id).text();
	if(confirm("There are"+count+" students in this class, are you sure you want to delete this class ?")==true){
		$.ajax({
			type:"POST",
			url:"db/class-row-delete.php",
			atync:'true',
			data:{
				mdm:mdm,
				std:std
			},
			success:function(data){
				  $('ul.'+del_id).slideUp('slow');
			}
		});
	}
});	
*/
/* Admin>>Set fee>>form */
$(document).on('click','.adm_set_sub_button',function(event){
	var table_view_id=$('.table-view-id').text();
	event.preventDefault();
	var adm_set=$('.adm_set').serialize();
	var flag3=0;
	var cookieId=document.cookie.split(';');
	var id=cookieId[1].split('=') ;
	var NewId=id[1];
	




	
	
	$('.adm_set').find('input').each(function(){
		if($(this).val()==null||$(this).val()==""){
			flag3++;
		
		}
	});
	$('.adm_set').find('select').each(function(){
		if($(this).val()=="default"){
			flag3++;
		}
	});
	console.log(table_view_id); 
	if(flag3==0){
		$.ajax({
			type:'POST',
			datatype:'json',
			url:'db/set_fee.php',
			async:'true',
			data:{
				NewId:NewId,
				adm_set:adm_set,
				table_view_id:table_view_id
			},
			success:function(d){
			
				if($.trim(d)=='0'){
					alert("no class of this name exists, please add class");
					//window.location.reload();
				}
				else if($.trim(d)=='1'){
					alert("Fee details already exits.");
				}
				else{
				//	console.log(d);
					location.reload(true);
					//table_view_id++;
					//$("div.table-view-result").append(d);
					//$("span.table-view-id").html(++table_view_id);
				}
				
			}
		});
		location.reload(true);
	}
	else{
		alert("please fill all the details");
	}
});
/*
$(document).on('click','div.table-view-cross',function(e){ 
		var del_id = $(this).attr('id');
		var mdm=$('li.medium-'+del_id).text();
		var std=$('li.std-'+del_id).text();
		$.ajax({
			type:"POST",
			url:"db/row-delete.php",
			atync:'true',
			data:{
				mdm:mdm,
				std:std,
			},
			success:function(data){
				  $('ul.'+del_id).slideUp('slow');
			}
		});
});*/	
/*Admin>>UPdate search student */
$(document).on('click','.adm_upd_show_sub',function(event){
	event.preventDefault();
	var adm_upd_show=$('.adm_upd_show').serialize();
	var flag4=0;
	$('.adm_upd_show').find('input').each(function(){
		if($(this).val()==null||$(this).val()==""){
			flag4++;
		}
	});
	if(flag4==0){
		$.ajax({
			type:'POST',
			datatype:'json',
			url:'db/upd_check.php',
			data:{
				adm_upd_show:adm_upd_show,
				count:'1'
			},
			success:function(e){
				var block=JSON.parse(e);
				if(block['status']=='Suceed'){
						$('div.dyn_upd_details').html(block['data']);		
						$('select[name="adm_upd_std"]').val(block["id"]["Std"]);
						$('select[name="adm_upd_mdm"]').val(block["id"]['Medium']);				
				}
				else{
				$('div.dyn_upd_details').html(e);	
					//alert("Invalid GR Number")
				//	window.location.reload();
				}
			}
		});	
	}
	else{
		alert('please fill GR/SR number');
	}
});

/* update student >> search by name*/
$(document).on('click','.adm_upd_show_name_sub',function(event){
	event.preventDefault();
	var adm_upd_show_name=$('.adm_upd_show_name').serialize();
	var flag6=0;
	$('.adm_upd_show_name').find('input').each(function(){
		if($(this).val()==null||$(this).val()==""){
			flag6++;
		}
	});
	if(flag6==0){
		$.ajax({
			type:'POST',
			datatype:'json',
			url:'db/upd_check_name.php',
			data:{
				adm_upd_show_name:adm_upd_show_name
			},
			success:function(e){
				$('div.dyn_upd_details_name').html(e);	
			}
		});	
	}
	else{
		alert('please Enter Name');
	}
});

$(document).on('click','.name-search-sub',function(event){
	event.preventDefault();
	var srch_id=$(this).attr('id');
	var adm_upd_show=$('.'+srch_id).text();
	console.log(adm_upd_show);
	$.ajax({
		type:'POST',
		datatype:'json',
		url:'db/upd_check.php',
		data:{
			adm_upd_show:adm_upd_show,
			count:'2'
		},
		success:function(e){
			var block=JSON.parse(e);
			console.log(block['det']['sex']);
			if(block['status']=='Suceed'){
					$('div.dyn_upd_details').html(block['data']);		
					$('select[name="adm_upd_std"]').val(block["id"]["Std"]);
					$('select[name="adm_upd_mdm"]').val(block["id"]['Medium']);				
					$('select[name="adm_upd_sex"]').val(block["det"]['sex']);
					$('select[name="adm_upd_tsta"]').val(block["det"]['status']);
			}
			else{
			$('div.dyn_upd_details').html(e);	
				//alert("Invalid GR Number")
			//	window.location.reload();
			}
		}
	});	
});

 /*Admin>>Update student>>update student*/
  $(document).on('click','.adm_upd_sub',function(event){
	event.preventDefault();
	var adm_grn=$('.adm_upd_grn_span').text();
	console.log(adm_grn);
	var flag9=0;
	var adm_upd=$('form.adm_upd_std_form').serialize();
	$('.adm_upd_std').find('.mando').each(function(){
			if($(this).val()==null||$(this).val()==""){
				flag9++;
			
			}
	});
	var phoneNumber = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
	var inputpn=$('.inputpn').val();
	
	
	var cookieId=document.cookie.split(';');
	var id=cookieId[1].split('=') ;
	var NewId=id[1];
	




	//console.log(phoneNumber.test(inputpn));
	if((phoneNumber.test(inputpn)==false)){  
		alert('Enter valid Phone Number');  
		return false;
	}
	if(flag9==0){
		$.ajax({
			type:'POST',
			datatype:'json',
			url:'db/upd_std.php',
			data:{
				NewId:NewId,
				adm_upd:adm_upd,
				adm_grn:adm_grn
			},
			success:function(e){
				var check=JSON.parse(e);
				console.log(check);
				if(check['status']=='suceed'){
					alert('Result Updated');
					window.location.reload();
				}
				else{
					alert('No class of this description available');
				}
			}
		});
	}
	else{
		alert("Please Fill mandtory details");
	}
});
/* Admin>>Create USER*/
$(document).on('click','.adm_cusr_sub',function(event){
	event.preventDefault();
	var flag1=0;
	var adm_cusr=$('.adm_cusr').serialize();
	
	var cookieId=document.cookie.split(';');
	var id=cookieId[1].split('=') ;
	var NewId=id[1];
	




	
	$('.adm_cusr').find('input').each(function(){
			if($(this).val()==null||$(this).val()==""){
				flag1++;
			
			}
		});
		$('.adm_cusr').find('select').each(function(){
			if($(this).val()=="default"){
				flag1++;
			}
		});
	//console.log(adm_cusr);
	if(flag1==0){
		$.ajax({
			type:'POST',
			datatype:'json',
			url:'db/crt_user.php',
			data:{
				NewId:NewId,
				adm_cusr:adm_cusr
			},
			success:function(e){
				var s=JSON.parse(e);
				if(s['status']=='suceed'){
					alert('user added');
					window.location.reload();
				}
				else{
					alert('choose different username');
				}
			}
		});
	}
	else{
		alert('please fill mandatory details');
	}
});

/* Search students*/

$(document).on('click','.adm_sch_src_sub',function(event){
	event.preventDefault();		
	var adm_src=$('.adm_sch_src').serialize();
	flag=0;
	$('.adm_sch_src').find('input').each(function(){
		if($(this).val()==null||$(this).val()==""){
			flag++;
		
		}
	})
	if(flag==0){
		$.ajax({
			type:'POST',
			datatype:'json',
			url:'db/src_std.php',
			data:{
				adm_src:adm_src,
				count:'1'
			},
			success:function(e){
				$('div.search-div').html(e);
				//window.location.reload();
			}
		});
	}
	else{
		alert('please fill GR/SR number');
	}
});

/*search student by name */
$(document).on('click','.adm_sch_src_name_sub',function(event){
	event.preventDefault();
	var adm_sch_src_name=$('.adm_sch_src_show_name').serialize();
	var flag7=0;
	$('.adm_sch_src_show_name').find('input').each(function(){
		if($(this).val()==null||$(this).val()==""){
			flag7++;
		}
	});
	if(flag7==0){
		$.ajax({
			type:'POST',
			datatype:'json',
			url:'db/src_std_name.php',
			data:{
				adm_sch_src_name:adm_sch_src_name
			},
			success:function(e){
				$('div.dyn_src_details_name').html(e);	
			}
		});	
	}
	else{
		alert('please Enter Name');
	}
});

$(document).on('click','.name-search-1-sub',function(event){
	event.preventDefault();		
	var adm_src=$('.'+$(this).attr('id')).text();
	$.ajax({
		type:'POST',
		datatype:'json',
		url:'db/src_std.php',
		data:{
			count:'2',
			adm_src:adm_src
		},
		success:function(e){
			$('div.search-div').html(e);
			//window.location.reload();
		}
	});

});

/* revenue.php*/
$(document).on('click','.rev-revenue',function(){
	//alert("1")
	$.ajax({
		url:'db/rev-revenue.php',
		method:'POST',
		datatype:'json',
		success:function(e){
			$('.rev-div-main').html(e);
		}
	});

});
/*Modified By Ranjeet || Addded Filter values as params in below fumction */
$(document).on('click','.rev-recieve',function(){
	//alert("2")
	// var drpMedium="-1";
	// var drpStd="-1";
	// var drpSec="-1";
	// $("#div-update-show").removeClass("rev-pendFilter").addClass("rev-recieveFilter");
	// $.ajax({
	// 	url:'db/rev-recieve.php',
	// 	method:'POST',
	// 	datatype:'json',
	// 	data:{
	// 		drpMedium:drpMedium,
	// 		drpStd:drpStd,
	// 		drpSec:drpSec
	// 	},
	// 	success:function(e){
	// 		//Added By Ranjeet || To show Filter
	// 		$("#revenue_filter").addClass("show").removeClass("hide");
	// 		$('.rev-div-main').html(e);
	// 	
	// });
		 $("#revenue_filter").addClass("show").removeClass("hide");
		 $("#div-update-show").removeClass("rev-pendFilter").addClass("rev-recieveFilter");
		 $('div.rev-div-main').html("Please Select Filters ......");
}); 
//added By Ranjeet || Reset Filters
$(document).on('change','.filter-data', function () {
	// $(".filter-reset").selectedIndex  = 0 ;
	$(".filter-reset").each(function() { this.selectedIndex = 0 });
});


/*Added By Ranjeet || Addded Filter values as params in below fumction */
$(document).on('change','.rev-recieveFilter',function(){
		var drpMedium=$('#drpMedium').val();
	var drpStd=$('#drpStand').val();
	var drpSec=$('#div-update-show').val(); 
	 var onetimeType = $("#one-time-type option:selected").text();
	//for onetime
    if($("#drpFeeType").val()=="One Time"){
                          if(drpSec != "" || drpSec != undefined){
        $('.rev-div-main').html("Loading ..........");
		
		
	$.ajax({
		url:'db/rev-recieve_onetime.php',
		method:'POST',
		datatype:'json',
		data:{
			drpMedium:drpMedium,
			drpStd:drpStd,
			drpSec:drpSec,
			selectedMonths:selectedMonths,
			onetimeType:onetimeType
		},
		success:function(e){
			//Added By Ranjeet || To show Filter
			$("#revenue_filter").addClass("show").removeClass("hide");
			$('.rev-div-main').html(e);
		}
	});}
    
    else
		alert("From Month should be less than To Month");

}
               
           
           else{
                      
        
	//added By Ranjeet || 24 Nov || For month filter
	var tMonth = $('#drpTMonth').val();
	var fMonth = $('#drpFMonth').val();
	if(parseInt(tMonth) >= parseInt(fMonth)){
	var $monArray=new Array('Jun','Jul','Aug','Sep','Oct','Nov','Dec','Jan','Feb','Mar','Apr','May');
	var selectedMonths = "'Jun','Jul','Aug','Sep','Oct','Nov','Dec','Jan','Feb','Mar','Apr','May'";
	if(parseInt(tMonth) > 0 && parseInt(fMonth) > 0){
		selectedMonths = "";
		for (var i = parseInt(fMonth -1) ; i < parseInt(tMonth) ; i++) {
				selectedMonths += "'" + $monArray[i] + "',"; 
			}
			selectedMonths = selectedMonths.substring(0, selectedMonths.length-1);
	}

	if(drpSec != "" || drpSec != undefined){
	//alert("2")
	$('.rev-div-main').html("Loading ..........");
	$.ajax({
		url:'db/rev-recieve.php',
		method:'POST',
		datatype:'json',
		data:{
			drpMedium:drpMedium,
			drpStd:drpStd,
			drpSec:drpSec,
			selectedMonths:selectedMonths
		},
		success:function(e){
			//Added By Ranjeet || To show Filter
			$("#revenue_filter").addClass("show").removeClass("hide");
			$('.rev-div-main').html(e);
		}
	});}}

	else
		alert("From Month should be less than To Month");


}});
	
	
	
	
	
/* main LOGIN page*/

$(document).on('click','.login-sub',function(event){
	event.preventDefault();
	var login=$('.login-main').serialize();
	var flag5=0;
	$('.login-main').find('input').each(function(){
		if($(this).val()==null||$(this).val()==""){
			flag5++;
		}
	});
	$('.login-main').find('select').each(function(){
			if($(this).val()=="default"){
				flag5++;
			}
		});
		//console.log(login);
	if(flag5==0){
		$.ajax({
			type:'POST',
			datatype:'json',
			url:'check.php',
			data:{
				login:login
			},
			success:function(e){
				//console.log(e);
				var entry=JSON.parse(e);
				//console.log(entry['status']);
				if(entry['status']=='suceed'){
					//window.location=''+entry['type']+'/index.php';
					//console.log(''+entry['type']+'/index.php');
					 document.cookie = "Id=entry['Id'];Utype=entry['type'];expires=72000";
                     window.location=''+entry['type']+'/index.php';
                     console.log(''+entry['type']+'/index.php');

				}
				else{
					alert('Invalid Details');
				}
			}
		})
	}
	else{
		alert('please enter login details');
	}
});
$(document).on('click','li.logout-span',function(){
	
	$.ajax({
		url:'logout.php',
		method:'POST',
		datatype:'json',
		success:function(e){
			alert('Logged off successfully');
			window.location='index.php';
		}
	});
});


//totalexpenses
$(document).on('click','.callAjax',function(){
	var sdate=$('#sdate').val();
	var edate=$('#edate').val();
        
	//console.log(strdate);
	$.ajax({
		url:'db/totalexpenses.php',
		method:'POST',
		datatype:'json',
		data:{
			edate:edate,
			sdate:sdate
		},
		success:function(e){
			$('div.show-by-date').html(e);
            $("#hidediv").hide();

                        
		}
	});
});

/* Transaction Page*/
$(document).on('click','.srch-fee-sub',function(){
	var strdate=$('input[name="srch-str-date"]').val();
	var enddate=$('input[name="srch-end-date"]').val();
	console.log(strdate);
	$.ajax({
		url:'db/tran.php',
		method:'POST',
		datatype:'json',
		data:{
			enddate:enddate,
			strdate:strdate
		},
		success:function(e){
			$('div.show-by-date').html(e);
		}
	});
});




//enquiry
$(document).on('click','.callAjax1',function(){
	var sdate=$('input[name="start"]').val();
	var edate=$('input[name="end"]').val();
        
	//console.log(strdate);
	$.ajax({
		url:'db/enquiry.php',
		method:'POST',
		datatype:'json',
		data:{
			edate:edate,
			sdate:sdate
		},
		success:function(e){
			$('div.show-by-date').html(e);
                        $("#hidediv").hide();

                        
		}
	});
});


$(document).on('click','.srch-mode-sub',function(){
	//alert('here');
	event.preventDefault();
	var mode=$('select.srch-mode-name').val();
	console.log(mode);
	$.ajax({
		url:'db/tran-name.php',
		method:'POST',
		datatype:'json',
		data:{
			mode:mode		},
		success:function(e){
			$('div.show-by-date').html(e);
		}
	});
});

/* Pending Transactions*/
/* added Params ||Ranjeet||22-Sep-14*/

$(document).on('click','.rev-pend',function(){
	/*var drpMedium=-1;
	var drpStd=-1;
	var drpSec=-1;
	$("#div-update-show").addClass("rev-pendFilter").removeClass("rev-recieveFilter");
	//alert('here');
	$.ajax({
		url:'db/pend.php',
		method:'POST',
		datatype:'json',
		data:{
			drpMedium:drpMedium,
			drpStd:drpStd,
			drpSec:drpSec
		},
		success:function(e){
			$('div.rev-div-main').html(e);
		}
	}); */
//enable std dropdown
		// document.getElementById("drpStand").disabled=false;
		 $("#revenue_filter").addClass("show").removeClass("hide");
		 $("#div-update-show").addClass("rev-pendFilter").removeClass("rev-recieveFilter");
		 $('div.rev-div-main').html("Select Filter ......");
});
/* Added By Ranjeet ||For Filter*/
$(document).on('change','.rev-pendFilter',function(){
	var drpMedium=$('#drpMedium').val();
	var drpStd=$('#drpStand').val();
	var drpSec=$('#div-update-show').val();
	var onetimeType = $("#one-time-type option:selected").text();
	
	
	//for onetime
    if($("#drpFeeType").val()=="One Time"){
	$('div.rev-div-main').html("Please Wait ...Loading.");
	if(drpSec != "" || drpSec != undefined){
	//alert('here');
	$.ajax({
		url:'db/rev-pending_onetime.php',
		method:'POST',
		datatype:'json',
		async:true,
		data:{
			drpMedium:drpMedium,
			drpStd:drpStd,
			drpSec:drpSec,
			selectedMonths:$selectedMonths ,
			onetimeType:onetimeType
			//Added by Ranjeet | 25-nov \\ For Month  Filter
			// newSelectedMonth : newSelectedMonth //For month check
		},
		success:function(e){
			$("#revenue_filter").addClass("show").removeClass("hide");
			$('div.rev-div-main').html(e);
		}
	});}
    
    else
		alert("From Month should be less than To Month");

}
	 else{
	
	
	var tMonth = $('#drpTMonth').val();
	var fMonth = $('#drpFMonth').val();
	var $monArray=new Array('Jun','Jul','Aug','Sep','Oct','Nov','Dec','Jan','Feb','Mar','Apr','May');
	var $selectedMonths = "'Jun','Jul','Aug','Sep','Oct','Nov','Dec','Jan','Feb','Mar','Apr','May'";
	// var newSelectedMonth = "";
	if(parseInt(tMonth) >= parseInt(fMonth)){
		$selectedMonths = "";
		for (var i = parseInt(fMonth -1) ; i < parseInt(tMonth) ; i++) {
				$selectedMonths += "'" + $monArray[i] + "',"; 
				newSelectedMonth = $monArray[i] + ",";
			}
			$selectedMonths = $selectedMonths.substring(0, $selectedMonths.length-1);
			// if(newSelectedMonth != "")
			// newSelectedMonth = newSelectedMonth.substring(0, newSelectedMonth.length-1);
			console.log($selectedMonths);
			// console.log(newSelectedMonth);
	}

	//alert($selectedMonths);

	$('div.rev-div-main').html("Please Wait ...Loading.");
	if(drpSec != "" || drpSec != undefined){
	//alert('here');
	$.ajax({
		url:'db/pend.php',
		method:'POST',
		datatype:'json',
		async:true,
		data:{
			drpMedium:drpMedium,
			drpStd:drpStd,
			drpSec:drpSec,
			selectedMonths:$selectedMonths //Added by Ranjeet | 25-nov \\ For Month  Filter
			// newSelectedMonth : newSelectedMonth //For month check
		},
		success:function(e){
			$("#revenue_filter").addClass("show").removeClass("hide");
			$('div.rev-div-main').html(e);
		}
	});}
	 }});
