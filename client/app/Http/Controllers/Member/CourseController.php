<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Faker\Provider\Base;
use Illuminate\Http\Request;

class CourseController extends BaseController
{
    public function index()
    {

        // $course =$this->getCourse();
        // $courses = $course['data'];
        return view('features.member.course.index');
    }

    public  function getCourse(Request $request){
        $params ="courses";
        $course =$this->initialGetFeature($params);
        $dataCourses =json_decode($course->getBody(),true);
        $courses = $dataCourses['data'];
        return view('features.member.course.data',compact('courses'));
    }
}
