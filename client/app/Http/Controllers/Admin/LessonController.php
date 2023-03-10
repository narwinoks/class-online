<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class LessonController extends BaseController
{
    public function create(Request $request)
    {
        $chapter_id = $request->chapter_id;
        return view('features.admin.lessons.create', compact('chapter_id'));
    }
    public function edit(Request $request)
    {
        $chapter_id = $request->chapter_id;
        $lesson = $this->getLesson($request->id);
        return view('features.admin.lessons.edit', compact('chapter_id', 'lesson'));
    }

    public function getLesson($id)
    {
        $params = [];
        $url = "lessons/" . $id;
        $request = $this->initialGetFeature($url, $params);
        if ($request->getStatusCode() == 200) {
            $data = json_decode($request->getBody(), true);
            $lesson = $data['data'];
            return $lesson;
        } else {
            return [];
        }
    }
    public function store(Request $request)
    {
        $data               = $request->only('chapter_id', 'name', 'video');
        $token              = Session::get('access_token');
        $url                = "lessons";
        $params             = [];
        $request            = $this->initialPostFeature($url, $params, $data, $token);
        $status             = $request->getStatusCode();
        if ($status == 200) {
            Session::flash('success', 'Success !');
            return response()->json(['message' => 'Success'], Response::HTTP_OK);
            // return redirect()->back()->with('success', 'Success !');
        } elseif ($status == 403) {
            $refreshToken   = $this->getRefreshToken();
            $token          = Session::get('access_token');
            $request        = $this->initialPostFeature($url, $params, $data, $token);
            if ($request->getStatusCode() == 200) {
                Session::flash('success', 'Success !');
                return response()->json(['message' => 'Success'], Response::HTTP_OK);
            } elseif ($request->getStatusCode() == 400) {
                $error      = json_decode($request->getBody(), true);
                $message    = $error['error'][0]['message'];
                return response()->json(['message' => $message], Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json(['message' => 'Invalid request Access denied'], Response::HTTP_BAD_REQUEST);
            }
        } elseif ($status == 400) {
            $error = json_decode($request->getBody(), true);
            $message = $error['error'][0]['message'];
            return response()->json(['message' => $message], Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => 'Internal Server Error'], Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(Request $request)
    {
        $data               = $request->only('chapter_id', 'name', 'video', 'id');
        $token              = Session::get('access_token');
        $url                = "lessons/" . $request->id;
        $params             = [];
        $request            = $this->initialPutFeature($url, $params, $data, $token);
        $status             = $request->getStatusCode();
        if ($status == 200) {
            Session::flash('success', 'Success !');
            return response()->json(['message' => 'Success'], Response::HTTP_OK);
        } elseif ($status == 403) {
            $refreshToken   = $this->getRefreshToken();
            $token          = Session::get('access_token');
            $request        = $this->initialPutFeature($url, $params, $data, $token);
            if ($request->getStatusCode() == 200) {
                Session::flash('success', 'Success !');
                return response()->json(['message' => 'Success'], Response::HTTP_OK);
            } elseif ($request->getStatusCode() == 400) {
                $error      = json_decode($request->getBody(), true);
                $message    = $error['error'][0]['message'];
                return response()->json(['message' => $message], Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json(['message' => 'Invalid request Access denied'], Response::HTTP_BAD_REQUEST);
            }
        } elseif ($status == 400) {
            $error = json_decode($request->getBody(), true);
            $message = $error['error'][0]['message'];
            return response()->json(['message' => $message], Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => 'Internal Server Error'], Response::HTTP_BAD_REQUEST);
        }
    }

    public function destroy(Request $request)
    {
        $id     = $request->id;
        $token  = Session::get("access_token");
        $url    = "lessons/" . $id;
        $params = [];

        $request    = $this->initialDeleteFeature($url, $params, $token);
        $status     = $request->getStatusCode();
        if ($status == 200) {
            return response()->json(['message' => 'Success'], Response::HTTP_OK);
        } elseif ($status == 403) {
            $refreshToken = $this->getRefreshToken();
            $token = Session::get('access_token');
            $request = $this->initialDeleteFeature($url, $params, $token);
            if ($request->getStatusCode() == 200) {
                return response()->json(['message' => 'Success'], Response::HTTP_OK);
            } else {
                $error = json_decode($request->getBody(), true);
                $message = $error['error'][0]['message'];
                return response()->json(['message' => $message], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json(['message' => 'Internal Server Error'], Response::HTTP_BAD_REQUEST);
        }
    }
}
