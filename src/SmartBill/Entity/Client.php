<?php
namespace SmartBill\Entity;

class Client {
    
    /**
     * Client name - special chars are not allowed 
     * @var string 
     */
    public $name;
    
    /**
     * Client CIF 
     * @var string 
     */
    public $vatCode;
    
    /**
     * Client code
     * @var string 
     */
    public $code;
    
    /**
     * Client address
     * @var string 
     */
    public $address;
    
    /**
     * ONRC Client code
     * @var string 
     */
    public $regCom;
    
    /**
     * Whether the client is a VAT payer
     * @var boolean 
     */
    public $isTaxPayer = false;
    
    /**
     * Clients contact person
     * @var string 
     */
    public $contact;
    
    /**
     * Clients phone
     * @var string 
     */
    public $phone;
    
    /**
     * City
     * @var string 
     */
    public $city;
    
    /**
     * County
     * @var string 
     */
    public $county;
    
    /**
     * Country
     * @var string 
     */
    public $country;
    
    /**
     * Email
     * @var string 
     */
    public $email;
    
    /**
     * Clients bank
     * @var string 
     */
    public $bank;
    
    /**
     * Clients ibam
     * @var string 
     */
    public $iban;
    
    /**
     * Save client to DB
     * @var boolean 
     */
    public $saveToDb = true;
}