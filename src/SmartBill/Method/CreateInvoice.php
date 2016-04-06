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
        
        $requestArray = array_merge($requestArray, $this->invoiceDetails->toArray());
        $requestArray['client'] = $this->client->toArray();
        
        foreach ($this->products as $p) {
            $requestArray['products'][] = $p->toArray();
        }
        
        return json_encode($requestArray);
    }
    
    public function isSuccesful() {
        if(empty($this->response->body->errorText)) {
            return TRUE;
        }
        return FALSE;
    }
    
    public function getNumber() {
        if($this->isSuccesful()) {
            return $this->response->body->number;
        }
    }
    
    /**
     * Requests PDF file and returns the object
     * @return \SmartBill\Method\InvoicePdf
     */
    public function getPdf() {
        $invoicePdf = new \SmartBill\Method\InvoicePdf($this->companyVatCode, $this->invoiceDetails->seriesName, $this->getNumber());
        $invoicePdf->requestFile();
        return $invoicePdf;
    }
    
    protected function _getApiEndpoint() {
        $baseUri = \SmartBill\Client::BASE_URL . 'invoice';
        return $baseUri;
    }
}