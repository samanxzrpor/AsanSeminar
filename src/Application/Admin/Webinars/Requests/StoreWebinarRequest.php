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
            'title' => ['required' , 'string' , 'max' => 255],
            'description' => ['required' , 'string'] ,
            'price' => ['required' , 'int'],
            'event_date' => ['required' , 'date'],
            'percentage' => ['nullable' ,'int' , 'max:100'],
            'can_use_discount' => ['nullable' ,'bool'],
            'show_all' => ['nullable' , 'bool'],
            'max_capacity' => ['required' , 'int'],
        ];
    }
}
