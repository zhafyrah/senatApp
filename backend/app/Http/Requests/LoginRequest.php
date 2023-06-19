<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    // message dibuat sama untuk keamaan
    public function messages(): array {
        return [
            'email.required' => 'Email dan Password Tidak Terdaftar',
            'password.required' => 'Email dan Password Tidak Terdaftar',
        ];
    }
}
