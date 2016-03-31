<?php
namespace SmartBill\Method;

/**
 * Download PDF invoice
 *
 * @author eduard.budacu
 */
class InvoicePdf {
    
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
    
    public function requestFile() {
        $client = \SmartBill\Client::getHttpClient();
        $client->method('GET');
        $client->withAccept('application/octet-stream');  
        $client->uri($this->_getApiEndpoint());
        $this->response = $client->send();
    }
    
    public function saveFile($filename) {
        if(empty($this->response->body)) {
            throw new \Exception('Empty response body. Must perform the request first');
        }
        
        file_put_contents($filename, $this->response->body);
    }
    
    protected function _getApiEndpoint() {
        $baseUri = \SmartBill\Client::BASE_URL . 'invoice/pdf';
        $params = array('cif' => $this->cif, 'seriesname' => $this->seriesname, 'number' => $this->number);
        return $baseUri . '?' . http_build_query($params);
    }
}
