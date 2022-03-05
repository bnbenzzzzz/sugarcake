<?php

// Require composer autoload

require_once __DIR__ . '/vendor/autoload.php';

// Create an instance of the class:

$mpdf = new \Mpdf\Mpdf();

// Write some HTML code:

$mpdf->WriteHTML('Hello World');

// Output a PDF file directly to the browser

$mpdf->Output();;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/backed_shippingaddress.css">
    <title>shippng-address</title>
</head>

<body>

</body>

</html>