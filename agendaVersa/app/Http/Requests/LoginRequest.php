<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\UsuarioModel;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'string',
                'email',
                function ($attribute, $value, $fail) {
                    $user = UsuarioModel::where('email', $value)->first();
                    if (!$user) {
                        $fail('E-mail não registrado.');
                    }
                }
            ],
            'senha' => [
                'required',
                'string',
                'min:8',
                function ($attribute, $value, $fail) {
                    $user = UsuarioModel::where('email', $this->input('email'))->first();
                    if ($user && !Hash::check($value, $user->senha)) {
                        $fail('Senha incorreta.');
                    }
                }
            ]
        ];
    }

    /**
     * Get the custom error messages for validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O e-mail deve ser um endereço de e-mail válido.',
            'senha.required' => 'O campo senha é obrigatório.'
        ];
    }
}
