<?php
session_start();
session_cache_expire (15); 
$cache_expire = session_cache_expire(); 	
if($_SESSION['type']=='School'){
include('../db.php');
	$header_query=mysqli_query($con,'SELECT name,logo from info where Key_p="007"');
	$header_name=mysqli_fetch_row($header_query);
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../css/index.css"/>
		<link rel="stylesheet" type="text/css" media="print" href="../css/print.css">
                <meta content="utf-8" http-equiv="encoding">
                
                <!--added-->
                <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
                
               
        <style type="text/css">

body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt "Tahoma";
}
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.page {
   width: 21cm;
    padding: 2cm;
    margin: 1cm auto;
}
.subpage {
    padding: 1cm;
    border: 10px rgb(52,73,94) solid;
    height: 256mm;
//    outline: 2cm #FFEAEA solid;
}


    .my {
        height: 842px;
        width: 595px;
        /* to centre page on screen*/
        margin-left: auto;
        margin-right: auto;
    }

</style>    
                
	</head>
	<body>
	<div class="wrapper">
		<div class="nav-bar">
			<div class="nav-bar-inner">
				<div class="menu-container">
					<h3><?php echo $header_name[0];?></h3>
				</div>
				<div class="sub-container">
					<ul class="sub-container-menu">
						<li class="header-menu">
						Hello, <?php echo $_SESSION['uname'];?>
						</li>
						<li class="header-menu">
						Account Type:<?php echo $_SESSION['type'];?>
						</li>
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
					 <a class="left-menu-link" href="add_std.php"><li class="left-menu-li"><span>Add Student</span></li></a>
						 <a class="left-menu-link" href="upd_cls.php"><li class="left-menu-li"><span>Update Class</span></li></a>
						 <a class="left-menu-link" href="add_fee.php"><li class="left-menu-li"><span>Add fee</span></li></a>
						 <a class="left-menu-link" href="tran.php"><li class="left-menu-li"><span>Transaction</span></li></a>
						 <a class="left-menu-link"href="src_std.php"><li class="left-menu-li"><span>Search student</span></li></a>
                                                 <a class="left-menu-link"href="addBonafide.php"><li class="left-menu-li"><span>Bonafide</span></li></a>
                                                 <a class="left-menu-link"href="expenses.php"><li class="left-menu-li"><span>Expenses</span></li></a>
                                                 <a class="left-menu-link"href="enquiry.php"><li class="left-menu-li"><span>Enquiry</span></li></a>
					 </ul>
				</div>
				<?php
				}
				else{
						header('Location: ../');
				}
				?>

                            
                            