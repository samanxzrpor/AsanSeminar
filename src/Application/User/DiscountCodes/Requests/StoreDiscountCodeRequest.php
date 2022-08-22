<?php

namespace Application\User\DiscountCodes\Requests;

use Domain\DiscountCode\Roles\SetLimitOfAmountByTypeRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreDiscountCodeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'type' => ['required', 'in:percentage,amount'],
            'discount_amount' => ['required' , new SetLimitOfAmountByTypeRule($this->type)],
        ];
    }
}
