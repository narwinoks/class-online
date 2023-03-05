<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataController extends BaseController
{
    public function banner()
    {
        $params     = "banner";
        $param      = [];
        $banner     = $this->initialGetFeature($params, $param);
        $dataBanner = json_decode($banner->getBody(), true);
        return datatables()->of($dataBanner['data'])->addColumn('action', 'features.admin.banner.action')->addIndexColumn()->toJson();
    }

    public function categories()
    {
        $params         = "categories";
        $param          = [];
        $categories     = $this->initialGetFeature($params, $param);
        $dataCategory   = json_decode($categories->getBody(), true);
        return datatables()->of($dataCategory['data'])
            ->addColumn('action', 'features.admin.categories.action')
            ->addIndexColumn()->toJson();
    }

    public function roadMap()
    {
        $params         = "roadmap";
        $param          = [];
        $roadMap        = $this->initialGetFeature($params, $param);
        $dataRoadMap    = json_decode($roadMap->getBody(), true);
        return datatables()->of($dataRoadMap['data'])
            ->editColumn('price', function ($dataRoadMap) {
                return covert_money($dataRoadMap['price']);
            })
            ->addColumn('action', 'features.admin.roadmap.action')->addIndexColumn()->toJson();
    }

    public function course()
    {
        $params         = "courses";
        $param          = [];
        $courses        = $this->initialGetFeature($params, $param);
        $dataCourses    = json_decode($courses->getBody(), true);
        return datatables()->of($dataCourses['data'])
            ->editColumn('price', function ($dataRoadMap) {
                return covert_money($dataRoadMap['price']);
            })
            ->addColumn('action', 'features.admin.course.action')->addIndexColumn()->toJson();
    }
}
