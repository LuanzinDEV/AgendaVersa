<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarefaRequest extends FormRequest
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
            'titulo' => 'required|string|max:45',
            'descricao' => 'nullable|string|max:100',
            'hora_inicio' => 'required',
            'hora_fim' => 'required|after_or_equal:hora_inicio',
        ];
    }

    /**
     * Customize the error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'titulo.required' => 'O título da tarefa é obrigatório.',
            'titulo.string' => 'O título da tarefa deve ser uma string.',
            'titulo.max' => 'O título da tarefa não pode ter mais de 45 caracteres.',
            'descricao.string' => 'A descrição deve ser uma string.',
            'descricao.max' => 'A descrição não pode ter mais de 100 caracteres.',
            'hora_inicio.date_format' => 'A hora de início deve estar no formato Y-m-d H:i:s.',
            'hora_fim.date_format' => 'A hora de fim deve estar no formato Y-m-d H:i:s.',
            'hora_fim.after_or_equal' => 'A hora de fim deve ser igual ou após a hora de início.',
        ];
    }
}
