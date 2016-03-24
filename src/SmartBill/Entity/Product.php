<?php
class SmartBill_Entity_Product {
    
    /**
     *
     * @var type 
     */
    protected $name;
    
    /**
     *
     * @var type 
     */
    protected $code;
    
    /**
     *
     * @var type 
     */
    protected $translatedName;
    
    /**
     *
     * @var type 
     */
    protected $translatedMeasuringUnit;	
    
    /**
     *
     * @var type 
     */
    protected $isDiscount = false;
    
    /**
     *
     * @var type 
     */
    protected $measuringUnitName;
    
    /**
     *
     * @var type 
     */
    protected $currency;
    
    /**
     *
     * @var type 
     */
    protected $quantity;
    
    /**
     *
     * @var type 
     */
    protected $price;
    
    /**
     *
     * @var type 
     */
    protected $isTaxIncluded;
    
    /**
     *
     * @var type 
     */
    protected $taxName;
    
    /**
     *
     * @var type 
     */
    protected $taxPercentage;
    
    /**
     *
     * @var type 
     */
    protected $exchangeRate;
    
    /**
     *
     * @var type 
     */
    protected $saveToDb = false;
    
    /**
     *
     * @var type 
     */
    protected $warehouseName;
    
    /**
     *
     * @var type 
     */
    protected $isService;  
}