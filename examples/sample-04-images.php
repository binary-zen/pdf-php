<?php
require '../src/CpdfExtension.php';

use ROSPDF\Cpdf;
use ROSPDF\CpdfExtension;

$pdf = new CpdfExtension(Cpdf::$Layout['A4']);

if(isset($_GET['debug']))
    Cpdf::$DEBUGLEVEL = Cpdf::DEBUG_OUTPUT;

//$pdf->Compression = 9;
$pdf->CURPAGE->SetBackground(array(0.6, 0.9, 0.9));
// use Appearance object for images and drawings
$app = $pdf->NewAppearance();

// Images - currently only JPEG and PNG (non colored indexed)
// Transparency pf PNG images is working so far

$app->AddImage('left', 'top', 'images/test_alpha2.png');
//$app->AddImage('right', 'top', 'images/test.jpg');

//$app->AddImage('left', 'middle', 'images/test_indexed.png');
//$app->AddImage('right', 'middle', 'images/test_indexed_transparent.png');

//$app->AddImage('left', 'bottom', 'images/test_grayscaled_alpha.png');
//$app->AddImage('right', 'bottom', 'images/test_grayscaled.png');

// Output the PDF - use parameter 1 to set a filename
$pdf->Stream(basename(__FILE__, '.php').'.pdf');
