<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MyCourseController extends BaseController
{
    public function index(Request $request)
    {
        $myCourses = $this->getMyCourse();
        return view('features.member.mycourses.index', compact('myCourses'));
    }

    public function getMyCourse()
    {
        // GET ACCESS TOKEN
        $token = Session::get('access_token');
        $url   = "my-courses";
        $params = [];
        $request = $this->initialGetFeature($url, $params, $token);
        // dd($request->getBody(), true);
        $status = $request->getStatusCode();
        if ($status == 200) {
            $data = json_decode($request->getBody(), true);
            return $data['data'];
        } else if ($status == 403) {
            $refreshToken = $this->getRefreshToken();
            $token = Session::get('access_token');
            $request = $this->initialGetFeature($url, $params, $token);
            $data = json_decode($request->getBody(), true);
            return $data['data'];
        } else {
            $error = json_decode($request->getBody(), true);
            return redirect()->back()->with('danger', $error['message']);
        }
    }
}
