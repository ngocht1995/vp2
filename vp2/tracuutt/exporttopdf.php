<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php
//============================================================+
// File name   : example_008.php
// Begin       : 2008-03-04
// Last Update : 2010-08-08
//
// Description : Example 008 for TCPDF class
//               Include external UTF-8 text file
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               Manor Coach House, Church Hill
//               Aldershot, Hants, GU12 4RQ
//               UK
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Include external UTF-8 text file
 * @author Nicola Asuni
 * @since 2008-03-04
 */

require_once('./pdf/config/lang/eng.php');
require_once('./pdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'TRƯỜNG ĐẠI HỌC DÂN LẬP HẢI PHÒNG 008', PDF_HEADER_STRING);

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// set font
$pdf->SetFont('freeserif', '',10);

// add a page
$pdf->AddPage();

// get esternal file content
//$utf8text = file_get_contents('./pdf/cache/utf8test.txt', false);

// set color for text
$pdf->SetTextColor(0, 63, 127);

//Write($h, $txt, $link='', $fill=0, $align='', $ln=false, $stretch=0, $firstline=false, $firstblock=false, $maxh=0)

// write the text
//$pdf->Write(5, $_REQUEST['datatodisplay1'], '', 0, '', false, 0, false, false, 0);
$pdf->writeHTML($_REQUEST['datatodisplay2'], true, true, true, false, 0);
// ---------------------------------------------------------
//$pdf->Write($h=0, $_REQUEST['datatodisplay2'], $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
//Close and output PDF document

$result ="MSV_".$_SESSION['arraythongtin']['MaSinhVien']."_". $_SESSION['title'].".pdf";
$pdf->Output('"'.$result.'"', 'D');

//$pdf->Output('', 'I');
//============================================================+
// END OF FILE                                                
//============================================================+
?>