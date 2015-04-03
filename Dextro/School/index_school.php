<!-- user panel -->

<?php
		include('../attach/header_sch.php');
		// $query=mysqli_query($con,"select fee,one_time,medium,std from sch_cls_fee");
		// $i=0;
		// $rev=0;
		// $late=0;
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
		// $income=0;
		// $query=mysqli_query($con,"select amount,late_fee,lflag from sch_tran");
		// $i=0;
		// while($jd=mysqli_fetch_row($query)){
				// $income=$income+$jd[0];
			// if($jd[2]=='no'){
			// $late=$late+$jd[1];
			// }	
		// }
		$query1=mysqli_query($con,"SELECT (SELECT SUM( a.Amount )+SUM(a.late_fee) FROM adm_sch_tran AS a where a.date=CURDATE() )+ 
                (SELECT SUM( a.Amount )+ SUM(a.late_fee) FROM sch_tran AS a where a.date=CURDATE() )");
		$today=mysqli_fetch_row($query1);
		//$today=0;
		//while($tod=mysqli_fetch_row($query1)){
		//	$today=$today+$tod[2]+$tod[10];
		//}
    	//	$get=($income+$late);
?>
	<div class="span-right">
		<div class="main-container">
			 <div class="post-header">
				<span> Home</span>
			 </div>
			 <div class="post-content">
				<div class="post-text">
					<ul class="home-menu">
						<a class="home-menu-link" href="revenue.php">
							<!--<li class="home-menu-li">
								<span>
    									<?php echo ("Revenue = ".$get )?>
								</span>
							</li>-->
						</a>
						<a class="home-menu-link" href="today.php">
							<li class="home-menu-li">
								<span>
										<?php echo ("Todays = ".$today[0])?>
								</span>
							</li>
						</a>
					</ul>
				</div>
			 </div>
		</div>
	
	</div>
		<?php
		include('../attach/footer_sch.php');
	
?>