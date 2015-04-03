 <?php
	include('../attach/header_sch.php');	
	?>
	<div class="span-right" style="width: 1134px;">
		<div class="main-container">
		<div class="post-header">
			<span>Search By Date</span>
		</div>
		<div class="post-content">
			<div class="post-text">
					<div class="box-left">
						 Start date:<input type="date" name="srch-str-date">
					</div>
					<div class="box-right">
						 End Date:<input type="date" name="srch-end-date">
					</div>
					<div class="box-right">
						<button class="srch-fee-sub"><span>Submit</span></button>
					</div>
			</div>
		</div>
		<div class="post-header">
			<span>Search By Payment Mode</span>
		</div>
		<div class="post-content">
			<div class="post-text">
				<form class="srch-mode"  method="post">
					<div class="box-left">
						 Mode:<Select class="srch-mode-name">
								<option value="Default">Choose One</option>
								<option value="Cash">Cash</option>
								<option value="Cheque">Cheque</option>
							</select>
					</div>
					<div class="box-right">
						<button class="srch-mode-sub"><span>Submit</span></button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="show-by-date" style="font-family: initial; font-weight: 700;">
	</div>
</div>
 <?php
	include('../attach/footer_sch.php');
?>