<?php
namespace SmartBill\Method;

/**
 * Delete invoice
 *
 * @author eduard.budacu
 */
class RestoreInvoice {
    
    protected $cif;
    protected $seriesname;
    protected $number;
    
    /**
     * HttpClient response
     * @var type \Httpful\Response
     */
    protected $response;
    
    public function __construct($cif, $seriesname, $number) {
        $this->cif = $cif;
        $this->seriesname = $seriesname;
        $this->number = $number;
    }
    
    public function request() {
        $client = \SmartBill\Client::getHttpClient();
        $client->method('PUT');
        $client->uri($this->_getApiEndpoint());
        $this->response =  $client->send();
    }
    
    public function isSuccesful() {
        if(empty($this->response->body->errorText)) {
            return TRUE;
        }
        return FALSE;
    }
    
    protected function _getApiEndpoint() {
        $baseUri = \SmartBill\Client::BASE_URL . 'invoice/restore';
        $params = array('cif' => $this->cif, 'seriesname' => $this->seriesname, 'number' => $this->number);
        return $baseUri . '?' . http_build_query($params);
    } 
}