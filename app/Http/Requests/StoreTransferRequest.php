<?php

namespace App\Http\Requests;

use App\Models\Transfer;
use App\Models\Wallet;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTransferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'from_wallet_id' => ['required',
                Rule::prohibitedIf(! Wallet::where('id', $this->from_wallet_id)->first()->user->is(user())
            )],
            'reference' => 'required|exists:wallets',
            'amount'    => 'required|decimal:0,2|min:100'
        ];
    }

}
