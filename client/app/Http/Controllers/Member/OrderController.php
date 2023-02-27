<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function post(Request $request){
        $url            = "my-courses";
        $params         = [];
        $body           = $request->only('course_id');
        $type           = $request->type;
        $token          = Session::get('access_token');
        $request        = $this->initialPostFeature($url, $params, $body,$token);
        $data           = json_decode($request->getBody(), true);
        $status         =$request->getStatusCode();
        switch ($status) {
            case 200:
                $data         = json_decode($request->getBody(),true);
                if ($type == "premium") {
                    return redirect()->to($data['data']['snap_url']);
                }else{
                    return redirect()->to($data['message']);
                }
                break;
            case 403:
                $refreshToken = $this->getRefreshToken();
                $token        = Session::get('access_token');
                $request      = $this->initialPostFeature($url,$params,$body,$token);
                $status       = $request->getStatusCode();
                if ($status ==200) {
                    $data         = json_decode($request->getBody(),true);
                    if ($type == "premium") {
                        return redirect()->to($data['data']['snap_url']);
                    }else{
                        return redirect()->to($data['message']);
                    }
                }else{
                    return redirect()->back()->with('danger' ,'Invalid Access Token !');
                }
                break;            
            case 419:
                $response =json_decode($request->getBody(), true);
                $message =$response['message'];
                return redirect()->back()->with('danger' ,$message);
                break;            
            default:
                $response =json_decode($request->getBody(), true);
                $message =$response['message'];
                return redirect()->back()->with('danger' ,$message);
                break;
        } 
    }
}
