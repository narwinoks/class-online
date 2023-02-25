<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Session;

if (!function_exists('covert_money')) {
  function covert_money($a){
    if (isset($a)) {
        if ($a == '') {
            $a = 0;
        }
        $p 			= strlen($a);
        $result 		= number_format($a, 2);
        return "Rp. " . $result;
    } 
  }
}
if (!function_exists('media')) {
  function media($data){
    $token =Session::get('access_token');
    $params ='media';
    $file = $data->path();
    $image = base64_encode(file_get_contents($data->path()));
    $upload = "data:image/png;base64," .$image;
    $body =[
      'image' => $upload
    ];
    

    $url = env("BASE_URL_API_DEV");
    $client = new Client(['base_uri' => $url]);
    $headers = [
        'Authorization' => 'Bearer ' . $token,
        'Accept' => 'application/json',

    ];
    try {
        $response = $client->requestAsync('POST', $params, [
            'headers'     => $headers,
            'form_params' => $body

        ])->wait();
        $return =json_decode($response->getBody(), true);
        return $return['data'];
    } catch (ClientException $e) {
        return $e->getResponse();
    }
  }
}
?>