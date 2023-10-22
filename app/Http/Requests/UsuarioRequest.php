<?php

namespace App\Http\Requests;

class UsuarioRequest extends DefaultRequest
{

    public function setMessages()
    {
        return [
            'email.required'         => 'Obrigatório.',
            'email.email'            => 'Precisa ser uma email válido.',
            'email.min'              => 'Minímo de 10 caracteres.',
            'email.max'              => 'Máximo 255 de caracteres.',
            'email.unique'           => 'Email já cadastrado',

            'password.required'      => 'Obrigatório.',
            'password.min'           => 'Minímo de 10 caracteres.',
            'password.max'           => 'Máximo 255 de caracteres.',

            'level.required'         => 'Obrigatório.',
            'nome_completo.required' => 'Obrigatório.',
            'nome_completo.min'      => 'Minímo de 10 caracteres.',
            'nome_completo.max'      => 'Máximo 255 de caracteres.',

            'nome_abrev.required'    => 'Obrigatório.',
            'nome_abrev.min'         => 'Minímo de 10 caracteres.',
            'nome_abrev.max'         => 'Máximo 255 de caracteres.',

            'foto.required'         => 'Obrigatório.',
        ];
    }

    public function setRules()
    {
        return [
            'email'                 => 'required|min:10|max:255|unique:usuarios|email',
            'password'              => 'required|min:10|max:255',
            'level'                 => 'required',
            'nome_completo'         => 'required',
            'nome_abrev'            => 'required',
            'foto'                  => 'required',
        ];
    }
}
