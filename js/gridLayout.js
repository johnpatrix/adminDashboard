var no_cells=0;
var row_id=0;
var dirtyBit=0;
//this function will add a new row, on pressing the enterkey
//@author MetalMarks
//@param no_cell holds value of number of cells needed to be created
//@param row_id holds the row'th number also it is optional when it is called from the function
function add_NewGridRow(no_cells,row_id=this.row_id)
{
	window.no_cells=no_cells;
	window.row_id=row_id;
	//--------------Auto fill variables-----------------
	var previous_sl=1;

	//-----------------end Auto Fill variables------------
	var gridView_div=document.getElementById("gridView_div");
	var element_div = document.createElement("div");

	// <div class="alert-close">×</div>




	var button_delete=document.createElement("Span");
	var content = document.createTextNode(" X");
	button_delete.setAttribute("class","alert-close");
	button_delete.appendChild(content);
	

	element_div.setAttribute("id", "row_"+row_id);

	for(counter=0;counter<no_cells;counter++)
	{
			
			element_div.appendChild(createRow(row_id,counter));
		
	}
	element_div.appendChild(button_delete);
	gridView_div.appendChild(element_div);
	window.row_id++;

	//this is for focus on the first element after creating it
	document.getElementById("row_"+(window.row_id-1)+"_col_"+"0").focus();
	
	//this function will listen for the enter key in the last text box	
	var lastTextBox=document.getElementById('row_'+(this.row_id-1)+'_col_'+(this.no_cells-1));
	lastTextBox.addEventListener("keydown", function (e) {
    		if (e.keyCode === 13) {  //checks whether the pressed key is "Enter"
        	 add_NewGridRow(window.no_cells);
    		}});}

//this function will collect the inputed value and put it into an array
function submitInputedData()
{
	var row,col;	
	var dataset=[];
	var batchId=document.getElementById("Batch_id").value;
	if(batchId !="")
		{
			for(row=0;row<row_id;row++)
			{
				var tuple=[];
				tuple.push(batchId);
				if( $("input#row_"+row+"_col_0").parent().offset().top > 0 )
				{

					for(col=0;col<no_cells;col++)
					{	
						var element_id="row_"+row+"_col_"+col;

						

						tuple.push(document.getElementById(element_id).value);
					}		
					dataset.push(tuple);
				}
				
			}

			if(dirtyBit ==0){
				$.post( "insertBill.php", {'userData': dataset,'batchId':batchId},function(data){window.location.href='pdfGenerate.php';});
			}
			else if(dirtyBit==1){
				$.post( "insertBill.php", {'userData': dataset,'batchId':batchId},function(data){window.location.href='pdfGenerate.php?dirty=1';});
			}
		}
		else
			alert("Please Enter a Batch id");
		
}

function createRow(row_id,col_id){
	
	var element_input = document.createElement("input");
	if(row_id ==0){ //if it is the first row
			element_input.setAttribute("type","Text");
			element_input.setAttribute("class","cell");
			element_input.setAttribute("id","row_"+row_id+"_col_"+col_id);
			if(col_id==0)
				{
					element_input.setAttribute("size","5");
					element_input.setAttribute("value","1");
				}
			if(col_id == 2)
			{
				element_input.setAttribute("class","datepicker");
				element_input.setAttribute("autocomplete","off");
				element_input.setAttribute("onfocus","$(this).datepicker({ dateFormat: 'dd-mm-yy', onSelect: function (){this.focus();}});$(this).datepicker('show');")

			}

				
			if(col_id==3)
				{
					element_input.setAttribute("value","Diesel");
				}
				if(col_id ==6){
				element_input.setAttribute("class","end_text");
			}
			if(col_id == (window.no_cells-2))
			{

					element_input.setAttribute("onchange","calculateAmount("+row_id+","+col_id+")");
					//element_input.setAttribute("name","tom");
			}
			if(col_id==(window.no_cells-3))
			{
				element_input.setAttribute("onchange","calculateAmount("+row_id+","+(col_id+1)+")");
			}



	}else
	{
		element_input.setAttribute("type","Text");
			element_input.setAttribute("id","row_"+row_id+"_col_"+col_id);
			if(col_id==0)
				{
					element_input.setAttribute("size","5");
					element_input.setAttribute("value",Number(document.getElementById("row_"+(row_id-1)+"_col_"+col_id).value)+1);
				}
				
				else
				{
					element_input.setAttribute("value",document.getElementById("row_"+(row_id-1)+"_col_"+col_id).value);
				}

			if(col_id == 2)
			{
				element_input.setAttribute("class","datepicker");
				element_input.setAttribute("autocomplete","off");
				element_input.setAttribute("onfocus","$(this).datepicker({dateFormat: 'dd-mm-yy',onSelect: function (){this.focus();}});$(this).datepicker('show');")

			}
			if(col_id ==6){
				element_input.setAttribute("class","end_text");
			}
			

			if(col_id == (window.no_cells-2))
			{

					element_input.setAttribute("onchange","calculateAmount("+row_id+","+col_id+")");
					//element_input.setAttribute("name","tom");
			}
			if(col_id==(window.no_cells-3))
			{
				element_input.setAttribute("onchange","calculateAmount("+row_id+","+(col_id+1)+")");
			}


	}
		return element_input;
}
function calculateAmount(rows,cols)
{
	var rate= document.getElementById("row_"+rows+"_col_"+cols).value;
	var quant=document.getElementById("row_"+rows+"_col_"+(cols-1)).value;
	if(rate == null )
		rate=0;
	if(quant == null)
		quant=0;
	
	document.getElementById("row_"+rows+"_col_"+(cols+1)).value=Math.round(Number(rate)*Number(quant)).toFixed(2);	

}

$(document).on("keypress", "input", function(e){
	if(e.which == 13){

             $(this).next().focus().select();             
        }
      $('#editFinished').removeAttr('disabled');
      dirtyBit=1;  
});


$(document).on("click", ".alert-close", function(e){
	$(this).parent('div').fadeOut('slow', function(c){});

});

$(document).ready(
	function(){	
	//if(dirtyBit===1)	
		//$('#editFinished').attr('disabled','disabled');
	}
);















