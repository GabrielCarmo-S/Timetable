<?php

namespace App\Http\Requests;

class ModuloRequest extends DefaultRequest
{

    public function setMessages()
    {
        return [
            'nome.required'             => 'Obrigatório.',
            'nome.min'                  => 'Minímo de 5 caracteres.',
            'nome.max'                  => 'Máximo 255 de caracteres.',
            'nome.unique'               => 'Modulo já cadastrado',

            'quando_comeca.required'    => 'Obrigatório',
            'quando_termina.required'   => 'Obrigatório',
        ];
    }

    public function setRules()
    {
        return [
            'nome'                  => 'required|min:5|max:255|unique:modulos',
            'quando_comeca'         => 'required',
            'quando_termina'        => 'required',
        ];
    }
}
