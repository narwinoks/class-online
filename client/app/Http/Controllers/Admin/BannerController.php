<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BannerController extends BaseController
{
    public function index()
    {
        return view('features.admin.banner.index');
    }
    public function create(Request $request)
    {
        $types = ['public', 'my_learning', 'my_course', 'my_roadmap', 'disusstions', 'webinar', 'tutorial'];
        return view('features.admin.banner.create', compact('types'));
    }

    public function store(Request $request)
    {
        $token  = Session::get("access_token");
        $url    = "banner";
        $data   = $request->all();
        if ($request->image_data) {
            $banner =  media2($request->image_data);
            $data['image'] = $banner['images'];
        }
        $params = [];
        $request = $this->initialPostFeature($url, $params, $data, $token);
        $status = $request->getStatusCode();
        if ($status == 200) {
            return redirect()->back()->with('success', 'Success !');
        } elseif ($status == 403) {
            $refreshToken = $this->getRefreshToken();
            $token = session()->get('access_token');
            $request = $this->initialPostFeature($url, $params, $data, $token);
            $status = $request->getStatusCode();
            if ($status == 200) {
                return redirect()->back()->with('success', 'Success !');
            } else {
                $message = json_decode($request->getBody(), true);
                return redirect()->back()->with('danger', $message['message']);
            }
        } elseif ($status == 400) {
            $message = json_decode($request->getBody(), true);
            return redirect()->back()->with('danger', $message['message']);
        } else {
            $message = json_decode($request->getBody(), true);
            return redirect()->back()->with('danger', $message['message']);
        }
    }

    public function delete(Request $request, $id)
    {
        $token = Session::get("access_token");
        $url = "banner/" . $id;
        $params = [];
        $request = $this->initialDeleteFeature($url, $params, $token);
        $status = $request->getStatusCode();
        if ($status == 200) {
            return redirect()->back()->with('success', 'Success !');
        } elseif ($status == 403) {
            $refreshToken = $this->getRefreshToken();
            $token = session()->get('access_token');
            $request = $this->initialDeleteFeature($url, $params, $token);
        } elseif ($status == 400) {
            $message = json_decode($request->getBody(), true);
            return redirect()->back()->with('danger', $message['message']);
        } else {
            $message = json_decode($request->getBody(), true);
            return redirect()->back()->with('danger', $message['message']);
        }
    }

    public function edit(Request $request, $id)
    {
        $types = ['public', 'my_learning', 'my_course', 'my_roadmap', 'disusstions', 'webinar', 'tutorial'];
        $url = "banner/" . $id;
        $params = [];
        $request = $this->initialGetFeature($url, $params);
        if ($request->getStatusCode() == 200) {
            $data = json_decode($request->getBody(), true);
            $banner = $data['data'];
            return view('features.admin.banner.edit', compact('types', 'banner'));
        }
        abort(403);
    }

    public function update(Request $request)
    {
        if ($request->id) {
            $data = $request->all();
            $token = Session::get("access_token");
            $url = "banner/" . $request->id;
            $params = [];
            $request = $this->initialPutFeature($url, $params, $data, $token);
            $status = $request->getStatusCode();
            if ($status == 200) {
                return redirect()->back()->with('success', 'Success !');
            } elseif ($status == 403) {
                $refreshToken = $this->getRefreshToken();
                $token = session()->get('access_token');
                $request = $this->initialPutFeature($url, $params, $data, $token);
            } elseif ($status == 400) {
                $message = json_decode($request->getBody(), true);
                return redirect()->back()->with('danger', $message['message']);
            } else {
                $message = json_decode($request->getBody(), true);
                return redirect()->back()->with('danger', $message['message']);
            }
        }
    }
}
