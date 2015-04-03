<?php
	include('../../db.php');
	//echo(date("Y-m-d"));
	//$query=mysqli_query($con,"select * from expenses where date='".date("Y-m-d")."'");
	//$i=0;
	$toal_Today_Exp = 0 ;
	$fee=0;
		$late=0;
		$str=$_POST['sdate'];
		$end=$_POST['edate'];
		$query=mysqli_query($con,"select * from expenses where date between '$str' and '$end' order by date DESC");
	?>
          <!--       <div class="span-right" style="width: 1072px;">
		<div class="main-container">
			 <div class="post-header" style="width: 1069px;">
				<span>Search By Date</span>
			 </div>
			
                            <div class="post-content">
                                    <div class="post-text">
					<div class="box-left" style="width: 220px;">
						 Start Date:<input type="date" name="start">
					</div>
					<div class="box-right" style="width: 280px;">
						 End Date:<input type="date" name="end">
					</div>					
                                    </div>
                               
                            </div>
                     <button style="margin-left: 510px;" id="call" class="callAjax"><span>Show</span></button>
                       
                </div>
                    
                    
                    <div class="show-by-date">
  
                </div>
                </div>
      
                -->
                    
      

		<div class="span-right" id="today">
		<div class="main-container">
		<div class="post-header">
		<span>Total Expenses (Today)</span>
		</div>
		<?php
		if(mysqli_num_rows($query)!=0){
		?>
		<div class="post-content">
				<!-- Modified By : Ranjeet|| 22-Dec || Added class  post-text-today with width :100% || fixed overlap  -->
                                <div class="post-text-today" style=" width:auto; height:auto;overflow:auto">
					<ul class="table-view" style="margin-left: 0px; width:auto">
					<li class="table-view-header" style="width:100px;">
							Admin_Id
						</li>
						<li class="table-view-header" style="width:100px;">
							Receipt No
						</li>
						<li class="table-view-header" style="width:100px;">
							Name
						</li>
						<li class="table-view-header" style="width: 100px;">
							Mode

						</li>
						<li class="table-view-header" style="width:100px;">
							Cheque_no
						</li>
						<li class="table-view-header" style="width: 100px;">
							Amount
						</li>
						<li class="table-view-header" style="width: 100px;">
							Remark
						</li>
                        <li class="table-view-header" style="width:100px;">
							Date
						</li>
					</ul>
                            
					<?php
                                            while($result=mysqli_fetch_row($query))
                                        {				
							
					?>
					<ul class="table-view" style="margin-left:0px; width:auto">
						
						<li class="table-view-header" style="width: 100px;">
							<?php echo $result[0] ; ?>
						</li>
						<li class="table-view-header" style="width: 100px;">
							<?php echo $result[1];?>
								
						</li>
						<li class="table-view-header" style="width: 100px;">
							<?php echo $result[2]; ?>
						</li>
						<li class="table-view-header" style="width: 100px;">
							<?php echo $result[3]; ?>
						</li>
						<li class="table-view-header" style="width: 100px;">
							<?php echo $result[4]; ?>
                                                        
	                 <?php $toal_Today_Exp += $result[5]; ?>
						</li>
						<li class="table-view-header" style="width: 100px;">
							<?php echo $result[5]; ?>
						</li>
                        <li class="table-view-header" style="width: 100px;">
							<?php echo $result[6]; ?>
						</li>
						<li class="table-view-header" style="width: 100px;">
							<?php echo $result[7] ; ?>
						</li>
						
					</ul>
			
			
                    <?php
                    }
                    ?>
                    </div>
                    <ul class="table-view" style="margin-left:0px; width:auto">
                                    <!--<hr>-->
					<li class="table-view-header" style="width:100px;margin-left: 210px;">
                                            
						Total Today Expenses
					</li>
					<li class="table-view-header" style="width:100px;margin-left:;">
						<?php echo $toal_Today_Exp;?>
					</li>
					
					
				</ul>
                </div>
		
		
	<?php
	}
	else{
	?>
	<div class="post-content">
	No Expenses History For Today
	</div>
                    
                    <?php
	}
?>
	</div>
                </div>
	
	<?php
	//include('../attach/footer_sch.php');
?>