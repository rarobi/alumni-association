<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index() {
        return view('frontend.pages.blog');
    }

    public function show() {
        return view('frontend.pages.blog_details');
    }
}
