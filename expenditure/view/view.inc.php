<?php
/**
author: MetalMark
Date:30/07/2019

 * 
 */
class viewBill extends curdBill
{
	
	public  function showBill()
	{
		$data=$this->getBillData();
		foreach ($data as $dataum){
			echo $dataum['Bill_id']." ---- ";
			echo $dataum['Particulars']."<br>";
		}
	}

	public function insertFuelBill($row_data,$batch_id,$bill_type)
	{
		if( !is_null($this->getBatchData($batch_id,$bill_type)))
		{
			$this->deleteFuelBillData($batch_id,$bill_type);
		}		
			$this->insertNewFuelBillData($row_data);
	}
	//bill type
	public function insertBillType($billType)
	{
		if( !$this->getBillTypeByName($billType)) //Bill type name doesnt exit
		{
			$result = $this->insertBill_Type($billType);
			if($result ==1)
				return "Successfully Inserted";
			else 
				return "Error in Inserting the data , Kindly Contact the Administrator";
		}
			return "Data already exist in the Database";



	}
	public function getBillTypeData($value) //this will get the bill type from bill type table
	{
		$data=$this->getBillTypeName($value);
		return $data;
		
	}

	public function deleteBillType($value) //this will delete the bill type from bill type table
	{
		if($this->getBatchData(0,$value) == 0)
		{
			$data=$this->deleteBill_Type($value);
			if($data == 1)
			{
				return "Successfully deleted";
			}
			else
				return "There was an error deleting the data, Kindly contact Administrator";
		}
		else
		{
			return" Cannot delete the Bill Type,since there are bill statements of this Bill type. Kindly delete the bill statment or contact the Developer <br> Thank You "; 

		}
		

	}
	//end bill type

	public function getExpenditureTableHeader() //return the bill header page
	{
		$fuelBill = array("Sl.No","Bill_No","Date (dd-mm-yy)","Particulars","Qty","Rate","Total Amount" );
		$counter=false;

		foreach ($fuelBill as $value) {
			if($counter ==true)
			{
				echo "<input type=text disabled='disabled' id='".$value."_attrib"."' value='".$value."'></input>";
			}
			else
			{
				echo "<input type=text disabled='disabled' size='5' id='".$value."_attrib"."' value='".$value."'></input>";
				$counter=true;
			}
			
		}
	}
	public function getFuelBatchID()
	{
		$data=$this->getBatchName();
		foreach($data as $batch_id)
		{
			echo "<option value='".$batch_id['Batch_id']."' >".$batch_id['Batch_id']."</option>";
		}

	}
	//this function is called by edit Bill page
	public function getFuelBatchData($batch_id,$bill_type){

		$data=$this->getBatchData($batch_id,$bill_type);
		return $data;

	}
	public function deleteFuelBill($batch_id,$billtype)
	{
		
		if( $batch_id !='0' && $billtype !='0')
		{
			$data=$this->deleteFuelBillData($batch_id,$billtype);
			if($data == 1)
			{
				return "Successfully Deleted!";
			}
			else
			return "There was an error deleting the data, Kindly contact Administrator";
		}
		else
			return " You have not selected all the options";
		
	}
	public function getbilltype_by_batchid($batchID)
	{

		$data=$this->select_billType_by_batchID($batchID); //need to modify this to return bill type
		$options_value="<option selected value='0' >--Select Bill Type--</option>";


		foreach($data as $key)
		{
			$options_value.= "<option value='".$key['bill_type']."'>".$this->getBillTypeName($key['bill_type'])."</option>";
		}
		//$options_value.="</select>";
		return $options_value;
	}
}



?>