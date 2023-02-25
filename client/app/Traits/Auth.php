<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

trait Auth
{
    public function checkValidAuth()
    {

        $token      = session()->get('access_token');
        $url        = env("BASE_URL_API_DEV") . "valid-token";
        $request    = Http::withHeaders(['Authorization' => $token])->get($url);
        $request->status();
        if ($request->status() == 200) {
            return true;
        } else {
                $this->getRefreshToken();
        }
    }

    public function getRefreshToken()
    {
        $url            = env("BASE_URL_API_DEV") . "auth/refresh-token";
        $refreshToken   = Cookie::get('refresh_token');
        $expiredToken   = Cookie::get('expire_in');
        $carbonDate     = Carbon::parse($expiredToken);
        $formattedDate  = $carbonDate->format('d-m-y');
        $currentDate    = Carbon::now();
        $oneDayAgo      = $currentDate->subDay();
        $formattedDate2 = $oneDayAgo->format('d-m-y');
        $now            = Carbon::now();
        $expiresAt      = $now->addDays(30);
        $expiresDate    = $expiresAt->toDateTimeString();
        
        $request = Http::timeout(1)->withBody(json_encode(['refresh_token' => $refreshToken]), 'application/json')
            ->get($url);
            $data           = json_decode($request->body(),true);
            if ($data['status'] == 200) {
                $refreshToken   = $data['data']['access_token'];
                if ($formattedDate2 == $formattedDate) {
                    Cookie::queue("refresh_token", $refreshToken);
                    Cookie::queue("expire_in",  $expiresDate);
                    return true;
                }
                Session::forget('access_token');
                Session::put('access_token', $refreshToken);
                return true;
            }
            return false;
    }
}
