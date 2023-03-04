<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MentorController extends BaseController
{
    public function index(Request $request)
    {
        $url        = "mentors";
        $params     = [];
        $api        = $this->initialGetFeature($url, $params);
        $data       = json_decode($api->getBody(), true);
        $mentors    = $data['data'];
        return view('features.admin.mentor.index', compact('mentors'));
    }
    public function create(Request $request)
    {
        return view('features.admin.mentor.create');
    }

    public function store(Request $request)
    {
        $token  = Session::get("access_token");
        $url    = "mentors";
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'profession' => 'required',
            'profile' => 'required',
        ]);
        $data   = $request->only('name', 'email', 'profession');
        if ($request->profile) {
            $logo = media2($request->profile);
            $data['profile'] = $logo['images'];
        }
        $params     = [];
        $request    = $this->initialPostFeature($url, $params, $data, $token);
        $status     = $request->getStatusCode();
        if ($status == 200) {
            return redirect()->back()->with('success', 'Success !');
        } elseif ($status == 403) {
            $refreshToken   = $this->getRefreshToken();
            $token          = Session::get('access_token');
            $request        = $this->initialPostFeature($url, $params, $data, $token);
            if ($request->getStatusCode() == 200) {
                return redirect()->back()->with('success', 'Success !');
            } elseif ($request->getStatusCode() == 400) {
                $error = json_decode($request->getBody(), true);
                $message = $error['error'][0]['message'];
                return redirect()->back()->with('danger', $message);
            } else {
                return redirect()->back()->with('danger', 'Invalid request Access denied');
            }
        } elseif ($status == 400) {
            $error = json_decode($request->getBody(), true);
            $message = $error['error'][0]['message'];
            return redirect()->back()->with('danger', $message);
        } else {
            return redirect()->back()->with('danger', 'Internal Server Error');
        }
    }
}
