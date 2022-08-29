<?php

namespace Application\Admin\Webinars\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWebinarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->hasRole('Admin') ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required' , 'string' , 'max:255'],
            'description' => ['required' , 'string'] ,
            'price' => ['required' , 'int' , 'min:0'],
            'event_date' => ['required' , 'string'],
            'percentage_discount' => ['nullable' ,'int' ,'min:0' , 'max:100'],
            'can_use_discount' => ['nullable' ,'in:on,off'],
            'show_all' => ['nullable' , 'in:on,off'],
            'max_capacity' => ['required' , 'int' , 'min:1'],
            'master_id' => ['required' , 'exists:users,id']

        ];
    }
}
