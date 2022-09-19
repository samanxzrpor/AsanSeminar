<?php

namespace Application\User\Wallet\Requests;

use Domain\Wallet\Rules\CheckWalletForWithdrawRule;
use Illuminate\Foundation\Http\FormRequest;

class ChargeWalletRequest extends FormRequest
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
            'deposit' => ['nullable'],
            'withdraw' => ['nullable'],
            'amount' => ['required' , 'min:1' ,new CheckWalletForWithdrawRule($this->withdraw)],
        ];
    }
}
