<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'  => ['required', 'string', 'max:255'],
            'email'  => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', $this->notWeakPassword(...)],
            'terms'  => ['accepted'],
        ];
    }

    /**
     * Mirrors password-strength.js: reject when length < 8 or score <= 1.
     */
    private function notWeakPassword(string $attribute, mixed $value, \Closure $fail): void
    {
        $password = (string) $value;
        $score = 0;

        if (strlen($password) >= 8) {
            $score++;
        }

        if (preg_match('/[a-z]/', $password) && preg_match('/[A-Z]/', $password)) {
            $score++;
        }

        if (preg_match('/\d/', $password)) {
            $score++;
        }

        if (preg_match('/[^a-zA-Z0-9]/', $password)) {
            $score++;
        }

        if (strlen($password) < 8 || $score <= 1) {
            $fail(__('The password is too weak.'));
        }
    }
}
