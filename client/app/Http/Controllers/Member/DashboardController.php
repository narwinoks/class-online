<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class DashboardController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data = $this->getDashboardData();
        return view('features.member.dashboard.index',compact('data'));
    }

    public function getDashboardData()
    {
        $url = "dashboard";
        $token = Session::get("access_token");
        $params = [];
        $request = $this->initialGetFeature($url, $params, $token);
        $status = $request->getStatusCode();
        if ($status == 200) {
            $data = json_decode($request->getBody(), true);
            return  $data['data'];
        } elseif ($status == 403) {
            $refreshToken = $this->getRefreshToken();
            $token = Session::get('access_token');
            $request = $this->initialGetFeature($url, $params, $token);
            $data = json_decode($request->getBody(), true);
            return  $data['data'];
        } else {
            return [];
        }
    }
}
