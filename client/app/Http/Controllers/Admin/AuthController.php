<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class AuthController extends BaseController
{
    public function index(Request $request)
    {
        return view('features.admin.auth.login');
    }

    public function login(Request $request)
    {
        $data           = $request->only('email', 'password');
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
                return redirect()->route('admin.dashboard.index');
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
}
