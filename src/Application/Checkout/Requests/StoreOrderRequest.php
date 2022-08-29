<?php

namespace Application\Checkout\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'order_id' => ['required' , 'exists:orders.id'],
            'user_id' => ['required' , 'exists:users,id'],
            'discount_id' => ['nullable' , 'exists:discount_codes.id'],
            'status' => 'doing'
        ];
    }
}
