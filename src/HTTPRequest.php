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
            'http_errors' => false, //必须，否则碰到500 400就会返回致命错误，然后放第一个
            'form_params' => $param,
            'auth' => [$this->config['client_id'], $this->config['client_secret'],
            ]
        ]);
        return $request->getBody();
    }
}