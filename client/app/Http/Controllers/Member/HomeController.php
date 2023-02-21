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

        $roadMap = $this->getRoadMap();
        $roadMap=$roadMap['data'];

        $categories= $this->getCategories();
        $categories=$categories['data'];

        $popularClass =$this->course(['status' =>'published','filter' => 'popular']);
        if ($popularClass['status'] == 200) {
            $popularClass = $popularClass['data'];
        }else{
            $popularClass =[];
        }

        $allCourse =$this->course(['status' => 'published']);
        $allCourse =$allCourse['data'];
        return view('features.member.home.index', compact('banner','roadMap','categories','popularClass','allCourse'));
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

    public function getRoadMap(){
        $params = "roadmap";
        $roadMap=$this->initialGetFeature($params);
        $dataRoadMap = json_decode($roadMap->getBody(), true);
        return  $dataRoadMap;
    }

    public function getCategories(){
        $params = "categories";
        $category = $this->initialGetFeature($params);
        $dateCategory = json_decode($category->getBody(), true);
        return $dateCategory;
    }

    public function course($param=[]){
        $params = "courses";
        $courses = $this->initialGetFeature($params,$param);
        $dataCourses =json_decode($courses->getBody(),true);
        return $dataCourses;
    }
}
