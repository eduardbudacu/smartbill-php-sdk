<?php
namespace SmartBill\Entity;

class Product extends AbstractEntity {
    public $name;
    public $code;
    public $translatedName;
    public $translatedMeasuringUnit;	
    public $isDiscount = false;
    public $measuringUnitName;
    public $currency;
    public $quantity;
    public $price;
    public $isTaxIncluded;
    public $taxName;
    public $taxPercentage;
    public $exchangeRate;
    public $saveToDb = false;
    public $warehouseName;
    public $isService;  
}