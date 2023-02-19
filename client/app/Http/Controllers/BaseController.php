<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BaseController extends Controller
{
    public function initialGetFeature($params, $param = [])
    {
        $url = env("BASE_URL_API_DEV");
        $client = new Client(['base_uri' => $url]);
        $token = "";
        $parameter = [];
        $parameter = array_merge($parameter, $param);

        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        try {
            $response = $client->request('GET', $params, [
                'headers'  => $headers,
                'query'   => $parameter,
                // 'params' => $parameter

            ]);
            return $response;
        } catch (ClientException $e) {
            return $e->getResponse();
        }
        return $response;
    }

    public function initialPostFeature($db, $params, $json)
    {
        $token = "";
        $session = "";
        $url = "";

        // $params = 'warehouse/list.do';
        $client = new Client(['base_uri' => $url]);

        // $parameter = [];
        // $parameter = array_merge($parameter,$param);

        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
            'X-Session-ID' => $session,
        ];



        try {
            $response = $client->requestAsync('POST', $params, [
                'headers'     => $headers,
                'json' => $json,

            ])->wait();

            // return json_decode($response->getBody(), true);
            return $response;
        } catch (ClientException $e) {
            // echo Psr7\Message::toString($e->getRequest());
            return json_decode($e->getResponse()->getBody(true), true);
        }
    }
}
