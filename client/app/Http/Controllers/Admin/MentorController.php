<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    public function index(Request $request)
    {
        return view('features.admin.mentor.index');
    }
}
