<?php
namespace SmartBill\Entity;

class Invoice {
    public $issueDate;
    public $seriesName;
    public $issuerCnp;
    public $issuerName;
    public $dueDate;
    public $mentions;
    public $observations;
    public $deliveryDate;
    public $currency = 'RON';
    public $exchangeRate = 1;
    public $useStock = false;
    public $isTaxIncluded;
    public $taxName;
    public $taxPercentage;
    public $isDraft;
    public $usePaymentTax;
    public $paymentBase;
    public $colectedTax;
    public $paymentTotal;
    public $language = 'RO';
}