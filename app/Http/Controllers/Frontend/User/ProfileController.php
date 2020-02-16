<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\Education;
use App\Models\Profession;
use App\Models\UserProfile;
use App\Modules\Settings\Models\Batch;
use App\Modules\Settings\Models\Session;
use App\Repositories\Frontend\Auth\UserRepository;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;

/**
 * Class ProfileController.
 */
class ProfileController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * ProfileController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $user_id = Auth::id();
        $data['user'] = User::findOrFail($user_id);
        $data['user_educations'] = Education::where('user_id', $user_id)->orderBy('order', 'DESC')->get();
        $data['user_professions'] = Profession::where('user_id', $user_id)->orderBy('order', 'DESC')->get();

        return view('frontend.pages.profile', $data);
    }

    public function editProfile ($id){

        $data['batches'] = Batch::pluck('name','id');
        $data['sessions'] = Session::pluck('session', 'session');
        $data['user'] = User::findOrFail($id);

//        dd($data['user']);
        return view('frontend.pages.edit-profile', $data);
    }

    public function updateProfile(Request $request, $id) {
//        dd($request->all());

//        $user = User::firstOrNew(['id' => $id, $request->all()]);
//        $user->save();
//        $user_profile = UserProfile::firstOrNew(['user_id' => $user->id, $request->all()]);
//        $user_profile->save();

        $user = User::findOrFail($id);
        $user->first_name   = $request->input('name');
        $user->mobile   = $request->input('mobile');
        $user->blood_group   = $request->input('blood_group');
        $user->dob   = $request->input('dob');
        $user->save();

        $user_profile = UserProfile::where('user_id', $id)->first();

        if(is_null($user_profile)){
            $user_profile = new UserProfile();
            $user_profile->user_id  = $user->id;
            $user_profile->occupation  = $request->input('occupation');
            $user_profile->job_place  = $request->input('job_place');
            $user_profile->job_position  = $request->input('job_position');
            $user_profile->present_address  = $request->input('present_address');
            $user_profile->parmanent_address  = $request->input('permanent_address');
            $user_profile->nid  = $request->input('nid');
            $user_profile->save();
        } else {
            $user_profile->occupation  = $request->input('occupation');
            $user_profile->job_place  = $request->input('job_place');
            $user_profile->job_position  = $request->input('job_position');
            $user_profile->present_address  = $request->input('present_address');
            $user_profile->parmanent_address  = $request->input('permanent_address');
            $user_profile->nid  = $request->input('nid');
            $user_profile->save();
        }

        return redirect()->route('profile')->withFlashSuccess('Profile updated successfully');
    }

    /**
     * @param UpdateProfileRequest $request
     *
     * @throws \App\Exceptions\GeneralException
     * @return mixed
     */
    public function update(UpdateProfileRequest $request)
    {
        $output = $this->userRepository->update(
            $request->user()->id,
            $request->only('first_name', 'last_name', 'email', 'avatar_type', 'avatar_location'),
            $request->has('avatar_location') ? $request->file('avatar_location') : false
        );

        // E-mail address was updated, user has to reconfirm
        if (is_array($output) && $output['email_changed']) {
            auth()->logout();

            return redirect()->route('frontend.auth.login')->withFlashInfo(__('strings.frontend.user.email_changed_notice'));
        }

        return redirect()->route('frontend.user.account')->withFlashSuccess(__('strings.frontend.user.profile_updated'));
    }

    public function profileUpload(Request $request){

        $user_id  = Auth::id();
        $user_profile = UserProfile::where('user_id', $user_id)->first();

        $input_image = $request->file('image_path');

        $prefix = date('Ymd_');
        $file_path = '/uploads/member_profile/';

        $destinationPath = public_path().$file_path;
//        $destinationPath = base_path() . $file_path; // For outside of public path


        /* TODO: Need to trim the image original name & refactor the code */
        $fileName = $prefix.basename($input_image->getClientOriginalName());

        $target_file_name = $destinationPath .$fileName;

        \File::exists($destinationPath) or \File::makeDirectory($destinationPath);

        if (move_uploaded_file($input_image->getPathname(), $target_file_name)) {
            $user_profile->image         = $fileName;
            $user_profile->save();
        } else {
            throw new \Exception('Error while uploading');
        }
        $user_profile->save();
    }
}
