<?php
require_once 'vendor/autoload.php';
$mpdf =new \Mpdf\Mpdfs();
$mpdf->WriteHTML('<h1>This is a Title</h1><p>This is a paragraph</p>');
$mpdf->output('result1.pdf');

?>