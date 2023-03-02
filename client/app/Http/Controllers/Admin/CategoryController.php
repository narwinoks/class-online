<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends BaseController
{
    public function index(Request $request)
    {
        return view('features.admin.categories.index');
    }

    public function create(Request $request)
    {
        return view('features.admin.categories.create');
    }

    public function store(Request $request)
    {
        $token  = Session::get("access_token");
        $url    = "categories";
        $data = $request->all();
        if ($request->logo) {
            $logo = media2($request->logo);
            $data['logo'] = $logo['images'];
        }
        $params = [];
        $request = $this->initialPostFeature($url, $params, $data, $token);
        $status = $request->getStatusCode();
        if ($status == 200) {
            return redirect()->back()->with('success', 'Success !');
        } elseif ($status == 403) {
            $refreshToken = $this->getRefreshToken();
            $token = Session::get('access_token');
            $request = $this->initialPostFeature($url, $params, $data, $token);
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

    public function destroy($id)
    {
        $token  = Session::get("access_token");
        $url    = "categories/" . $id;
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

    public function edit(Request $request, $id)
    {
        $token  = Session::get("access_token");
        $url    = "categories/" . $id;
        $params = [];
        $request = $this->initialGetFeature($url);
        $data = json_decode($request->getBody(), true);
        $category = $data['data'];
        return view('features.admin.categories.edit', compact('category'));
    }

    public function update(Request $request)
    {
        if ($request->id) {
            $token  = Session::get("access_token");
            $url    = "categories/" . $request->id;
            $data = $request->all();
            $data['logo'] = $request->logo ?? $request->logo_old;
            if ($request->logo) {
                $logo = media2($request->logo);
                $data['logo'] = $logo['images'];
            }
            $params = [];
            $request = $this->initialPutFeature($url, $params, $data, $token);
            $status = $request->getStatusCode();
            if ($status == 200) {
                return redirect()->back()->with('success', 'Updated !');
            } elseif ($status == 403) {
                $refreshToken = $this->getRefreshToken();
                $token = Session::get('access_token');
                $request = $this->initialPutFeature($url, $params, $data, $token);
                if ($request->getStatusCode() == 200) {
                    return redirect()->back()->with('success', 'Updated !');
                } elseif ($request->getStatusCode() == 400) {
                    $error = json_decode($request->getBody(), true);
                    $message = $error['error'][0]['message'];
                    return redirect()->back()->with('danger', $message);
                } else {
                    return redirect()->back()->with('danger', 'Invalid request Access denied');
                }
            } else {
                return redirect()->back()->with('danger', 'Internal Server Error');
            }
        }
    }
}
