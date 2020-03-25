<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Education;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EducationController extends Controller
{
    public function addEducation(Request $request){
        $user_id = \Auth::id();

        $education = new Education();
        $education->user_id     = $user_id;
        $education->degree_name = $request->input('degree_name');
        $education->institute   = $request->input('institute');
        $education->completed_at = $request->input('completed_at');
//        $education->order       = $request->input('order');
        $education->save();
//        return redirect()->back()->with('message', 'Education Added succesfully.');
        return redirect()->to(url()->previous(). "#education")->with('message', 'Education Added succesfully.');
    }

    public function deleteEducation($id){

        $education = Education::find($id);
        $education->delete();
        return redirect()->to(url()->previous(). "#education")->with('message', 'Education deleted succesfully.');
    }
}
