<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class ChaptersController extends BaseController
{
    public function create(Request $request)
    {
        $courseId = $request->course_id;
        return view('features.admin.chapters.create', compact('courseId'));
    }

    public function store(Request $request)
    {
        $data               = $request->only('course_id', 'name');
        $token              = Session::get('access_token');
        $url                = "chapters";
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

    public function destroy(Request $request)
    {
        // dd($request->all());
        $id     = $request->id;
        $token  = Session::get("access_token");
        $url    = "chapters/" . $id;
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

    public function edit(Request $request)
    {
        $url = "chapters/" . $request->id;
        $courseId = $request->course_id;
        $params = [];
        $data = $this->initialGetFeature($url, $params);
        if ($data->getStatusCode() == 200) {
            $response = json_decode($data->getBody(), true);
            $chapter = $response['data'];
        }
        return view('features.admin.chapters.edit', compact('chapter', 'courseId'));
    }
    public function update(Request $request)
    {
        $data               = $request->only('id', 'name', 'course_id');
        $token              = Session::get('access_token');
        $url                = "chapters/" . $request->id;
        $params             = [];
        $request            = $this->initialPutFeature($url, $params, $data, $token);
        $status             = $request->getStatusCode();
        if ($status == 200) {
            Session::flash('success', 'Success !');
            return response()->json(['message' => 'Success'], Response::HTTP_OK);
            // return redirect()->back()->with('success', 'Success !');
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

    public function show($id)
    {
        $url        = "chapters/" . $id;
        $params     = [];
        $data       = $this->initialGetFeature($url, $params);
        $response   = json_decode($data->getBody(), true);
        $chapter    = $response['data'];
        $lessons    = $this->getLessons($chapter['id']);
        return view('features.admin.chapters.show', compact('chapter', 'lessons'));
    }

    public function getLessons($chapterId)
    {
        $url        = "lessons";
        $params     = [
            'chapter_id' => $chapterId
        ];
        $data       = $this->initialGetFeature($url, $params);
        if ($data->getStatusCode() == 200) {
            $response   = json_decode($data->getBody(), true);
            $lessons    = $response['data'];
            return $lessons;
        } else {
            return [];
        }
    }
}
