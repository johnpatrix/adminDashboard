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

			$sql_select_query="select * from bill_office_expenditure";
			$result=$this->connectDB()->query($sql_select_query);
			$numRows=$result->num_rows;
			if($numRows >0){
				while($row=$result->fetch_assoc())
				{
					$data[]=$row;
				}
				return $data;
			}
		}
		

		protected function insertNewFuelBillData($valuesInsert)
		{
			
				 $sql_insert_query="INSERT INTO bill_office_expenditure(Batch_id,Bill_Sl_No,Bill_No,Bill_Date,Particulars,Quantity,Rate,Amount,Bill_type) Values ";
				 $noElements=count($valuesInsert);
				if($noElements>0){
					$count=0;
					foreach($valuesInsert as $row){
						$row_input="(";
						$counter=0;

						foreach($row as $element){
							if($counter!=8){
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
		}

		protected function deleteFuelBillData($batch_id,$bill_type)
		{
			$sql_select_query="delete from bill_office_expenditure where Batch_id ='".$batch_id."' and Bill_type=".$bill_type;
			$result=$this->connectDB()->query($sql_select_query);
			if($result == true)
				return 1;
			else
				return 2;
			

		}
		protected function select_billType_by_batchID($batch_id)
		{
			$sql_select_query="select DISTINCT bill_type from bill_office_expenditure where batch_id='".$batch_id."'";
			$result=$this->connectDB()->query($sql_select_query);
			$numRows=$result->num_rows;
			if($numRows >0)
			{
				while($row=$result->fetch_assoc())
				{
					$data[]=$row;
				}
				return $data;
			}			
		}



		//end of insertNewBillData
// Bill Type statements
		protected function getBillTypeName($billTypeName_id) //0 for all, else pass the id
		{
			$sql_select_query="Select Bill_Type_Name from bill_type where Bill_id=".$billTypeName_id;

			$sql_select_all_query="Select Bill_id,Bill_Type_Name from bill_type";
			$result="";
			if($billTypeName_id!= '0')
			{
				$result=$this->connectDB()->query($sql_select_query);
				$row=$result->fetch_assoc();
				return $row['Bill_Type_Name'];
			}
			else
			{
				$result=$this->connectDB()->query($sql_select_all_query);

					$numRows=$result->num_rows;
				if($numRows >0){
					while($row=$result->fetch_assoc())
					{
						$data[]=$row;
					}
					return $data;
				}
			}

			
		}

		protected function getBillTypeByName($billName)
		{
			$sql_select_query="Select Bill_id from bill_type where Bill_Type_Name= '".$billName."'";
			$result=$this->connectDB()->query($sql_select_query);
			$numRows=$result->num_rows;
			if($numRows>0)
				return true;
			else 
				return false;
		}

		protected function insertBill_Type($bill_type)
		{
			 $sql_insert_query="INSERT INTO bill_type(Bill_Type_Name) Values ('".$bill_type."')";
			 if ($this->connectDB()->query($sql_insert_query) === TRUE) {
		   			 return 1;
				} else {
	  			 	 return 2 ;
				}
		}

		protected function deleteBill_Type($bill_id) //this will delete the bill type
		{
			$sql_delete_query="delete from bill_type where Bill_id =".$bill_id;

			$result=$this->connectDB()->query($sql_delete_query);
			if($result == true)
				return 1;
			else
				return 2;
		}



		//end of bill type statment
		protected function getBatchName()
		{
			$sql_select_query="select DISTINCT Batch_id from bill_office_expenditure";
			$result=$this->connectDB()->query($sql_select_query);
			$numRows=$result->num_rows;
			if($numRows >0){
				while($row=$result->fetch_assoc())
				{
					$data[]=$row;
				}
				return $data;
			}
		}

/*
this function will play two role
1. if $bacth id and $bill type are passed , data will be retrived accordingly -> return the data
2. if $batch id is 0 , and $bill type is set, it will check if data for particular bill type exist or not
	return 1 if data exist for that particular $bill type
	return 0 if data doesnt exist, hence safe to delete bill type

*/
		protected function getBatchData($batch_id,$bill_type) //trying to retrive all the expenditure based on bill type and batch id
		{
			
			$sql_select_query="select Bill_id,Batch_id,Bill_Sl_No,Bill_No,date_format(`Bill_Date`,'%d-%m-%Y'),Particulars,Quantity,Rate,Amount from bill_office_expenditure where Batch_id ='".$batch_id."' and Bill_type=".$bill_type;

			$sql_select_billType="select Bill_Sl_No from bill_office_expenditure where Bill_type=".$bill_type;

			if($batch_id!="")
			{
				$result=$this->connectDB()->query($sql_select_query);
				$numRows=$result->num_rows;
				if($numRows >0){
					while($row=$result->fetch_assoc())
					{

						$data[]=$row;
					}
				return $data;
				}

			}
			else
			{
				$result=$this->connectDB()->query($sql_select_billType);
				$numRows=$result->num_rows;
				if($numRows >0){					
				return 1; //1 data exist
				}
				else
					return 0;//data doesnt exist

			}


			
			
		}

		
		

	}


?>
