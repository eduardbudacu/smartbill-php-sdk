<?php
namespace SmartBill\Method;

use Httpful\Request;

/**
 * Download PDF invoice
 *
 * @author eduard.budacu
 */
class InvoicePdf {
    
    protected $cif;
    protected $seriesname;
    protected $seriesnumber;
    
    /**
     * HttpClient response
     * @var type \Httpful\Response
     */
    protected $response;
    
    public function __construct($cif, $seriesname, $seriesnumber) {
        $this->cif = $cif;
        $this->seriesname = $seriesname;
        $this->seriesnumber = $seriesnumber;
    }
    
    public function requestFile() {
        $client = \SmartBill\Client::getHttpClient();
        $client->method('GET');
        $client->uri($this->_getApiEndpoint());
        $this->response = $client->send();
    }
    
    public function saveFile($filename) {
        if(empty($this->response->body)) {
            throw new Exception('Empty response body. Must perform the request first');
        }
        
        if(!is_writable($filename)) {
            throw new Exception('Unable to write in the specified path '.$filename);
        }
        
        file_put_contents($filename, $this->response->body);
    }
    
    protected function _getApiEndpoint() {
        $baseUri = \SmartBill\Client::BASE_URL . 'invoice/pdf';
        $params = array('cif' => $this->cif, 'seriesname' => $this->seriesname, 'seriesnumber' => $this->seriesnumber);
        return $baseUri . '?' . http_build_query($params);
    }
}
