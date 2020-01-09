<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
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
//        dd($request->file('image_path'));
        $input_image = $_FILES["image_path"];

//        $prefix = date('Ymd_');
        $path = '/uploads/member_profile/';
        $destinationPath = public_path().$path;
//        dd($destinationPath);
        $fileName = sha1(time()).'-'.basename($request->file('image_path')->getClientOriginalName());
        $target_file_name = $destinationPath .$fileName;

        \File::exists($destinationPath) or \File::makeDirectory($destinationPath);

        if (move_uploaded_file($request->file('image_path')->getPathname(), $target_file_name)) {
            $requestedData['image_path']         = $fileName;
        } else {
            throw new \Exception('Error while uploading');
        }
//        dd($input_image['name']);
//        if ($request->file('photo')) {
//            $mime_type = $input_image['name']->getClientMimeType();
//            if(!in_array($mime_type,['image/jpeg','image/jpg','image/png'])){
//                return redirect('member/create')->with('flash_danger','Profile image must be png or jpg or jpeg format!');
//            }
//            $photoFile = trim(sprintf("%s", uniqid($prefix, true))) .'.'.$input_image['name']->getClientOriginalExtension();
//            $photo->move('uploads/member_profile/', $photoFile);
//            $member_profile->image = $photoFile;
//        }
    }
}
