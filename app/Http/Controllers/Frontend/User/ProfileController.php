<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Repositories\Frontend\Auth\UserRepository;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

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
//        dd($request->all());
        $input_image = $_FILES["image_path"];

        $prefix = date('Ymd_');
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
