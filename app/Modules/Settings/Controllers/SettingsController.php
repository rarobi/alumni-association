<?php

namespace App\Modules\Settings\Controllers;

use App\Models\Auth\User;
use App\Modules\Settings\Models\Batch;
use App\Modules\Settings\Models\BatchAdminEmail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user             = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Settings::change-password.change_password");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $current_time = Carbon::now()->format('Y-m-d H:i:s');

        $userId =   Auth::id();
        $currentPassword = $request->input('current_password');
        $newPassword     = $request->input('new_password');
        $verifyPassword  = $request->input('confirm_password');

        $user = User::find($userId);

        if( ! $user instanceof $this->user) {
            return redirect()->route('settings.alumni.change-password')->withFlashSuccess('We can\'t find a user with that e-mail address');
        }

        if(! \Hash::check($currentPassword, $user->password)) {
            return redirect()->route('settings.alumni.change-password')->withFlashSuccess('Current password does not match with provided password');
        }

        if( $newPassword != $verifyPassword) {
            return redirect()->route('settings.alumni.change-password')->withFlashSuccess('New password does not match with confirm password');
        }

        $user->password            = bcrypt($newPassword);
        $user->password_changed_at = $current_time;
        $user->save();

        Auth::login($user);

        return redirect()->route('settings.alumni.change-password')->withFlashSuccess('Password update successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function batchAdminEmail() {
        $data['batches'] = Batch::pluck('name', 'id');
        $data['batchAdminEmails'] = BatchAdminEmail::orderBy('id', 'DESC')->get();
        return view("Settings::batch-admin-emails.index", $data);
    }

    public function addBatchAdminEmail(Request $request){

        $batch_admin_email = new BatchAdminEmail();
        $batch_admin_email->batch = $request->input('batch_id');
        $batch_admin_email->email = $request->input('email');
        $batch_admin_email->save();

        return redirect()->route('settings.alumni.batch-admin-email')->withFlashSuccess('Email added successfully');
    }


}
