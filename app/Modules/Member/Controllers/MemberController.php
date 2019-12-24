<?php

namespace App\Modules\Member\Controllers;


use App\Events\Backend\SendSmsToMember;
use App\Http\Requests\Member\StoreMemberRequest;
use App\Modules\Account\Models\Income;
use App\Modules\Library\Models\BookBorrow;
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
        return view('Member::index')
            ->withUsers($this->memberRepository->getActivePaginated(10, 'id', 'desc'));
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
        return view('Member::create')
            ->withRoles($roleRepository->with('permissions')->get(['id', 'name']))
            ->withPermissions($permissionRepository->get(['id', 'name']));
    }

    /**
     * @param StoreUserRequest $request
     *
     * @throws \Throwable
     * @return mixed
     */
    public function store(StoreMemberRequest $request)
    {
        $this->memberRepository->create($request->only(
            'name',
            'name_bn',
            'mobile',
            'educational_qualification',
            'occupation',
            'job_position',
            'present_address',
            'permanent_address',
            'blood_group',
            'nid',
            'passport',
            'dob',
            'email',
            'password',
            'active',
            'confirmation_code',
            'confirmed',
            'roles',
            'permissions'
        ));

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
        $data['books']   = BookBorrow::where('member_id', $userId)->get();
        $data['total_income']    = Income::where('member_id', $userId)->sum('amount');
        $data['current_income']  = Income::where('member_id', $userId)->whereBetween('created_at',[$start_of_month,$end_of_month])->sum('amount');
//        dd($data['total_income'],$data['current_income']);

//        $data['expense'] = Expense::where('user_id', $userId)->sum('amount');
//        $data['pending'] = Income::where('user_id', $userId)->sum('pending_amount');
//        $data['today_suscription'] = Expense::where('user_id', $userId)->whereBetween('created_at',[$start_of_today,$end_of_today])->sum('amount');
//        $data['current_suscription'] = Expense::where('user_id', $userId)->whereBetween('created_at',[$start_of_month,$end_of_month])->sum('amount');

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
        $user = User::find($userId);
        return view('Member::edit')
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
    public function update($userId,Request $request)
    {
        $member = User::find($userId);
        $member->name                       = $request->get('name');
        $member->name_bn                    = $request->get('name_bn');
        $member->mobile                     = $request->get('mobile');
        $member->educational_qualification  = $request->get('educational_qualification');
        $member->occupation                 = $request->get('occupation');
        $member->job_position               = $request->get('job_position');
        $member->present_address            = $request->get('present_address');
        $member->permanent_address          = $request->get('permanent_address');
        $member->nid                        = $request->get('nid');
        $member->passport                   = $request->get('passport');
        $member->blood_group                = $request->get('blood_group');
        $member->dob                        = $request->get('dob');
        $member->save();
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

}
