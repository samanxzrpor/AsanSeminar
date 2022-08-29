<?php

namespace Application\Admin\Users\Requests;

use Domain\DiscountCode\Rules\SetLimitOfAmountByTypeRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return $this->user()->hasRole('Admin') ? true : false;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string','min:3' ,'max:54'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'string','regex:/^([0-9\s\-\+\(\)]*)$/' ,'min:10' ,'max:14'],
            'password' => ['nullable', 'string', 'min:8'],
            'role' => ['required', 'string', 'in:Admin,User,Master,Accountant']
        ];
    }
}
