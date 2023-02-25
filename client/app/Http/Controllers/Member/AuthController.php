<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class AuthController extends BaseController
{
    public  function index(Request $request)
    {
        $get =$this->getRefreshToken();
        if ($get) {
            return redirect()->route('member.dashboard.index');
        }
        return view('features.member.auth.login');
    }

    public function register(Request $request)
    {
        return view('features.member.auth.register');
    }

    public function prosesRegister(RegisterRequest $registerRequest)
    {

        $data = $registerRequest->only('email', 'password');
        $url = "auth/register";
        $params = [];
        $body = $data;
        $request = $this->initialPostFeature($url, $params, $body);
    }

    public function prosesLogin(LoginRequest $loginRequest)
    {
        $data           = $loginRequest->only('email', 'password');
        $url            = "auth/login";
        $params         = [];
        $body           = $data;
        $now            = Carbon::now();
        $expiresAt      = $now->addDays(30);
        $expiresDate    = $expiresAt->toDateTimeString();
        $request        = $this->initialPostFeature($url, $params, $body);
        $data           = json_decode($request->getBody(), true);
        switch ($request->getStatusCode()) {
            case 200:
                $response   = $data['data'];
                $user       = new User();
                $user->id   = $response['id'];
                Auth::login($user);
                Cookie::queue("refresh_token", $response['refresh_token']);
                Cookie::queue("expire_in",  $expiresDate);
                $accessToken = Session::put('access_token', $response['access_token']);
                return redirect()->route('member.dashboard.index');
                break;
            case 404:
                $response = $data['message'];
                return redirect()->back()->with('danger', $response);
                break;
            case 400:
                $response = $data['message'];
                return redirect()->back()->with('danger', $response);
                break;
            default:
                break;
        }
    }

    public function logout(Request $request){
        $url        = "auth/logout";
        $token      =Session::get('access_token');
        $param      =[];
        $request    = $this->initialDeleteFeature($url,$param,$token);
        $status =$request->getStatusCode();
        if($status == 200) {
            Cookie::queue(Cookie::forget('refresh_token'));
            Cookie::queue(Cookie::forget('refresh_token'));
            Auth::logout();
            Session::forget('access_token');
            Session::forget('expires_in');
            return redirect()->route('auth.index');
        }
        return redirect()->route('member.dashboard.index');
    }
}
