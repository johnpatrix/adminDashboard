<?php
/**
author: MetalMark
Date:30/07/2019
this class will get the bill data
 * 
 */

	class curdBill extends connection_db{
	
		protected $result;
		protected $numRows;
		protected function getBillData()
		{

			$sql_select_query="select * from bill_fuel_expenditure";
			$result=$this->connectDB()->query($sql_select_query);
			$numRows=$result->rowCount();
			if($numRows >0){
				while($row=$result->fetch(PDO::FETCH_ASSOC))
				{
					$data[]=$row;
				}
				return $data;
			}
		}
		

		protected function insertNewFuelBillData($valuesInsert)
		{
			
				 $sql_insert_query="INSERT INTO bill_fuel_expenditure(Batch_id,Bill_Sl_No,Bill_No,Bill_Date,Particulars,Quantity,Rate,Amount) Values ";
				 $noElements=count($valuesInsert);
				if($noElements>0){
					$count=0;
					foreach($valuesInsert as $row){
						$row_input="(";
						$counter=0;

						foreach($row as $element){
							if($counter!=7){
								if($counter == 3){								
									$row_input.="DATE_FORMAT(STR_TO_DATE('".$element."','%d-%m-%Y'),'%Y-%m-%d'),";
								}else
								$row_input.="'".$element."',";
							}
							
							else{
								$row_input.="'".$element."'";
							};
							$counter++;

						}
						if($count!=$noElements-1)
							$row_input.="),";
						else
							$row_input.=")";
						$count++;
						$sql_insert_query.=$row_input;				
					}				
				}			

				if ($this->connectDB()->query($sql_insert_query) === TRUE) {
		   			 echo "New record created successfully";
				} else {
	  			 	 echo "Error: " ;
				}
			
			//end testing
		}//end of insertNewBillData


		protected function getBatchName()
		{
			$sql_select_query="select DISTINCT Batch_id from bill_fuel_expenditure";
			$result=$this->connectDB()->query($sql_select_query);
			$numRows=$result->rowCount();
			if($numRows >0){
				while($row=$result->fetch(PDO::FETCH_ASSOC))
				{
					$data[]=$row;
				}

				return $data;
			}
		}

		protected function getBatchData($batch_id)
		{
			
			$sql_select_query="select Bill_id,Batch_id,Bill_Sl_No,Bill_No,date_format(`Bill_Date`,'%d-%m-%Y'),Particulars,Quantity,Rate,Amount from bill_fuel_expenditure where Batch_id ='".$batch_id."'";
			$result=$this->connectDB()->query($sql_select_query);
			$numRows=$result->rowCount();
			if($numRows >0){
				while($row=$result->fetch(PDO::FETCH_ASSOC))
				{

					$data[]=$row;
				}
				return $data;
			}
			
		}

		protected function deleteFuelBillData($batch_id)
		{
			$sql_select_query="delete from bill_fuel_expenditure where Batch_id ='".$batch_id."'";
			$result=$this->connectDB()->query($sql_select_query);
			if($result == true)
				return 1;
			else
				return 2;
			

		}
		

	}


?>
