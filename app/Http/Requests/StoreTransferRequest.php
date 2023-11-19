<?php

namespace App\Http\Requests;

use App\Models\Transfer;
use App\Models\Wallet;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

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
            'from_reference' => ['required', 'exists:wallets,reference',
                Rule::prohibitedIf(
                    ! Wallet::where('reference', $this->from_reference)->first()->user->is(user())
                ),
            ],
            'to_reference' => 'required|exists:wallets,reference|different:from_reference',
            'amount'       => ['required', 'decimal:0,2', 'min:100', 'max:'. Wallet::where('reference', $this->from_reference)->first()->balance],
        ];
    }
}
