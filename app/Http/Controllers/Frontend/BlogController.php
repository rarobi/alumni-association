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

    public function newsAll() {
        return view('frontend.pages.news_all');
    }

    public function newsDetails() {
        return view('frontend.pages.news_details');
    }

    public function eventsAll() {
        return view('frontend.pages.events_all');
    }

    public function eventDetails() {
        return view('frontend.pages.event_details');
    }

    public function announcementAll(){
        return view('frontend.pages.announcement_all');
    }

    public function announcementDetails() {
        return view('frontend.pages.announcement_details');
    }
}
