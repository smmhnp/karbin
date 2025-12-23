<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class profileRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'current_password' => 'nullable',

            'new_password' => 'nullable|min:6|required_with:confirm_new_password',
            'confirm_new_password' => 'nullable|same:new_password|required_with:new_password',

            'firstname' => 'nullable|string|max:255',
            'lastname'  => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'current_password.required' => 'وارد کردن رمز عبور فعلی الزامی است.',
            'new_password.required' => 'وارد کردن رمز عبور جدید الزامی است.',
            'new_password.min' => 'رمز عبور جدید باید حداقل ۶ کاراکتر باشد.',
            'confirm_new_password.required' => 'تأیید رمز عبور جدید الزامی است.',
            'confirm_new_password.same' => 'تأیید رمز عبور جدید با رمز عبور جدید مطابقت ندارد.',
        ];
    }
}
