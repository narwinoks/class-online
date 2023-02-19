<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function index(Request $request)
    {

        $banner = $this->getBanner();
        $banner = $banner['data'];
        return view('features.member.home.index', compact('banner'));
    }

    public  function getBanner()
    {
        $params = "banner";
        $param = [
            'type' => 'public',
        ];
        $banner = $this->initialGetFeature($params, $param);
        $dataBanner = json_decode($banner->getBody(), true);
        return $dataBanner;
    }
}
