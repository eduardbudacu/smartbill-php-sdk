<?php
namespace SmartBill;

use Httpful\Request;

/**
 * Description of Client
 *
 * @author eduard.budacu
 */
class Client {
    protected static $auth;
    
    const BASE_URL = 'https://ws.smartbill.ro:8183/SBORO/api/';
    
    public static function init($username, $token) {
        self::$auth = new \SmartBill\Authentication\Basic($username, $token);
    }

    /**
     * Creates the HttpClient class
     * @return \Httpful\Request
     */
    public static function getHttpClient() {
        $client = \Httpful\Request::init();
        $client->addHeader('Authorization', 'Basic '.  self::$auth->getAuthString());
        $client->contentType('xml');
        return $client;
    }
}
