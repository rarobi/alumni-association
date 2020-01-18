<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Gallery\Models\Gallery;
use App\Modules\Settings\Models\Batch;
use App\Models\Auth\User;

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
        $data['batches'] = Batch::orderBy('id', 'ASC')->paginate(6);
        return view('frontend.pages.member', $data);
    }

    public function memberList($id) {
        $data['members'] = User::leftJoin('user_profile', 'users.id', '=', 'user_profile.user_id')->where('batch_id', $id)
            ->paginate(12);
        return view('frontend.pages.member_list',  $data);
    }

    public function memberDetails($id){
        $data['member'] = User::find($id);
        return view('frontend.pages.member_details', $data);
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
        $data['galleries'] =  Gallery::orderBy('id', 'DESC')->paginate(10);
        return view('frontend.pages.gallery', $data);
    }

    public function contact(){
        return view('frontend.pages.contact');
    }

    public function registrationRules() {
        return view('frontend.pages.rules');
    }
}
