<?php

namespace Application\Admin\DiscountCodes\Requests;

use Domain\DiscountCode\Rules\BeforeStartDateLimitRule;
use Domain\DiscountCode\Rules\ExpireBeforeStartDateRule;
use Domain\DiscountCode\Rules\SetLimitOfAmountByTypeRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDiscountCodeRequest extends FormRequest
{

    public function authorize(): bool
    {
        return $this->user()->hasRole('Admin') ? true : false;
    }

    public function rules()
    {
        return [
            'title' => ['required' , 'string', 'max:255'],
            'discount_code' => ['required', 'max:255'],
            'start_date' => ['required' , 'string' , new BeforeStartDateLimitRule()],
            'expire_date' => ['required' , 'string' , new ExpireBeforeStartDateRule($this->start_date)],
            'is_active' => ['nullable'],
            'discount_code_count' => ['required', 'int' , 'min:1'],
            'discount_type' => ['required', 'in:percentage,amount'],
            'amount' => ['required' , 'int' , 'min:0' , new SetLimitOfAmountByTypeRule($this->discount_type)],
            'webinar_id' => ['required' , 'exists:webinars,id'],
        ];
    }
}
