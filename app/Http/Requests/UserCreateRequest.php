<?php

namespace App\Http\Requests;

class UserCreateRequest extends DefaultRequest
{

    public function setMessages()
    {
        return [
            'user_name.required'         => 'Obrigatório.',
            'user_name.min'              => 'Minímo de 10 caracteres.',
            'user_name.max'              => 'Máximo 150 de caracteres.',

            'user_email.required'        => 'Obrigatório.',
            'user_email.email'           => 'Precisa ser uma email válido.',
            'user_email.min'             => 'Minímo de 10 caracteres.',
            'user_email.max'             => 'Máximo 255 de caracteres.',
            'user_email.unique'          => 'Email já cadastrado',

            'user_password.required'     => 'Obrigatório.',
            'user_password.min'          => 'Minímo de 10 caracteres.',
            'user_password.max'          => 'Máximo 255 de caracteres.',

            'user_level.required'        => 'Obrigatório.',
        ];
    }

    public function setRules()
    {
        return [
            'user_name'                  => 'required|min:10|max:150',
            'user_email'                 => 'required|min:10|max:255|unique:users|email',
            'user_password'              => 'required|min:10|max:255',
            'user_level'                 => 'required'
        ];
    }
}
