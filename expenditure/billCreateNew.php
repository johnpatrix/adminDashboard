<div>
	
	<div class="col-sm-3"><label>Enter a Batch Name: &nbsp </label><input type="text" id="Batch_id" autocomplete="off"></input></div>
	<div class="col-sm-3"><label>Select Bill type: &nbsp </label>

		<select id="bill_Type_name" name="billType_name" class="custom-select custom-select-sm mb-3">
							<option selected value="0" > --Select Bill Type Name-- </option>
							<?php  
								$data=$view_bills->getBillTypeData(0); 
								foreach ($data as $key) {
									echo "<option value='".$key['Bill_id']."' >".$key['Bill_Type_Name']."</option>";
								}
							  ?>
		</select>


	</div>
	

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