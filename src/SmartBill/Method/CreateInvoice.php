<?php
namespace SmartBill\Method;

class CreateInvoice {
    protected $companyVatCode;
    protected $invoiceDetails;
    protected $client;
    protected $products;
    protected $payment;
    
    protected $response;
    
    public function __construct($companyVatCode, $invoiceDetails) {
        $this->companyVatCode = $companyVatCode;
        $this->invoiceDetails = $invoiceDetails;
    }
    
    public function setClient(\SmartBill\Entity\Client $client) {
        $this->client = $client;
    }
    
    public function setPayment(\SmartBill\Entity\Payment $payment) {
        $this->payment = $payment;
    }
    
    public function addProduct(\SmartBill\Entity\Product $product) {
        $this->products[] = $product;
    }
    
    public function request() {
        $client = \SmartBill\Client::getHttpClient();
        $client->method('POST');
        $client->body($this->_getPayload());
        $client->uri($this->_getApiEndpoint());
        $this->response =  $client->send();
    }
    
    public function _getPayload() {
        $requestArray = array(
            'companyVatCode' => $this->companyVatCode
        );
        
        $requestArray = array_merge($requestArray, get_object_vars($this->invoiceDetails));
        $requestArray['client'] = get_object_vars($this->client);
        
        foreach ($this->products as $p) {
            $requestArray[] = array('product' => get_object_vars($p));
        }
        
        $xml_data = new \SimpleXMLElement('<invoice></invoice>');
        $this->arrayToXml($requestArray, $xml_data);
        return $xml_data->asXML();
    }
    
    public function arrayToXml( $data, &$xml_data ) {
        foreach( $data as $key => $value ) {
            if( is_array($value) ) {
                if(is_numeric($key)) {
                    $keys = array_keys($value);
                    $key = $keys[0];
                    $subnode = $xml_data->addChild($key);
                    $this->arrayToXml($value[$key], $subnode);
                } else {
                    $subnode = $xml_data->addChild($key);
                    $this->arrayToXml($value, $subnode);
                }
            } else {
                if(!empty($value)) {
                    $xml_data->addChild("$key",htmlspecialchars("$value"));
                }
            }
         }
    }
    
    public function isSuccesful() {
        
    }
    
    protected function _getApiEndpoint() {
        $baseUri = \SmartBill\Client::BASE_URL . 'invoice';
        return $baseUri;
    }
}