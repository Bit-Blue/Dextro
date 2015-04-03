	 $(document).on('click','.sch_ads_sub',function(event){
		var add_std=$('.sch_ads').serialize();
		var flag2=0;
		event.preventDefault();
		$('.sch_ads').find('.mando').each(function(){
			if($(this).val()==null||$(this).val()==""){
				flag2++;
			
			}
		});
		$('.sch_ads').find('.mando').each(function(){
			if($(this).val()=="default"){
				flag2++;
			}
		});
               
		var phoneNumber = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
		var inputpn=$('.inputpn').val();
                var enrolfor = $("select[name='sch_ads_type']").val();
		//console.log(phoneNumber.test(inputpn));
		if((phoneNumber.test(inputpn)==false)){  
			alert('Enter valid Phone Number');  
			return false;
        }  
		if(flag2==0){
		$.ajax({
			type:'POST',
			datatype:'json',
			url:'db/add_std.php',
			data:{
				add_std:add_std
                                
				}
		}).done(function(data){
                    
                    
                    
                    if(enrolfor =="admission")
                                {
                                    
                                     alert("Details Added");
                                window.location="../School/Std_Form.php";
                                }
                                else
                                {
                                     alert("Details Added");
                                    location.reload();
                                }
                                
                  
                    
                    
		//	var arry=JSON.parse(data);
		  //  console.log(arr);
		/*	if((arry['status1'])!='GRN'){
                            
				alert(arry['status1']);
                                if(enrolfor =="admission")
                                {
                                window.location="../School/Std_Form.php";
                                }
                                else
                                {
                                    location.reload();
                                }
                               
                                
                                
				
			}
			else{
				alert('GR/SR number already exists please choose a new one')
			}
                */
		})
		}
		else{
			alert('fll all the details');
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

	/* school>> show update for class*/
	 $(document).on('click','.sch_updc_show_sub',function(event){
		var sch_updc_show=$('.sch_updc_show').serialize();
		event.preventDefault();
		var flag1=0;
		event.preventDefault();
		$('.sch_updc_show').find('input').each(function(){
			if($(this).val()==null||$(this).val()==""){
				flag1++;
			
			}
		});
		$('.sch_updc_show').find('select').each(function(){
			if($(this).val()=="default"){
				flag1++;
			}
		});
		if(flag1==0){
			$.ajax({
				type:'POST',
				datatype:'html',
				url:'db/updc_show.php',
				data:{
					sch_updc:sch_updc_show
					}
			}).done(function(data){
				$('div.updc_show_div').html(data);
			})
		}
		else{
			alert('please fill required fields');
		}
	});
	$(document).on('click','.check-select-all',function(){
		 var checkboxes = new Array();
		 var val=$(this).val();
		  $('input[name='+val+']').attr('checked', this.checked);
	});
	
	/* updating the class*/
	$(document).on('click','.updc_class',function(event){
		var id=$(this).attr('id');
		var check = new Array();
                
                
                
		$("input[name="+id+"]:checked").each(function() {
		   check.push($(this).val());
		});
		var nclass=$("div."+id+" select[name='update-to']").val();
		var nmdm=$("div."+id+" select[name='update-mdm']").val();
		var nsec=$("div."+id+" select[name='update-sec']").val();
		event.preventDefault(event);
		if(check.length === 0){
				alert('please select Students');
		}
		else{
			$.ajax({
				type:'POST',
				datatype:'json',
				url:'db/updc.php',
				data:{
					updc:check,
					nclass:nclass,
					nmdm:nmdm,
					nsec:nsec
					}
			}).done(function(data){
				var sta=JSON.parse(data);
				alert(sta['status']);
				if(sta['status']=='suceed'){
				window.location.href = window.location.href;
				}
				})
		}
	});
		/* add fee */
	$(document).on('click','.sch_fee_grn_sub',function(event){
		event.preventDefault();		
		var fee_grn=$('.sch_fee_grn').serialize();
		$.ajax({
			type:'POST',
			datatype:'json',
			url:'db/sch_fee_show.php',
			data:{
				fee_show:fee_grn
			},
			success:function(e){
				$('div.sch_fee_div').html(e);
				//window.location.reload();
			}
		});
	});
        
        // ADDED FOR FETCHING GRNO FROM DATABASE
        
        $(document).on('click','.sch_bonafide_grn_sub',function(event){
		event.preventDefault();		
		var fee_grn=$('.sch_bonafide_grn').serialize();
		$.ajax({
			type:'POST',
			datatype:'json',
			url:'db/bonafideForm.php',
			data:{
				fee_show:fee_grn
			},
			success:function(e){
				$('div.sch_bonafide_div').html(e);
				//window.location.reload();
			}
		});
	});

//Added : Ranjeet | 03-Jan-14 | For Multiple fee type addtion | Show selectetd add fee
//Added : Ranjeet | 03-Jan-14 | For Multiple fee type addtion | Show selectetd add fee



$(document).on('click',"#btn_fee_chng_pop_add",function(){
	event.preventDefault();
	var flag=0;
		// var fee_chng_grn=$('span.fee_chng_grn').text();
		// var fee_chng=$('.fee_chng_form').serialize();
		//console.log(fee_chng);
		$('.fee_chng_form').find('input').each(function(){
			if($(this).val()==null||$(this).val()==""){
				flag++;
			
			}
		});
		if($('input.sel_mon').length){
		if(!$('input.sel_mon').is(':checked')){
			flag++;
			}
		}
		$('.fee_chng_form').find('select').each(function(){
			if($(this).val()=="default"){
				flag++;
			}
		});
		fee_chng_amount=$('select[name=fee_chng_form_fee_type]').val();
		fee_chng_amount=$('select[name=fee_chng_form_paym]').val();
		if(fee_chng_amount=null || fee_chng_amount=="default" ) flag++;
		// var fee_chng_lfee=$('.fee_chng_form_hide_2').text();
		//console.log(flag);
		if(fee_chng_amount==null || fee_chng_amount == "default" ) flag++;


		if(flag==0)
		{
			$("span.no-data-table").hide();//Hide No  Data text
			$("tr.tbl-header-text").show();
			var html = "<tr>";
			var lateObj = {}; //obj for late fee
                        
                       
                        if((glo =="Per Month"))
			{
				$( "input.sel_late:checked" ).each(function(e,d){lateObj[$(d).val()] = $(d).val(); console.log($(d).val())});
				// If Monthly type selected
				$( "input.sel_mon:checked" ).each(function(e,d){console.log($(d).val());
					
                //                         var TotalAmt =  $(".fee_chng_form_hide_4").text();
                //                        var DiscAmt = $(".disc").val();
                //                         var PayableAmt = TotalAmt-DiscAmt;
                //                         var PaidAmt = $(".paid").val();
                                         
                //                         var BalAmt = TotalAmt-DiscAmt - PaidAmt;
                                    
                    html += "<td>"+ $(".fee-chng-form-reciept").val()+ "</td>";//recipt number
					html += "<td>"+ $("#fee_chng_grNum").text()+ "</td>"; //GR number
					html += "<td>"+ $(".fee_chng_form_hide_4").text(); + "</td>";//Amount
                                        html += "<td>"+ "0" + "</td>";//bal
					html += "<td>"+$(d).val() + "</td>"; //Month
					// html += "<td>"+ $(".fee_chng_form_hide form-text .sel_mon_span checkbox").val()+ "</td>";
					html += "<td>"+ $("select[name=fee_chng_form_fee_type]").val()+ "</td>"; //Fee Type
					html +="<td>"+$("select[name=fee_chng_form_paym]").val()+"</td>"; //Payment mode
					html += "<td>"+$("input[name=fee_chng_form_chq]").val()+ "</td>"; //cheque number
					if(lateObj[$(d).val()] != undefined)
					html +="<td>"+$('.fee_chng_form_hide_2').text()+ "</td>"; //late fee
					else html +="<td>0</td>"; //late fee
                                        html += "<td>"+ $(".resn").val()+ "</td>";//reason
					html += "<td onclick='return deleteAddedFee(this)'><button>Delete</button></td>";//Delete
					html += "</tr>"
				}); 
			}
			//One Time Fee Type
			else
			{
				//Added For TEST 
				var fee_chng_type=$('select[name="fee_chng_form_fee_type"]').val();
			
			if(fee_chng_type == "Admission Fee" || fee_chng_type=="Sports")
				{
                                         var TotalAmt =  $(".fee_chng_form_hide_4").text();
                                         var DiscAmt = $(".disc").val();
                                         var PayableAmt = TotalAmt-DiscAmt;
                                         var PaidAmt = $(".paid").val();
                                         var BalAmt = TotalAmt-DiscAmt - PaidAmt;
										 
									
				}
					else				
					{
						                 var TotalAmt =  $(".fee_chng_form_hide_4").text();
                                         var DiscAmt = 0;
                                         var PayableAmt = TotalAmt;
                                         var PaidAmt = TotalAmt;
                                         var BalAmt = 0;
										
					}
                            
                            
				html += "<td>"+ $(".fee-chng-form-reciept").val()+ "</td>";//recipt number
				html += "<td>"+ $("#fee_chng_grNum").text()+ "</td>"; //GR number
				html += "<td>"+ PaidAmt + "</td>";//amount
                                html += "<td>"+ BalAmt + "</td>";//bal
				html += "<td>"+ $("select[name=fee_chng_form_fee_type]").val()+ "</td>"; //Fee Type
				html += "<td>"+ $("select[name=fee_chng_form_month]").val()+ "</td>"; //Fee | One Time 
				html +="<td>"+$("select[name=fee_chng_form_paym]").val()+"</td>"; //Payment mode
				html += "<td>"+$("input[name=fee_chng_form_chq]").val()+ "</td>"; //cheque number
				
                          
                                if($("#my").val()=="no")
                                {//Wrong option value and text given..check select option
                                   html += "<td>"+$('.fee_chng_form_hide_2').text() + "</td>";
                               } 
                                   
				else {
                                    html += "<td>0</td>";
                                }
                                
                        
                                html += "<td>"+ $(".resn").val()+ "</td>";//reason
				html += "<td onclick='return deleteAddedFee(this)'><button>Delete</button></td>";//Delete
				html += "</tr>"

			}

			$('div.fee_chng_div').find("select").val("");//reset form selectedIndex 
			$('div.fee_chng_div').find('input:checkbox').removeAttr('checked');


			// $('form[name=fee-change]').find("select").each(function(e,d){$(d).selectedIndex = 0});
			$(".fee_chng_form_hide_1").text("");
			$(".fee_chng_form_hide_3").text("");
			$("#tblAddedFeeSummary").append(html);				
		}		

		else{
			alert('please fill mandatory fields');
		}
});


    function discClicked()
    {
        
    }


// Save Added fee to db
//Modified: Ranjeet | To add multiple fee at a time
	$(document).on('click','.sch_fee_verify',function(){
		event.preventDefault();
		var flag=0;
		// var fee_chng_grn=$('span.fee_chng_grn').text();
		// var fee_chng=$('.fee_chng_form').serialize();
		//console.log(fee_chng);
		// $('.fee_chng_form').find('input').each(function(){
		// 	if($(this).val()==null||$(this).val()==""){
		// 		flag++;
			
		// 	}
		// });
		// if($('input.sel_mon').length){
		// if(!$('input.sel_mon').is(':checked')){
		// 	flag++;
		// }
		// }
		// $('.fee_chng_form').find('select').each(function(){
		// 	if($(this).val()=="default"){
		// 		flag++;
		// 	}
		// });
		// var fee_chng_amount=$('.fee_chng_form_hide_4').text();
		// var fee_chng_lfee=$('.fee_chng_form_hide_2').text();
		//console.log(flag);
		// var fields = $( "table:td" ).serializeArray();
	var postData = [];
		$('table tr').each(function(index, tr) {
		if(index !=0 && !$(tr).hasClass('deletedFee')){
			var postTd = {};
     		$('td', tr).map(function(index, td) { 
        		// console.log( $(td).text() + "" + index);
        				postTd[index] = $(td).text();
    			}); 
     		postData.push(postTd);  
     		}
     	});
		if(postData.length >0){
		if(flag==0){
			$.ajax({
				type:'POST',
				datatype:'json',
				url:'db/fee_chng_pop.php',
				data :{
                                    fee_chng: JSON.stringify(postData)},
				// data:{
				// 	fee_chng:fee_chng,
				// 	fee_chng_grn:fee_chng_grn,
				// 	fee_chng_lfee:fee_chng_lfee,
				// 	fee_chng_amount:fee_chng_amount
				// },
				success:function(e){
					var c=JSON.parse(e);
					if(c['status']=='suceed'){
						alert("Fee added");
						//window.print();
						console.log(c);
						$.ajax({
							type:'POST',
							datatype:'json',
							url:'db/print.php',
							data:{
								c:c
							},
							success:function(f){
								$('.print_rec').html(f);
								
							}
						});
						//$('.fee_chng_form').trigger('reset');
						
					}
					else{
						alert('Duplicate entry, please delete duplicate value from "Search Student" to make changes');
						$('.fee_chng_form').trigger('reset');
					}
				}
			});
		}
		else{
			alert('please fill mandatory fields');
		}
	}
	else
		alert("Please add any fee");
	});
	
 function cheque(){
	var c_show=$('select[name="fee_chng_form_paym"]').val();
	
	if(c_show=='cheque'){	
	$('input[name="fee_chng_form_chq"]').css({'visibility':'visible'});
	}
	else{
		$('input[name="fee_chng_form_chq"]').css('visibility','hidden');
	}
}

// Added : 05-Jan-2014 | For multiple fee 
//function to delete added fee | Prevent default 
function deleteAddedFee(obj)
{
	event.preventDefault();	 
	// alert($(obj).parent());
	$(obj).parent().addClass('deletedFee').hide();//addd class
	return false;
}

var glo;
function fee_type(){
	var fee_chng_mdm=$('span.fee_chng_mdm').text();
	var fee_chng_std=$('span.fee_chng_std').text();
	var fee_chng_grn=$('span.fee_chng_grn').text();
	var fee_chng_type=$('select[name="fee_chng_form_fee_type"]').val();
	$.ajax({
		type:'POST',
		datatype:'json',    
		url:'db/fee_chng_type.php',
		data:{
			fee_chng_type:fee_chng_type,
			fee_chng_mdm:fee_chng_mdm,
			fee_chng_std:fee_chng_std,
			fee_chng_grn:fee_chng_grn
		},
		success:function(e){
			var chck=JSON.parse(e);
			//console.log(chck);
                        
                        glo = chck['one_time'];
			if(chck['status']=="suceed")
                        {
				//ADDED FOR BAL AMOUNT OF ADMISSION
                             if(fee_chng_type=="Admission Fee" || fee_chng_type=="Sports") 
                               {
								   if(glo=="Per Year")
                                    if(chck['count']==0)
                                    {
                                        $('.fee_chng_form_hide').html(chck['data']);
                                        $('.fee_chng_form_hide_1').html(chck['fee']);
                                        $('.fee_chng_form_hide_4').html(chck['fee']);
                                        $('.fee_chng_form_hide_2').html(chck['lfee']);
                                        document.getElementById("Dischide").style.display = "block";
                                        document.getElementById("Resnhide").style.display = "block";
                                        document.getElementById("Paidhide").style.display = "block";
                                        
                                    }
                                    else
                                    {
                                        $('.fee_chng_form_hide').html(chck['data']);
                                        $('.fee_chng_form_hide_1').html(chck['bal']);
                                        $('.fee_chng_form_hide_4').html(chck['bal']);
                                        $('.fee_chng_form_hide_2').html(chck['lfee']);
                                        document.getElementById("Dischide").style.display = "block";
                                        document.getElementById("Resnhide").style.display = "block";
                                        document.getElementById("Paidhide").style.display = "block";
                                    }
                                    
                                }
                                else
                                {
                                    $('.fee_chng_form_hide').html(chck['data']);
                                    $('.fee_chng_form_hide_1').html(chck['fee']);
                                    $('.fee_chng_form_hide_4').html(chck['fee']);
                                    $('.fee_chng_form_hide_2').html(chck['lfee']);
                                    document.getElementById("Dischide").style.display = "none";
                                    document.getElementById("Resnhide").style.display = "none";
                                    document.getElementById("Paidhide").style.display = "none";
                                    
                                }
				//$('.fee_chng_form_hide_3').html(chck['late']);
			}
			else{
				alert('No fee found to matching criteria, please add fee via admin panel');
				$('.fee_chng_form').trigger('reset');
			}
		}
	});
}
/* add fee -> amount monthly fee*/
 $(document).on('click','.sel_mon',function(){
	var count=0;
	$('span.fee_chng_form_hide').find('.sel_mon').each(function(){
		if($(this).is(':checked')){
			count++;
		}
	});
	var val=$('.fee_chng_form_hide_4').text();
	val=val*count;
	if(count>0){
		$('.fee_chng_form_hide_1').html(val);
	}
 });
 /*add fee-> late fee column */
 $(document).on('change','select[name="fee_chng_form_ot"]',function(){
	if($(this).val()=='no'){
		$('.fee_chng_form_hide_2').css('display','inherit');
	}
	else{
		 $('.fee_chng_form_hide_2').css('display','none');
	}
 });
 /* add feee-> late fee column->monthly fee*/
 $(document).on('click','.sel_late',function(){
	//alert('hurrah');
	var count=0;
	$('span.fee_chng_form_hide').find('.sel_late').each(function(){
		if($(this).is(':checked')){
			count++;
		}
	});
	var val=$('.fee_chng_form_hide_2').text();
	//console.log(val);
	val=val*count;
	//console.log(val);
	if(count>0){
		$('.fee_chng_form_hide_3').html(val);
		$('.fee_chng_form_hide_3').css('display','inherit');
	}
	else{
		$('.fee_chng_form_hide_3').css('display','none');
	}
 });
 
 $(document).on('click','.print_add_fee',function(){
	window.print();
 });
/* search students*/
$(document).on('click','.sch_src_sub',function(event){
	event.preventDefault();		
	var sch_src=$('.sch_src').serialize();
	flag=0;
	$('.sch_src').find('input').each(function(){
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
				sch_src:sch_src,
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
$(document).on('click','.sch_src_name_sub',function(event){
	event.preventDefault();
	var sch_src_name=$('.sch_src_show_name').serialize();
	var flag7=0;
	$('.sch_src_show_name').find('input').each(function(){
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
				sch_src_namee:sch_src_name
			},
			success:function(e){
				$('div.sch_src_details_name').html(e);	
			}
		});	
	}
	else{
		alert('please Enter Name');
	}
});

$(document).on('click','.name-search-2-sub',function(event){
	event.preventDefault();
	//console.log($(this).attr('id'));
	var sch_src=$('.'+$(this).attr('id')).text();
	//console.log(sch_src);
	$.ajax({
		type:'POST',
		datatype:'json',
		url:'db/src_std.php',
		data:{
			count:'2',
			sch_src:sch_src
		},
		success:function(e){
			$('div.search-div').html(e);
			//window.location.reload();
		}
	});

});


$(document).on('click','.delete-fee',function(event){
	event.preventDefault();
	var id=$(this).attr('id');
//	console.log(id);
	var fee_rec=$('.rec-'+id).text();
	var fee_typ=$('.feet-'+id).text();
	var fee_mon=$('.mon-'+id).text();
	var fee_grn=$('.src_grn').text();
	//console.log(fee_typ);
	$.ajax({
		type:'POST',
		datatype:'json',
		url:'db/delete-fee.php',
		data:{
			fee_typ:fee_typ,
			fee_grn:fee_grn,
			fee_rec:fee_rec,
			fee_mon:fee_mon
		},
		success:function(e){
		//console.log(id);
			$('ul.'+id).slideUp('slow');
			alert('Fee entry Deleted');
		}
	});
});

 /* revenue.php*/
$(document).on('click','.rev-revenue',function(){
	$.ajax({
		url:'db/rev-revenue.php',
		method:'POST',
		datatype:'json',
		success:function(e){
			$('.rev-div-main').html(e);
		}
	});
});
$(document).on('click','.rev-recieve',function(){
	$.ajax({
		url:'db/rev-recieve.php',
		method:'POST',
		datatype:'json',
		success:function(e){
			$('.rev-div-main').html(e);
		}
	});
});
$(document).on('click','li.logout-span',function(){
	//alert('here');
	$.ajax({
		url:'logout.php',
		method:'POST',
		datatype:'json',
		success:function(e){
			alert('successfully logged out');
			window.location='index.php';
		}
	});
});

/* Transaction Page*/
$(document).on('click','.srch-fee-sub',function(){
	var strdate=$('input[name="srch-str-date"]').val();
	var enddate=$('input[name="srch-end-date"]').val();
	//console.log(strdate);
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

$(document).on('click','.callAjax',function(){
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
	//console.log(mode);
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

$(document).on('click','.rev-pend',function(){
	//alert('here');
	$.ajax({
		url:'db/pend.php',
		method:'POST',
		datatype:'json',
		success:function(e){
			$('div.rev-div-main').html(e);
		}
	});
});



//ADDED FOR ADDMISSION DETAILS 


$(document).on('click','.rev-add',function(){
	//alert('here');
	$.ajax({
		url:'db/adm.php',
		method:'POST',
		datatype:'json',
		success:function(e){
			$('div.rev-div-main').html(e);
		}
	});
});


 /* division dynamic*/
function div_count(){
	var mdm=$("select[name='sch_ads_mdm']").val();
	var std=$("select[name='sch_ads_std']").val();
//	console.log(mdm,std)
	$.ajax({
		url:'db/div_count.php',
		method:'POST',
		datatype:'json',
		data:{
			mdm:mdm,
			std:std
		},
		success:function(e){
			var div=JSON.parse(e);
			var block='Division: <select name="sch_ads_div" class="mando">';
			$.each(div['data'],function(index,value)
                        {
				block=block+'<option value='+value+'>'+value+'</option>'
			});
			block=block+'</select>';
			//console.log(block);
			$("div.div-update-show").html(block);
		}
	});
}







function div_count1(){
	var mdm=$("select[name='sch_updc_show_mdm']").val();
	var std=$("select[name='sch_updc_show_std']").val();
	//console.log(mdm,std)
	$.ajax({
		url:'db/div_count.php',
		method:'POST',
		datatype:'json',
		data:{
			mdm:mdm,
			std:std
		},
		success:function(e){
			var div=JSON.parse(e);
			var block='Division: <select name="sch_updc_show_div" class="mando">';
			$.each(div['data'],function(index,value){
				block=block+'<option value='+value+'>'+value+'</option>'
			});
			block=block+'</select>';
			//console.log(block);
			$("div.div-update-show").html(block);
		}
	});
}
$(document).on('change','.update-to',function(){
	var mdm=$("select[name='update-mdm']").val();
	var std=$("select[name='update-to']").val();
	//console.log(mdm,std)
	//alert('here');
	$.ajax({
		url:'db/div_count.php',
		method:'POST',
		datatype:'json',
		data:{
			mdm:mdm,
			std:std
		},
		success:function(e){
			var div=JSON.parse(e);
			var block='Division: <select name="sch_updc_show_div" class="mando">';
			$.each(div['data'],function(index,value){
				block=block+'<option value='+value+'>'+value+'</option>'
			});
			block=block+'</select>';
			//console.log(block);
			$("select[name='update-sec']").html(block);
		}
	});
});


/*
function clicked(){
    var fr = $("select[name='sch_ads_type']").val();
    
    if(fr=="admission"){
        
     location.href = "../School/Std_Form.php";   
    }
};
*/
