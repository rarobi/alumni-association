<?php

namespace App\Modules\Member\Controllers;

use App\Http\Requests\Member\UpdateMemberPasswordRequest;
use App\Models\Auth\User;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Auth\UserRepository;
use App\Http\Requests\Backend\Auth\User\ManageUserRequest;

/**
 * Class UserPasswordController.
 */
class MemberPasswordController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @return mixed
     */
    public function edit(User $user)
    {
        return view('Member::change-password')
            ->withUser($user);
    }

    /**
     * @param UpdateUserPasswordRequest $request
     * @param User                      $user
     *
     * @throws \App\Exceptions\GeneralException
     * @return mixed
     */
    public function update($userId,UpdateMemberPasswordRequest $request, User $user)
    {
        dd($userId);
        $this->userRepository->updatePassword($user, $request->only('password'));

        return redirect()->route('member.index')->withFlashSuccess(__('alerts.backend.users.updated_password'));
    }
}
