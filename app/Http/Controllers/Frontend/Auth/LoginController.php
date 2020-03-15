<?php

namespace App\Http\Controllers\Frontend\Auth;

use Illuminate\Http\Request;
use App\Helpers\Auth\AuthHelper;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Helpers\Auth\SocialiteHelper;
use App\Events\Frontend\Auth\UserLoggedIn;
use App\Events\Frontend\Auth\UserLoggedOut;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;

/**
 * Class LoginController.
 */
class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route(home_route(),auth()->user()->id);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('frontend.auth.login')
            ->withSocialiteLinks((new SocialiteHelper)->getSocialLinks());
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return config('access.users.username');
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => PasswordRules::login(),
        ]);
    }

    /**
     * The user has been authenticated.
     *
     * @param Request $request
     * @param         $user
     *
     * @throws GeneralException
     * @return \Illuminate\Http\RedirectResponse
     */


//    protected function authenticated(Request $request, $user)
//    {
//        /*
//         * deny access if account is not verified
//         * */
//        if($user->user_type != '1x101'){
//            if (!$user->verification_status){
//                auth()->logout();
//                return redirect()->route('login')->with('flash_danger', 'You need to verify your account. We have sent you an activation code, please check your email.');
//            }
//
//            /*
//             * deny access if account is not approved
//             * */
//            if(!$user->approve_status) {
//                auth()->logout();
//                return redirect()->route('login')->with('flash_danger', 'Your account is not approved . Please contact with authority');
//            }
//
//            /*
//             * deny access if account is deactivated
//             * */
//            if(!$user->activation_status) {
//                auth()->logout();
//                return redirect()->route('login')->with('flash_danger', 'Your account is currently deactivated . Please contact with authority');
//            }
//        }
//
//        $redirectPath = $this->redirectPath();
//
//        return redirect()->intended($redirectPath);
//
//    }


    protected function authenticated(Request $request, $user)
    {


        if($user->hasRole('member')){
            return redirect()->back()->with('flash_danger', 'Your are not allowed to access it. ');
        }

        if($user->member_status != 'approved'){
            auth()->logout();
            return redirect('/alumni-login')->with('flash_danger', 'Your request is not accepted yet. Please wait for confirmation. ');
        }

        if (! $user->isActive()) {
            auth()->logout();

            throw new GeneralException(__('exceptions.frontend.auth.deactivated'));
        }

        event(new UserLoggedIn($user));

        if (config('access.users.single_login')) {
            auth()->logoutOtherDevices($request->password);
        }

        return redirect()->intended($this->redirectPath());
    }

    /**
     * Log the user out of the application.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        // Remove the socialite session variable if exists
        if (app('session')->has(config('access.socialite_session_name'))) {
            app('session')->forget(config('access.socialite_session_name'));
        }

        // Remove any session data from backend
        resolve(AuthHelper::class)->flushTempSession();

        if(Auth::user()->hasRole(['administrator', 'batch-admin', 'payment-receiver-admin'])){
            // Fire event, Log out user, Redirect
            event(new UserLoggedOut($request->user()));

            // Laravel specific logic
            $this->guard()->logout();
            $request->session()->invalidate();

            return redirect()->route('frontend.auth.login');
        } else{
            // Fire event, Log out user, Redirect
            event(new UserLoggedOut($request->user()));

            // Laravel specific logic
            $this->guard()->logout();
            $request->session()->invalidate();

            return redirect('/alumni-login');
        }

    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logoutAs()
    {
        // If for some reason route is getting hit without someone already logged in
        if (! auth()->user()) {
            return redirect()->route('frontend.auth.login');
        }

        // If admin id is set, relogin
        if (session()->has('admin_user_id') && session()->has('temp_user_id')) {
            // Save admin id
            $admin_id = session()->get('admin_user_id');

            resolve(AuthHelper::class)->flushTempSession();

            // Re-login admin
            auth()->loginUsingId((int) $admin_id);

            // Redirect to backend user page
            return redirect()->route('admin.auth.user.index');
        }

        resolve(AuthHelper::class)->flushTempSession();

        auth()->logout();

        return redirect()->route('frontend.auth.login');
    }
}
