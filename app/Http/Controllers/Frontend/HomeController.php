<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
//    public function index()
//    {
//        return view('frontend.index');
//    }

    public function index(){
        return view('frontend.pages.home');
    }

    public function about(){
        return view('frontend.pages.about');
    }

    public function vision(){
        return view('frontend.pages.vision');
    }

    public function electedMembers(){
        return view('frontend.pages.elected_member');
    }
    public function members(){
        return view('frontend.pages.member');
    }

    public function memberList() {
        return view('frontend.pages.member_list');
    }

    public function memberDetails(){
        return view('frontend.pages.member_details');
    }

    public function notice(){
        return view('frontend.pages.notice');
    }

    public function noticeDetails() {
        return view('frontend.pages.notice_details');
    }

    public function blog(){
        return view('frontend.pages.blog');
    }

    public function gallery(){
        return view('frontend.pages.gallery');
    }

    public function contact(){
        return view('frontend.pages.contact');
    }

    public function registrationRules() {
        return view('frontend.pages.rules');
    }
}
