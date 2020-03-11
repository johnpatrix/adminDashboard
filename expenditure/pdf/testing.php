<?php
  session_start();
  $userData=$_SESSION["user_data"];
?>
<?php
// Include the main TCPDF library (search for installation path).
require_once('tcpdf.php');
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

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
$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();

$pdf->Write(0, 'Example of HTML tabless', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 8);

// -----------------------------------------------------------------------------

$tbl = "<table  border=\"1\" cellpadding=\"2\" cellspacing=\"1\" ><tr><td><b>Sl.No</b> </td><td><b>Bill No</b></td><td><b>Date</b></td><td><b>Particulars</b></td><td><b>Qty</b></td><td><b>Rate</b></td><td><b>Total Amount </b></td></tr>";


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
         // echo $tbl;     

$pdf->writeHTML($tbl, true, false, false, false, '');


//Close and output PDF document
$pdf->Output('testing.pdf', 'I');

