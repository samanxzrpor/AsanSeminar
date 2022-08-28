<?php

namespace Application\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string','min:3' ,'max:54'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string','regex:/^([0-9\s\-\+\(\)]*)$/' ,'min:10' ,'max:14'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
