<?php

require '../vendor/autoload.php';
require 'config.php';

\SmartBill\Client::init(SMARTBILL_API_USER, SMARTBILL_API_TOKEN);

$invoiceMethod = new \SmartBill\Method\InvoicePdf(SMARTBILL_COMPANY_IDENTIFICATION, 'KDG', '0110');

$invoiceMethod->requestFile();
$invoiceMethod->saveFile('invoice0107.pdf');
