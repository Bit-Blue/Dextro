<?php 
include('../../db.php');
$c=$_POST['c'];
// print_r($c);
$header=mysqli_fetch_row(mysqli_query($con,"select Name,logo from info where key_p='007'"));

?>

<div class="container" style="boder:solid;width:1116px;height:auto;">

    <style type="text/css">
    	.set-height{
    		height:20px;
    	}
    </style>

        <div class="header" style="display: flex">
		<div>
                    <img style=" margin-left: 130px; margin-right: 93px;margin-top: 9px;" src='../admin/school/<?php echo $header[1] ?>'/>
                </div>
		<div style=" margin-left: 0px; margin-right: 0px; margin-top: 25px; font-family: initial; font-weight: 600; font-size: larger;">
			<?php echo $header[0] ?>
		</div>
	</div>
	<div class="post-content">
		<div class="post-text" style="width:740px">
			<div class="box-left">
				Reciept Number:
				<span style="width50px">
					<b><?php echo $c['fees'][0]['rec'];?></b>
				</span>
			</div>
			<div class="box-right">
				Date:
				<span style="width50px">
					<b><?php echo date('d-m-Y');?>
				</span>
			</div>
			<div class="box-left">
				Name:
				<span style="width50px">
					<b><?php echo $c['det'][0];?></b>
				</span>
			</div>
			<div class="box-right">
				Medium:
				<span style="width50px">
					<b><?php echo $c['det'][1];?></b>
				</span>
			</div>
			<div class="box-left">
				Standard:
				<span style="width50px">
					<b><?php echo $c['det'][2];?></b>
				</span>
			</div>
			<div class="box-right">
				Session:
				<span style="width50px">
					<b><?php echo date('Y');?></b>
				</span>
			</div>  
                    
                        <div class="box-left">
				Enroll Number:
				<span style="width50px">
					<b><?php echo $c['fees'][0]['Gr'];?></b>
				</span>
			</div>
                    
       
			<!-- <div class="box-left">
				Fee type:
			<span style="width50px">
					<b><?php print_r($c['typ']);?></b>
				</span>
			</div> -->
			<!-- <div class="box-right">
				Payment Mode:
				<span style="width50px">
					<b><?php echo $c['pay_mode'];?></b>
				</span>
			</div> -->
			<!-- <div class="box-left">
				Cheque Number
				<span style="width50px">
					<b><?php echo $c['chq'];?></b>
				</span>
			</div> -->
            <div style="margin-left:-50px;">
			<ul class="table-view" style="width: auto">
			<li class="table-view-header" style="width:100px;">
					Fee Type
				</li>
				<li class="table-view-header" style="width:100px;">
					Month
				</li>
				<li class="table-view-header" style="width:80px;">
					Amount
				</li>
                                <li class="table-view-header" style="width:80px;">
					Balance
				</li>
				<li class="table-view-header" style="width:80px;">
					Pay Mode
				</li>
				<li class="table-view-header" style="width:100px;">
					cheque #
				</li>
				<li class="table-view-header" style="width:100px;">
					Late Fee
				</li>
				
			</ul>
		
			<?php 
				$late_fee=0;
				$fee=0;
				foreach ($c['fees'] as $key => $value) {
				
				// if($c['month']!='One time'){
					// Commented :  Ranjeet | 05-Jan-14 | To show Multiple added fee
					// foreach($c['month'] as $mon){
						?>
						<ul class="table-view" style="width: auto">
						<li style="width:100px;" >
								<?php echo $value['typ'] ;?>
							</li>
							<li style="width:100px;" >
								<?php echo $value['month'] ;?>
							</li>
							<li style="width:80px;" >
								<?php 
								echo $value['amount'];
								$fee=$fee+$value['amount'];
								?>
							</li>
							<li style="width:80px;" >
								<?php 
								echo $value['bal'];
								?>
							</li>
                                                        
                                                        <li style="width:80px;" >
								<?php 
								echo $value['pay_mode'];
								?>
							</li>
							<li style="width:100px;" >
								<?php 
								echo $value['lfee'];
								?>
							</li>
							<li style="width:100px;">
								<?php echo  $value['chq'];
									
								$late_fee = $late_fee + $value['chq'];
								?>
							</li>
							
						</ul>
						<?php
					}
				// }
				
			?>
                                                <ul class="table-view" style="margin-right: 120px;">
							
							<li style="width:120px;" class="table-view-header" >
								<?php echo "Amount: ".$fee;?>
							</li>
							<li style="width:120px;" class="table-view-header">
								<?php echo "Late fee:".$late_fee;?>
							</li>
							<li style="width:130px;" class="table-view-header">
								<?php echo ("Total Amount: "); echo($late_fee+$fee);?>
							</li>
						</ul>
		</div>
<button style="margin-right: 200px;" class="no-print print_add_fee"><span>Print</span></button>
		</div>
	</div>
</div>

