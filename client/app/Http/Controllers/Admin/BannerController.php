<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerController extends BaseController
{
    public function index()
    {
        return view('features.admin.banner.index');
    }

    public function data()
    {
        $params = "banner";
        $param = [
            'type' => 'public',
        ];
        $banner = $this->initialGetFeature($params, $param);
        $dataBanner = json_decode($banner->getBody(), true);
        return datatables()->of($dataBanner['data'])->addColumn('action', 'features.admin.banner.action')->toJson();
    }

    public function create(Request $request){
        
    }
}
