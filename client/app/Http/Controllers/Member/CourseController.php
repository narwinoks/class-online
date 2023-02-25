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
        return view('features.member.course.index');
    }

    public  function getCourse(Request $request)
    {
        $params = "courses";
        $param = $request->all();
        $course = $this->initialGetFeature($params, $param);
        $dataCourses = json_decode($course->getBody(), true);
        $courses = $dataCourses['data'];
        return view('features.member.course.data', compact('courses'));
    }

    public function detail(Request $request, $slug)
    {
        $course = $this->getDetailCourse($slug);
        return view('features.member.course.detail', compact('course'));
    }

    public function getDetailCourse($slug)
    {
        $params = "courses/" . $slug;
        $course = $this->initialGetFeature($params);
        $dataCourse = json_decode($course->getBody(), true);
        $course = $dataCourse['data'];
        return $course;
    }
}
