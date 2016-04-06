<?php
namespace SmartBill\Entity;

class Payment extends AbstractEntity {
    public $value;
    public $paymentSeries;
    public $type;
    public $isCash;
}
