<?php

namespace App\Http\Requests;

class AulaRequest extends DefaultRequest
{

    public function setMessages()
    {
        return [
            'nome.required'             => 'Obrigatório.',
            'nome.min'                  => 'Minímo de 5 caracteres.',
            'nome.max'                  => 'Máximo 255 de caracteres.',
            'nome.unique'               => 'Aula já cadastrado',

            'inicio.required'           => 'Obrigatório',
            'termino.required'          => 'Obrigatório',
        ];
    }

    public function setRules()
    {
        return [
            'nome'                          => 'required|min:5|max:255|unique:aulas',
            'inicio'                        => 'required',
            'termino'                       => 'required',
        ];
    }
}
