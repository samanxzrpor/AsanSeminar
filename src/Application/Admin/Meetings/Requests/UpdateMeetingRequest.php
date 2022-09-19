<?php

namespace Application\Admin\Meetings\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMeetingRequest extends FormRequest
{

    public function authorize()
    {
        return $this->user()->hasRole('Admin') ? true : false;
    }

    public function rules()
    {
        return [
            'title' => ['required' , 'string' , 'max:255'],
            'description' => ['required' , 'string' , 'max:1024'] ,
            'meeting_duration' => ['required' , 'numeric' , 'min:0'],
            'event_date' => ['required' , 'int'],
            'max_capacity' => ['required' , 'int' , 'min:1'],
            ];
    }
}
