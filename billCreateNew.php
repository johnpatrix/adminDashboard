<div>
	
	<div><label>Enter a Batch Name &nbsp </label><input type="text" id="Batch_id"></input></div>
	<br><br>

	<script src="js/gridLayout.js"></script>

	<div id="gridView_div"> 
		<?php 
			$view_bills->getExpenditureTableHeader();
		?>
		
		<script type="text/JavaScript">
			add_NewGridRow(7);			
		</script>
		
	</div>	
</div>