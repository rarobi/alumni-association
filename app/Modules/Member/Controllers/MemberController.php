<?php

namespace App\Modules\Member\Controllers;


use App\Models\UserProfile;
use App\Modules\Settings\Models\Batch;
use App\Modules\Settings\Models\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Events\Backend\Auth\User\UserDeleted;
use App\Repositories\Backend\Auth\RoleRepository;
use App\Repositories\Member\MemberRepository;
use App\Repositories\Backend\Auth\PermissionRepository;
use App\Http\Requests\Backend\Auth\User\StoreUserRequest;
use App\Http\Requests\Backend\Auth\User\ManageUserRequest;
use App\Http\Requests\Backend\Auth\User\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{

    protected $memberRepository;

    /**
     * UserController constructor.
     *
     * @param MemberRepository $memberRepository
     */
    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['users'] = User::where('member_status', 'approved')->orderBy('id', 'desc')->paginate(10);

        return view('Member::index',$data);
//            ->withUsers($this->memberRepository->getActivePaginated(10, 'id', 'desc'));
    }

    /**
     * @param ManageUserRequest    $request
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     *
     * @return mixed
     */
    public function create(RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        $data['batches'] = Batch::pluck('name','id');
        $data['sessions'] = Session::pluck('session', 'session');

        return view('Member::create', $data)
            ->withRoles($roleRepository->with('permissions')->get(['id', 'name']))
            ->withPermissions($permissionRepository->get(['id', 'name']));
    }

    /**
     * @param StoreUserRequest $request
     *
     * @throws \Throwable
     * @return mixed
     */
    public function store(Request $request)
    {
        $member = New User();
        $member->first_name = $request->input('name');
        $member->mobile = $request->input('mobile');
        $member->email = $request->input('email');
        $member->blood_group = $request->input('blood_group');
        $member->dob = $request->input('dob');
        $member->member_status = $request->input('member_status');
        $member->password = $request->input('password');
        $member->save();

        $member_profile = new UserProfile();
        $member_profile->user_id        = $member->id;
        $member_profile->batch_id       = $request->input('batch_id');
        $member_profile->session        = $request->input('session');
        $member_profile->passing_year   = $request->input('passing_year');
        $member_profile->roll           = $request->input('roll');
        $member_profile->transaction_id = $request->input('tranx_id');
        $member_profile->education_qualification = $request->input('educational_qualification');
        $member_profile->occupation = $request->input('occupation');
        $member_profile->job_position = $request->input('job_position');
        $member_profile->job_place = $request->input('job_place');
        $member_profile->present_address = $request->input('present_address');
        $member_profile->parmanent_address = $request->input('permanent_address');

        $prefix = date('Ymd_');
        $photo = $request->file('photo');

        if ($request->file('photo')) {
            $mime_type = $photo->getClientMimeType();
            if(!in_array($mime_type,['image/jpeg','image/jpg','image/png'])){
                return redirect('member/create')->with('flash_danger','Profile image must be png or jpg or jpeg format!');
            }
            $photoFile = trim(sprintf("%s", uniqid($prefix, true))) .'.'.$photo->getClientOriginalExtension();
            $photo->move('uploads/member_profile/', $photoFile);
            $member_profile->image = $photoFile;
        }
        $member_profile->save();

//        $this->memberRepository->create($request->only(
//            'name',
//            'mobile',
//            'educational_qualification',
//            'roll',
//            'batch_id',
//            'session',
//            'passing_year',
//            'occupation',
//            'job_position',
//            'job_place',
//            'present_address',
//            'permanent_address',
//            'blood_group',
//            'dob',
//            'nid',
//            'member_status',
//            'email',
//            'password',
//            'image',
//            'active',
//            'confirmation_code',
//            'confirmed',
//            'roles',
//            'permissions'
//        ));

        return redirect()->route('member.index')->withFlashSuccess('Member created successfully');
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @return mixed
     */
    public function show($userId)
    {
        $start_of_today = Carbon::now()->startOfDay()->format('Y-m-d H:i:s');
        $end_of_today   = Carbon::now()->endOfDay()->format('Y-m-d H:i:s');

        $start_of_month   = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        $end_of_month     = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

        $data['user']    = User::find($userId);

        return view('Member::show',$data);
    }

    /**
     * @param ManageUserRequest    $request
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     * @param User                 $user
     *
     * @return mixed
     */
    public function edit($userId, RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        $data['batches'] = Batch::pluck('name','id');
        $data['sessions'] = Session::pluck('session', 'session');

        $user = User::find($userId);
        return view('Member::edit', $data)
            ->withUser($user)
            ->withRoles($roleRepository->get())
            ->withUserRoles($user->roles->pluck('name')->all())
            ->withPermissions($permissionRepository->get(['id', 'name']))
            ->withUserPermissions($user->permissions->pluck('name')->all());
    }

    /**
     * @param UpdateUserRequest $request
     * @param User              $user
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     * @return mixed
     */
    public function update($userId, Request $request)
    {
//        dd($request->all(), $userId);

        $member = User::find($userId);;
        $member->first_name = $request->input('name');
        $member->mobile = $request->input('mobile');
//        $member->email = $request->input('email');
        $member->blood_group = $request->input('blood_group');
        $member->dob = $request->input('dob');
//        $member->member_status = $request->input('member_status');
//        $member->password = $request->input('password');
        $member->save();

        $user_profile = UserProfile::where('user_id', $userId)->first();
        if(is_null($user_profile)){
            $user_profile = new UserProfile();
            $user_profile->user_id  = $member->id;
            $user_profile->education_qualification  = $request->input('educational_qualification');
            $user_profile->roll  = $request->input('roll');
            $user_profile->batch_id  = $request->input('batch_id');
            $user_profile->session  = $request->input('session');
            $user_profile->passing_year  = $request->input('passing_year');
            $user_profile->occupation  = $request->input('occupation');
            $user_profile->job_place  = $request->input('job_place');
            $user_profile->job_position  = $request->input('job_position');
            $user_profile->present_address  = $request->input('present_address');
            $user_profile->parmanent_address  = $request->input('permanent_address');
            $user_profile->nid  = $request->input('nid');
//            $user_profile->save();
        } else {

            $user_profile->education_qualification  = $request->input('educational_qualification');
            $user_profile->roll  = $request->input('roll');
            $user_profile->batch_id  = $request->input('batch_id');
            $user_profile->session  = $request->input('session');
            $user_profile->passing_year  = $request->input('passing_year');
            $user_profile->occupation  = $request->input('occupation');
            $user_profile->job_place  = $request->input('job_place');
            $user_profile->job_position  = $request->input('job_position');
            $user_profile->present_address  = $request->input('present_address');
            $user_profile->parmanent_address  = $request->input('permanent_address');
            $user_profile->nid  = $request->input('nid');
//            $user_profile->save();
        }

        $prefix = date('Ymd_');
        $photo = $request->file('photo');

        if ($request->file('photo')) {
            $mime_type = $photo->getClientMimeType();
            if(!in_array($mime_type,['image/jpeg','image/jpg','image/png'])){
                return redirect('member/create')->with('flash_danger','Profile image must be png or jpg or jpeg format!');
            }
            $photoFile = trim(sprintf("%s", uniqid($prefix, true))) .'.'.$photo->getClientOriginalExtension();
            $photo->move('uploads/member_profile/', $photoFile);
            $user_profile->image = $photoFile;
        }
        $user_profile->save();

        return redirect()->route('member.index')->withFlashSuccess('Member updated successfully');
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @throws \Exception
     * @return mixed
     */
    public function destroy(ManageUserRequest $request, User $user)
    {
        $this->memberRepository->deleteById($user->id);

        event(new UserDeleted($user));

        return redirect()->route('member.deleted')->withFlashSuccess(__('alerts.backend.users.deleted'));
    }

    public function loggedInOut(Request $request)
    {
//        dd($request->all());
    }

    public function addMembership(Request $request, $id){
        $user = User::findOrFail($id);
        $membership_type = $request->input('membership_type');
        $user->membership_type = $membership_type;
        $user->save();
        return redirect()->route('member.index')->withFlashSuccess('Membership add successfully');
    }

    public function acceptMember($member_id) {

        $member = User::findOrFail($member_id);
        if(Auth::user()->hasRole('administrator')){
            $member->member_status  = 'approved';
        } else{
            $member->member_status  = 'reviewed';
        }
        $member->save();

        return redirect()->route('member.index')->withFlashSuccess('Member approved successfully');
    }

    public function pendingList() {

        if(Auth::user()->hasRole('administrator')){
            $data['pending_users'] = User::where('member_status', 'reviewed')->orderBy('id', 'desc')->paginate(10);
        } elseif (Auth::user()->hasRole('batch-admin')){
            $data['pending_users'] = User::where('member_status', 'pending')->orderBy('id', 'desc')->paginate(10);
        }
        return view('Member::pending_list',$data);
    }

}
