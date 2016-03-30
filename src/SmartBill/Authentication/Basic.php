<?php
namespace SmartBill\Authentication;

/**
 * Basic AUTH Adapter for SmartBill API
 * 
 * http://api.smartbill.ro/#!/Autentificare
 *
 * @author eduard.budacu
 */
class Basic {
    
    protected $username;
    protected $token;

    public function __construct($username, $token) {
        $this->username = $username;
        $this->token = $token;
    }
    
    public function getUserName() {
        return $this->username;
    }
    
    public function getToken() {
        return $this->token;
    }
    
    protected function _getAuthString() {
        return base64_encode(implod(":", array($this->username, $this->token)));
    }
    
    public function getHeaderArray() {
        return array(
            'authorization' => 'Basic '.$this->_getAuthString()
        );
    }
    
    public function getHeaderString() {
        return implod(":", $this->getHeaderArray());
    }
}
