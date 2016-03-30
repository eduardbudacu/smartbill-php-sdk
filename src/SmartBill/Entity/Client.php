<?php
namespace SmartBill\Entity;

class Client {
    
    /**
     * Client name - special chars are not allowed 
     * @var string 
     */
    protected $name;
    
    /**
     * Client CIF 
     * @var string 
     */
    protected $vatCode;
    
    /**
     * Client code
     * @var string 
     */
    protected $code;
    
    /**
     * Client address
     * @var string 
     */
    protected $address;
    
    /**
     * ONRC Client code
     * @var string 
     */
    protected $regCom;
    
    /**
     * Whether the client is a VAT payer
     * @var boolean 
     */
    protected $isTaxPayer = false;
    
    /**
     * Clients contact person
     * @var string 
     */
    protected $contact;
    
    /**
     * Clients phone
     * @var string 
     */
    protected $phone;
    
    /**
     * City
     * @var string 
     */
    protected $city;
    
    /**
     * County
     * @var string 
     */
    protected $county;
    
    /**
     * Country
     * @var string 
     */
    protected $country;
    
    /**
     * Email
     * @var string 
     */
    protected $email;
    
    /**
     * Clients bank
     * @var string 
     */
    protected $bank;
    
    /**
     * Clients ibam
     * @var string 
     */
    protected $iban;
    
    /**
     *
     * @var boolean 
     */
    protected $saveToDb = true;
}