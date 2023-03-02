<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BaseController extends Controller
{
    public function initialGetFeature($params, $param = [], $token = "")
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

    public function initialPostFeature($params, $param = [], $body = [], $token = "")
    {
        $url = env("BASE_URL_API_DEV");
        $client = new Client(['base_uri' => $url]);
        $headers = [
            'Authorization' => $token,
            'Accept' => 'application/json',

        ];



        try {
            $response = $client->request('POST', $params, [
                'headers'     => $headers,
                'form_params' => $body

            ]);

            return $response;
        } catch (ClientException $e) {
            return $e->getResponse();
        }
        return $response;
    }
    public function initialDeleteFeature($params, $param = [], $token)
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
    public function initialPutFeature($params, $param = [], $body, $token)
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
            $response = $client->request('PUT', $params, [
                'headers'  => $headers,
                'form_params' => $body

            ]);
            return $response;
        } catch (ClientException $e) {
            return $e->getResponse();
        }
        return $response;
    }
}
