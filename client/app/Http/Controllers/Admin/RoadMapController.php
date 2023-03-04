<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RoadMapController extends BaseController
{
    public function index()
    {
        return view('features.admin.roadmap.index');
    }

    public function create()
    {
        $level = ["all-level", "beginner", "intermediate", "advanced"];
        return view('features.admin.roadmap.create', compact('level'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'level' => 'required'
        ]);
        $url        = "roadmap";
        $params     = [];
        $data       = $request->only('name', 'price', 'description', 'level', 'type');
        $token      = Session::get('access_token');
        if ($request->logo) {
            $logo = media2($request->logo);
            $data['logo'] = $logo['images'];
        }
        $params     = [];
        $request    = $this->initialPostFeature($url, $params, $data, $token);
        $status     = $request->getStatusCode();
        if ($status == 200) {
            return redirect()->back()->with('success', 'Success !');
        } elseif ($status == 403) {
            $refreshToken   = $this->getRefreshToken();
            $token          = Session::get('access_token');
            $request        = $this->initialPostFeature($url, $params, $data, $token);
            if ($request->getStatusCode() == 200) {
                return redirect()->back()->with('success', 'Success !');
            } elseif ($request->getStatusCode() == 400) {
                $error = json_decode($request->getBody(), true);
                $message = $error['error'][0]['message'];
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

    public function edit(Request $request, $id)
    {
        $level      = ["all-level", "beginner", "intermediate", "advanced"];
        $url        = "roadmap/detail/" . $id;
        $params     = [];
        $api        = $this->initialGetFeature($url, $params);
        $data       = json_decode($api->getBody(), true);
        $roadMap    = $data['data'];
        return view('features.admin.roadmap.edit', compact('level', 'roadMap'));
    }

    public function update(Request $request)
    {
        if ($request->id) {
            $request->validate([
                'level' => 'required'
            ]);
            $url        = "roadmap/" . $request->id;
            $params     = [];
            $data       = $request->only('name', 'price', 'description', 'level', 'type');
            $token      = Session::get('access_token');
            if ($request->logo) {
                $logo = media2($request->logo);
                $data['logo'] = $logo['images'];
            }
            $request    = $this->initialPutFeature($url, $params, $data, $token);
            $status     = $request->getStatusCode();
            if ($status == 200) {
                return redirect()->back()->with('success', 'Updated !');
            } elseif ($status == 403) {
                $refreshToken   = $this->getRefreshToken();
                $token          = Session::get('access_token');
                $request        = $this->initialPutFeature($url, $params, $data, $token);
                if ($request->getStatusCode() == 200) {
                    return redirect()->back()->with('success', 'Updated !');
                } elseif ($request->getStatusCode() == 400) {
                    $error = json_decode($request->getBody(), true);
                    $message = $error['error'][0]['message'];
                    return redirect()->back()->with('danger', $message);
                } else {
                    return redirect()->back()->with('danger', 'Invalid request Access denied');
                }
            }
        } else {
            return redirect()->back()->with('danger', 'Internal Server Error');
        }
    }

    public function destroy($id)
    {
        $token  = Session::get("access_token");
        $url    = "roadmap/" . $id;
        $params = [];

        $request = $this->initialDeleteFeature($url, $params, $token);
        $status = $request->getStatusCode();
        if ($status == 200) {
            return redirect()->back()->with('success', 'Success !');
        } elseif ($status == 403) {
            $refreshToken   = $this->getRefreshToken();
            $token          = Session::get('access_token');
            $request        = $this->initialDeleteFeature($url, $params, $token);
            if ($request->getStatusCode() == 200) {
                return redirect()->back()->with('success', 'Success !');
            } else {
                $error      = json_decode($request->getBody(), true);
                $message    = $error['error'][0]['message'];
                return redirect()->back()->with('error', $message);
            }
        } else {
            return redirect()->back()->with('danger', 'Internal Server Error');
        }
    }
}
