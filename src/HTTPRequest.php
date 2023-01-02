<?php

namespace SixparkSource\Oauth2;

use GuzzleHttp\Client;

class HTTPRequest
{
    var $config;
    var $http;
    public function HTTPRequest($config)
    {
        $this->config = $config;
        $this->http = new Client();
    }

    public function postWithAuth($url,$param)
    {
        return $this->http->request("POST",$this->config['token_route'],[
            'form_params' => $param,
            'auth' => [$this->config['client_id'], $this->config['client_secret'],
            ]
        ]);
    }
}