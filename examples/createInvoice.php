<?php

require '../vendor/autoload.php';
require 'config.php';

$companyVatCode = SMARTBILL_COMPANY_IDENTIFICATION;

\SmartBill\Client::init(SMARTBILL_API_USER, SMARTBILL_API_TOKEN);

$invoiceDetails = new \SmartBill\Entity\Invoice();
$invoiceDetails->issueDate = date('Y-m-d');
$invoiceDetails->seriesName = 'KDG';
$invoiceDetails->isDraft = FALSE;
$invoiceDetails->dueDate = date('Y-m-d');
$invoiceDetails->deliveryDate = date('Y-m-d');

$client = new \SmartBill\Entity\Client();
$client->name =  'Intelligent IT';
$client->vatCode = 'RO12345678';
$client->address = 'address';
$client->city = 'Sibiu';
$client->country = 'Romania';
$client->email = 'office@intelligent.ro';

$product1 = new \SmartBill\Entity\Product();
$product1->name = 'Produs 1';
$product1->code = 'ccd1';
$product1->isDiscount = FALSE;
$product1->measuringUnitName = 'buc';
$product1->currency = 'RON';
$product1->quantity = '2';
$product1->price = 10;
$product1->isTaxIncluded = TRUE;
$product1->taxName = 'Normala';
$product1->taxPercentage = '20';
$product1->isService = FALSE;

$invoiceMethod = new \SmartBill\Method\CreateInvoice($companyVatCode, $invoiceDetails);
$invoiceMethod->setClient($client);
$invoiceMethod->addProduct($product1);
$invoiceMethod->request();

