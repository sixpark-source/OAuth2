# OAuth2
6park.com 的Auth认证
####基本使用方法：
1. 安装

 ` composer require sixpark-source/oauth2 `

2. 使用


```
<?php
   require_once __DIR__ . '/vendor/autoload.php';
   $config =  [
    'client_id' => APPID,
    'client_secret' => APP秘钥
    'token_route' => Token请求地址,
    ]; 
    //请求 Token ,获取Token首先要获取code;
    $query = array(
            'grant_type'    => 'authorization_code',
            'code'          => $code,
            'client_id'     => $config['client_id'],
            'client_secret' => $config['client_secret']
        );
    $oauth = new \SixparkSource\Oauth2\OAuth($config);
    $resultJson = $oauth->requestTokenWithAuthCode(CODE);
    $result = json_decode($resultJson,true);
?>

```

