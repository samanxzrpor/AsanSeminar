<?php

namespace Application\Admin\DiscountCodes\Requests;

use Domain\DiscountCode\Rules\SetLimitOfAmountByTypeRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreDiscountCodeRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required' , 'string'],
            'discount_code' => ['required'],
            'start_date' => ['required' , 'date'],
            'expire_date' => ['required' , 'date'],
            'is_active' => ['nullable' , 'boolean'],
            'use_count' => ['required', 'int'],
            'type' => ['required', 'in:percentage,amount'],
            'discount_amount' => ['required' , 'int' , 'min:0' , new SetLimitOfAmountByTypeRule($this->type)],
        ];
    }
}
