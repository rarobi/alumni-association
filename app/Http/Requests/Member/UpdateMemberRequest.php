<?php

namespace App\Http\Requests\Member;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateUserRequest.
 */
class UpdateMemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:191'],
            'name_bn' => ['required', 'max:191'],
            'mobile' => ['required', 'max:191'],
            'educational_qualification' => ['required', 'max:191'],
            'present_address' => ['required', 'max:191'],
            'permanent_address' => ['required', 'max:191'],
            'email' => ['required', 'email', 'max:191'],
            'roles' => ['required', 'array'],
        ];
    }
}
