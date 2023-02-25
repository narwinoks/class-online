<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BaseController extends Controller
{
    public function initialGetFeature($params, $param = [],$token="")
    {
        $url = env("BASE_URL_API_DEV");
        $client = new Client(['base_uri' => $url]);
        $parameter = [];
        $parameter = array_merge($parameter, $param);

        $headers = [
            'Authorization' =>  $token,
            'Accept' => 'application/json',
        ];
        try {
            $response = $client->request('GET', $params, [
                'headers'  => $headers,
                'query'   => $parameter,

            ]);
            return $response;
        } catch (ClientException $e) {
            return $e->getResponse();
        }
        return $response;
    }

    public function initialPostFeature($params, $param = [], $body = [])
    {
        $token = "";
        $session = "";
        $url = env("BASE_URL_API_DEV");
        // $params = 'warehouse/list.do';
        $client = new Client(['base_uri' => $url]);

        // $parameter = [];
        // $parameter = array_merge($parameter,$param);

        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',

        ];



        try {
            $response = $client->requestAsync('POST', $params, [
                'headers'     => $headers,
                'form_params' => $body

            ])->wait();

            // return json_decode($response->getBody(), true);
            return $response;
        } catch (ClientException $e) {
            return $e->getResponse();
            // echo Psr7\Message::toString($e->getRequest());
            // return json_decode($e->getResponse()->getBody(true), true);
        }
    }
    public function initialDeleteFeature($params, $param = [],$token)
    {
        $url = env("BASE_URL_API_DEV");
        $client = new Client(['base_uri' => $url]);
        $parameter = [];
        $parameter = array_merge($parameter, $param);

        $headers = [
            'Authorization' =>  $token,
            'Accept' => 'application/json',
        ];
        try {
            $response = $client->request('DELETE', $params, [
                'headers'  => $headers,
                'query'   => $parameter,

            ]);
            return $response;
        } catch (ClientException $e) {
            return $e->getResponse();
        }
        return $response;
    }
    
}
