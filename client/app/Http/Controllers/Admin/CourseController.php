<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CourseController extends BaseController
{
    public function index(Request $request)
    {
        return view('features.admin.course.index');
    }

    public function create(Request $request)
    {

        $categories = $this->getCategories();
        $roadmaps   = $this->getRoadMap();
        $mentors    = $this->getMentor();
        $level      = ["all-level", "beginner", "intermediate", "advanced"];
        return view('features.admin.course.create', compact('categories', 'roadmaps', 'mentors', 'level'));
    }

    public function edit(Request $request, $id)
    {
        $categories = $this->getCategories();
        $roadmaps   = $this->getRoadMap();
        $mentors    = $this->getMentor();
        $level      = ["all-level", "beginner", "intermediate", "advanced"];
        $chapters   = $this->getChapters($id);
        $course      = $this->getCourse($id);
        return view('features.admin.course.edit', compact('categories', 'roadmaps', 'mentors', 'level', 'chapters', 'course'));
    }

    public function getCourse($id)
    {
        $url        = "courses/detail/" . $id;
        $params     = [];
        $request    = $this->initialGetFeature($url, $params);
        if ($request->getStatusCode() == 200) {
            $data   = json_decode($request->getBody(), true);
            return $data['data'];
        } else {
            return [];
        }
    }
    public function getCategories()
    {
        $url        = "categories";
        $params     = [];
        $request    = $this->initialGetFeature($url, $params);
        if ($request->getStatusCode() == 200) {
            $data   = json_decode($request->getBody(), true);
            return $data['data'];
        } else {
            return [];
        }
    }
    public function getRoadMap()
    {
        $url        = "roadmap";
        $params     = [];
        $request    = $this->initialGetFeature($url, $params);
        if ($request->getStatusCode() == 200) {
            $data   = json_decode($request->getBody(), true);
            return $data['data'];
        } else {
            return [];
        }
    }
    public function getMentor()
    {
        $url        = "mentors";
        $params     = [];
        $request    = $this->initialGetFeature($url, $params);
        if ($request->getStatusCode() == 200) {
            $data   = json_decode($request->getBody(), true);
            return $data['data'];
        } else {
            return [];
        }
    }

    public function getChapters($id)
    {
        $url        = "chapters";
        $params     = [
            'course_id' => $id,
        ];
        $request    = $this->initialGetFeature($url, $params);
        if ($request->getStatusCode() == 200) {
            $data   = json_decode($request->getBody(), true);
            return $data['data'];
        } else {
            return [];
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'mentor_id' => 'required',
            'roadmap_id' => 'required',
            'category_id' => 'required',
        ]);

        $refreshToken   = $this->getRefreshToken();
        $url        = "courses";
        $token      = Session::get('access_token');
        $data       = $request->all();
        if ($request->thumbnail) {
            $thumbnail = media2($request->thumbnail);
            $data['thumbnail'] = $thumbnail['images'];
        }
        $data['status']         = 'draft';
        $data['certificate']    = true;
        $data['mentor_id']      = (int)$request->mentor_id;
        $data['category_id']    = (int)$request->category_id;
        $params             = [];
        $request            = $this->initialPostFeature($url, $params, $data, $token);
        $status             = $request->getStatusCode();
        if ($status == 200) {
            return redirect()->back()->with('success', 'Success !');
        } elseif ($status == 403) {
            $refreshToken   = $this->getRefreshToken();
            $token          = Session::get('access_token');
            $request        = $this->initialPostFeature($url, $params, $data, $token);
            if ($request->getStatusCode() == 200) {
                return redirect()->back()->with('success', 'Success !');
            } elseif ($request->getStatusCode() == 400) {
                $error      = json_decode($request->getBody(), true);
                $message    = $error['error'][0]['message'];
                return redirect()->back()->with('danger', $message);
            } else {
                return redirect()->back()->with('danger', 'Invalid request Access denied');
            }
        } elseif ($status == 400) {
            $error = json_decode($request->getBody(), true);
            $message = $error['error'][0]['message'];
            return redirect()->back()->with('danger', $message);
        } else {
            return redirect()->back()->with('danger', 'Internal Server Error');
        }
    }

    public function destroy($id)
    {
        $token  = Session::get("access_token");
        $url    = "courses/" . $id;
        $params = [];

        $request = $this->initialDeleteFeature($url, $params, $token);
        $status = $request->getStatusCode();
        if ($status == 200) {
            return redirect()->back()->with('success', 'Success !');
        } elseif ($status == 403) {
            $refreshToken = $this->getRefreshToken();
            $token = Session::get('access_token');
            $request = $this->initialDeleteFeature($url, $params, $token);
            if ($request->getStatusCode() == 200) {
                return redirect()->back()->with('success', 'Success !');
            } else {
                $error = json_decode($request->getBody(), true);
                $message = $error['error'][0]['message'];
                return redirect()->back()->with('error', $message);
            }
        } else {
            return redirect()->back()->with('danger', 'Internal Server Error');
        }
    }

    public function update(Request $request)
    {
        if ($request->id) {
            $request->validate([
                'name' => 'required',
                'type' => 'required',
                'mentor_id' => 'required',
                'roadmap_id' => 'required',
                'category_id' => 'required',
                'status' => 'required',
            ]);

            $refreshToken   = $this->getRefreshToken();
            $url        = "courses/" . $request->id;
            $token      = Session::get('access_token');
            $data       = $request->all();
            if ($request->thumbnail) {
                $thumbnail = media2($request->thumbnail);
                $data['thumbnail'] = $thumbnail['images'];
            } else {
                $data['thumbnail'] = $request->thumbnail_old;
            }
            $data['certificate']    = true;
            $data['mentor_id']      = (int)$request->mentor_id;
            $data['category_id']    = (int)$request->category_id;
            $params             = [];
            $request            = $this->initialPutFeature($url, $params, $data, $token);
            $status             = $request->getStatusCode();
            if ($status == 200) {
                return redirect()->back()->with('success', 'Success !');
            } elseif ($status == 403) {
                $refreshToken   = $this->getRefreshToken();
                $token          = Session::get('access_token');
                $request        = $this->initialPutFeature($url, $params, $data, $token);
                if ($request->getStatusCode() == 200) {
                    return redirect()->back()->with('success', 'Success !');
                } elseif ($request->getStatusCode() == 400) {
                    $error      = json_decode($request->getBody(), true);
                    $message    = $error['error'][0]['message'];
                    return redirect()->back()->with('danger', $message);
                } else {
                    return redirect()->back()->with('danger', 'Invalid request Access denied');
                }
            } elseif ($status == 400) {
                $error = json_decode($request->getBody(), true);
                $message = $error['error'][0]['message'];
                return redirect()->back()->with('danger', $message);
            } else {
                return redirect()->back()->with('danger', 'Internal Server Error');
            }
        }
    }
}
