<?php
  session_start();
  $userData=$_SESSION["user_data"];
  $grand_total=$_SESSION["grand_total"];
?>
<?php
// Include the main TCPDF library (search for installation path).
require_once('tcpdf.php');
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetHeaderData('nic_letterhead.png', 100, '','' , array(0,64,255), array(0,64,128));
//$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}


// set font
$pdf->SetFont('helvetica', 'B', 12);

// add a page
$pdf->AddPage();

// set some text to print
$head = <<<EOD
Expenditure Statement of Fuel Vehical No: NL10C-0888
of NIC , Nagaland State Center, Kohima


EOD;
// print a block of text using Write()
$pdf->Write(0, $head, '', 0, 'C', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 10);
$details = <<<EOD
Name: Viseno Rhetso 
Desig:Senior Secretariat Asst
Acct No: 10530583595


EOD;
$pdf->Write(0, $details, '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 10);

// -----------------------------------------------------------------------------

$tbl = "<table  border=\"1\" cellpadding=\"3\"  ><tr><td align=\"center\"><b>Sl.No</b></td><td align=\"center\"><b>Bill No</b></td><td align=\"center\"><b>Date</b></td><td align=\"center\"><b>Particulars</b></td><td align=\"center\"><b>Qty</b></td><td align=\"center\"><b>Rate</b></td><td align=\"center\"><b>Total Amount </b></td></tr>";


  foreach($userData as $row){
          $count= true;
          $tbl.= "<tr>";

        foreach($row as $key){
          if($count!= true)
              $tbl.= "<td>".$key."</td>";
              else
                $count=false;
            }
            $tbl.= "</tr>";
          }
          $tbl.="</table>";     

$pdf->writeHTML($tbl, true, false, false, false, '');

$pdf->Write(0, 'Grand Total: Rs.'.$grand_total, '', 0, 'R', true, 0, false, false, 0);
$pdf->SetFont('helvetica', 'B', 11);
$pdf->Write(0, "(".$_SESSION['grand_total_words'].")", '', 0, 'C', true, 0, false, false, 0);
$pdf->write(15,"","",0,'R',true,0,false,false,0);
$pdf->SetFont('helvetica', '', 11);
$pdf->Write(0, '(Viseno Rhetso)', '', 0, 'R', true, 0, false, false, 0);
$pdf->Write(0, 'Senior Sectt. Asst.', '', 0, 'R', true, 0, false, false, 0);
//Close and output PDF document
$pdf->Output('testing.pdf', 'I');

