<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Profession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfessionController extends Controller
{
    public function addProfession(Request $request){
        $user_id = \Auth::id();

        $profession = new Profession();
        $profession->user_id        = $user_id;
        $profession->company_name   = $request->input('company_name');
        $profession->designation    = $request->input('designation');
        $profession->location       = $request->input('location');
        $profession->order          = $request->input('order');
        $profession->save();

        return redirect()->to(url()->previous(). "#profession")->with('message', 'Profession Added succesfully.');
    }

    public function deleteProfession($id) {

        $profession = Profession::find($id);
        $profession->delete();
        return redirect()->to(url()->previous(). "#education")->with('message', 'Profession deleted succesfully.');
    }
}
