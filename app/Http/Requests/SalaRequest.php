<?php

namespace App\Http\Requests;

class SalaRequest extends DefaultRequest
{

    public function setMessages()
    {
        return [
            'nome.required'            => 'Obrigatório.',
            'nome.min'                 => 'Minímo de 5 caracteres.',
            'nome.max'                 => 'Máximo 255 de caracteres.',
            'data.required'            => 'Obrigatório',
            'inicio.required'          => 'Obrigatório',
            'termino.required'         => 'Obrigatório',
        ];
    }

    public function setRules()
    {
        return [
            'nome'                  => 'required|min:5|max:255',
            'data'                  => 'required',
            'inicio'                => 'required',
            'termino'               => 'required',
        ];
    }
}
