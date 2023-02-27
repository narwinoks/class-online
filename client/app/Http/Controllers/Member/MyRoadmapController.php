<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MyRoadmapController extends BaseController
{
    public function index(Request $request)
    {
        $myRoadMap = $this->getRoadMap();
        return view('features.member.myroadmap.index', compact('myRoadMap'));
    }

    public function getRoadMap()
    {
        $url = "my-roadmap";
        $params = [];
        $token = Session::get('access_token');
        $request = $this->initialGetFeature($url, $params, $token);
        $status = $request->getStatusCode();
        if ($status == 200) {
            $data = json_decode($request->getBody(), true);
            return $data['data'];
        } elseif ($status == 403) {
            $refreshToken = $this->getRefreshToken();
            $token = Session::get('access_token');
            $request = $this->initialGetFeature($url, $params, $token);
            $data = json_decode($request->getBody(), true);
            return $data['data'];
        } else {
            return [];
        }
    }
}
