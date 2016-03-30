<?php

require '../vendor/autoload.php';

\SmartBill\Client::init('test', 'test');

$invoiceMethod = new \SmartBill\Method\InvoicePdf('RO25252525', 'BMEN', '1234');

$invoiceMethod->requestFile();
$invoiceMethod->saveFile('invoice.pdf');

