<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfileController extends BaseController
{
    public function index(Request $request){
      $user= $this->getProfile();
      return view('features.member.profile.index',compact('user'));   
    }

    public function getProfile(){
        $token  =Session::get('access_token');
        $url    ="user/profile";
        $param= [];
        $request = $this->initialGetFeature($url,$param,$token);
        $status =$request->getStatusCode();
        if ($status == 200) {
            $data = json_decode($request->getBody(),true);
            return $data['data'];
        }elseif($status == 403){
           $refreshToken = $this->getRefreshToken();
           $token        = Session::get('access_token');
           $request      = $this->initialGetFeature($url,$param,$token);
           $status       = $request->getStatusCode();
           if ($status ==200) {
               $data         = json_decode($request->getBody(),true);
               return   $data['data'];
           }else{
            return [];
           }
        }
        return [];
    }

    public function updateProfile(Request $request){
        dd($request->all());
    }
}
