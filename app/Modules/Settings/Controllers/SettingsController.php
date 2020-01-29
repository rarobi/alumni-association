<?php

namespace App\Modules\Settings\Controllers;

use App\Models\Auth\User;
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

        try {
        $userId =   Auth::id();
        $currentPassword = $request->input('current_password');
        $newPassword     = $request->input('new_password');
        $verifyPassword  = $request->input('confirm_password');

        $user = User::find($userId);

        if( ! $user instanceof $this->user) {
            throw new \Exception("We can't find a user with that e-mail address");
        }

        if(! \Hash::check($currentPassword, $user->password)) {
            throw new \Exception("Current password does not match with provided password");
        }

        if( $newPassword != $verifyPassword) {
            throw new \Exception("New password does not match with confirm password");
        }

        $user->password            = bcrypt($newPassword);
        $user->password_changed_at = $current_time;
        dd(2,$user);
        $user->save();

            $data['status_code']    = $this->getStatusCode();
            $data['status']         = 'success';
            $data['message']        = 'Password successfully updated';


        } catch(\Exception $e) {
            $this->setStatusCode(400);
            $data['status_code']    = $this->getStatusCode();
            $data['status']         = 'error';
            $data['error']          = $e->getMessage();

        } finally {

            return response()->json($data);
            return redirect()->route('settings.alumni.change-password')->withFlashSuccess('Batch created successfully');
        }
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


}
