<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataController extends BaseController
{
    public function banner()
    {
        $params = "banner";
        $param = [];
        $banner = $this->initialGetFeature($params, $param);
        $dataBanner = json_decode($banner->getBody(), true);
        return datatables()->of($dataBanner['data'])->addColumn('action', 'features.admin.banner.action')->toJson();
    }
}
