<?php

namespace App\Modules\Settings\Controllers;

use App\Modules\Settings\Models\Batch;
use App\Modules\Settings\Models\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    public function index()
    {
        $data['sessions'] = Session::orderBy('id', 'DESC')->get();
        return view("Settings::session.index",$data);
    }

    public function store(Request $request)
    {
        $session_name   = $request->input('session');

        if(!empty($session_name)) {
            $session = new  Session();
            $session->session   = $session_name;
            $session->save();
        }
        return redirect()->route('settings.alumni.session.index')->withFlashSuccess('Session created successfully');
    }

    public function edit($id)
    {
        $data['session'] = Session::findOrFail($id);
        return view("Settings::session.edit",$data);
    }

    public function update(Request $request, $id)
    {
        $session_name    = $request->input('session');

        $session  = Session::findOrFail($id);
        $session->session   = $session_name;
        $session->save();

        return redirect()->route('settings.alumni.session.index')->withFlashSuccess('Session updated successfully');
    }

    public function destroy($id)
    {
        $session  = Session::findOrFail($id);
        $session->delete();
        return redirect()->route('settings.alumni.session.index')->withFlashSuccess('Session delete successfully');

    }
}
