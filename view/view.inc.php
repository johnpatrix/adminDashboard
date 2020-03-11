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

	public function insertFuelBill($row_data,$batch_id)
	{
		if( !is_null($this->getBatchData($batch_id)))
		{
			$this->deleteFuelBillData($batch_id);
		}		
			$this->insertNewFuelBillData($row_data);
	}

	public function getExpenditureTableHeader()
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
	public function getFuelBatchData($batch_id){

		$data=$this->getBatchData($batch_id);
		return $data;

	}
	public function deleteFuelBill($batch_id)
	{
		$data=$this->deleteFuelBillData($batch_id);
		if($data == 1)
		{
			return "Successfully Deleted!";
		}
		else
		return "There was an error deleting the data, Kindly contact Administrator";
	}


}



?>