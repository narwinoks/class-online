<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MyOrderController extends BaseController
{
    public function index(Request $request){
        return view('features.member.order.order');
    }

    public function getOrder(){
        $token =Session::get('access_token');
        $url= "order";       
        $request =$this->initialGetFeature($url,$param=[] ,$token);
        $status =$request->getStatusCode();
        if ($status == 200) {
            $data =json_decode($request->getBody(),true);
            $return =$data['data'];
                return datatables()->of($data['data'])
                ->editColumn('createdAt', function ($return) {
                    return date('d-m-Y', strtotime($return['createdAt']));
                })
                ->editColumn('meta_data.course_price', function ($return) {
                    return covert_money($return['meta_data']['course_price']) ;
                })
                ->editColumn('type', function ($return) {
                    return $return['meta_data']['course_level'];
                })
                ->editColumn('course_name', function ($return) {
                    return $return['meta_data']['course_name'];
                })
                ->addColumn('image', function ($return) {
                    return $return['meta_data']['course_thumbnail'];
                })
                ->addIndexColumn()
                ->toJson(); 
        }elseif($status ==403){
               // STATUS CODE EXPIRED ACCESS TOKEN
               $refreshToken = $this->getRefreshToken();
               $token        = Session::get('access_token');
               $request =$this->initialGetFeature($url,$param=[] ,$token);
               $status       = $request->getStatusCode();
               if ($status == 200) {
                $data =json_decode($request->getBody(),true);
                $return =$data['data'];
                return datatables()->of($data['data'])
                ->editColumn('createdAt', function ($return) {
                    return date('d-m-Y', strtotime($return['createdAt']));
                })
                ->editColumn('meta_data.course_price', function ($return) {
                    return covert_money($return['meta_data']['course_price']) ;
                })
                ->editColumn('type', function ($return) {
                    return $return['meta_data']['course_level'];
                })
                ->editColumn('course_name', function ($return) {
                    return $return['meta_data']['course_name'];
                })
                ->addColumn('image', function ($return) {
                    return $return['meta_data']['course_thumbnail'];
                })
                ->addIndexColumn()
                ->toJson(); 
            }else{
                   $error = json_decode($request->getBody(),true);
                   Session::flash('danger' ,$error['message']);
                   $data =[];
                   return datatables()->of($data)
                   ->addIndexColumn()
                   ->toJson(); 
               }
        }else{
            Session::flash('danger' ,'Something went wrong !');
            $data=[];
            return datatables()->of($data)
            ->addIndexColumn()
            ->toJson(); 
        }
    }
}
