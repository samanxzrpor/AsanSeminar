<?php

namespace Application\Admin\Webinars\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWebinarRequest extends FormRequest
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
            'title' => ['nullable' , 'string' , 'max:255'],
            'description' => ['nullable' , 'string'] ,
            'price' => ['nullable' , 'int'],
            'event_date' => ['nullable' , 'string'],
            'percentage_discount' => ['nullable' ,'int' ,'min:0' , 'max:100'],
            'can_use_discount' => ['nullable' ,'in:on,off'],
            'show_all' => ['nullable' , 'in:on,off'],
            'max_capacity' => ['nullable' , 'int'],
            'master_id' => ['required' , 'exists:users,id']
        ];
    }
}
