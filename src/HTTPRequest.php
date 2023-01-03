<?php

namespace SixparkSource\Oauth2;

class HTTPRequest
{
    var $config;
    var $http;
    public function __construct($config)
    {
        $this->config = $config;
        $this->http = new \GuzzleHttp\Client();
    }

    public function postWithAuth($url,$param)
    {

        $request = $this->http->request("POST",$this->config['token_route'],[
            'form_params' => $param,
            'auth' => [$this->config['client_id'], $this->config['client_secret'],
            'http_errors' => false, //必须，否则会返回致命错误
            ]
        ]);
        return $request->getBody();
    }
}