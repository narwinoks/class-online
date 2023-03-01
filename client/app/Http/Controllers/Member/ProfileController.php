<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\PasswordUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfileController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = $this->getProfile();
        return view('features.member.profile.index', compact('user'));
    }

    public function getProfile()
    {
        $token      = Session::get('access_token');
        $url        = "user/profile";
        $param      = [];
        $request    = $this->initialGetFeature($url, $param, $token);
        $status     = $request->getStatusCode();
        if ($status == 200) {
            $data = json_decode($request->getBody(), true);
            return $data['data'];
        } elseif ($status == 403) {
            $refreshToken = $this->getRefreshToken();
            $token        = Session::get('access_token');
            $request      = $this->initialGetFeature($url, $param, $token);
            $status       = $request->getStatusCode();
            if ($status == 200) {
                $data         = json_decode($request->getBody(), true);
                return   $data['data'];
            } else {
                return [];
            }
        }
        return [];
    }

    public function updateProfile(Request $request)
    {
        $data       = $request->only('name', 'avatar');
        // UPLOAD AVATAR
        if ($request->file('avatar')) {
            $media = media($data['avatar']);
            $data['avatar'] = $media['images'];
        }
        // GET ACCESS TOKEN
        $token      = Session::get('access_token');
        $url        = "user/profile";
        $param      = [];
        // CALL FUNCTION REQUEST POST ON BASE CONTROLLER
        $request    = $this->initialPutFeature($url, $param, $data, $token);
        $status     = $request->getStatusCode();
        if ($status == 200) {
            // SUCCESS STATUS CODE
            return redirect()->back()->with('success', 'Update Profile Success !');
        } elseif ($status == 403) {
            // STATUS CODE EXPIRED ACCESS TOKEN
            $refreshToken = $this->getRefreshToken();
            $token        = Session::get('access_token');
            $request      = $this->initialPutFeature($url, $param, $data, $token);
            $status       = $request->getStatusCode();
            if ($status == 200) {
                return redirect()->back()->with('success', 'Update Profile Success !');
            } else {
                return redirect()->back()->with('danger', 'Get Access token Invalid !');
            }
        } else {
            return redirect()->back()->with('success', 'Update Profile Success !');
        }
    }

    public function changePassword(PasswordUpdateRequest $request)
    {
        $data = $request->only('password_old', 'password', 'confirm_password');
        // GET ACCESS TOKEN
        $token      = Session::get('access_token');
        $url        = "user/profile/change-password";
        $param      = [];
        // CALL FUNCTION REQUEST POST ON BASE CONTROLLER
        $request    = $this->initialPutFeature($url, $param, $data, $token);
        $status     = $request->getStatusCode();
        if ($status == 200) {
            // SUCCESS STATUS CODE
            return redirect()->back()->with('success', 'Update Profile Success !');
        } else if ($status == 403) {
            // STATUS CODE EXPIRED ACCESS TOKEN
            $refreshToken = $this->getRefreshToken();
            $token        = Session::get('access_token');
            $request      = $this->initialPutFeature($url, $param, $data, $token);
            $status       = $request->getStatusCode();
            if ($status == 200) {
                return redirect()->back()->with('success', 'Update Profile Success !');
            } else {
                $error = json_decode($request->getBody(), true);
                return redirect()->back()->with(['danger' => $error['message'], 'error' => $error]);
            }
        } else {
            $error = json_decode($request->getBody(), true);
            return redirect()->back()->with(['danger' => $error['message'], 'error' => $error]);
        }
    }
}
