<?php

namespace App\Http\Requests;

class CursoRequest extends DefaultRequest
{

    public function setMessages()
    {
        return [
            'nome.required'         => 'Obrigatório.',
            'nome.min'              => 'Minímo de 5 caracteres.',
            'nome.max'              => 'Máximo 255 de caracteres.',
            'nome.unique'           => 'Curso já cadastrado',
        ];
    }

    public function setRules()
    {
        return [
            'nome'                  => 'required|min:5|max:255|unique:cursos',
        ];
    }
}
