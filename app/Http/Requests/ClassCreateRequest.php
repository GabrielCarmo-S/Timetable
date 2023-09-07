<?php

namespace App\Http\Requests;

class ClassCreateRequest extends DefaultRequest
{

    public function setMessages()
    {
        return [
            'class_name.required'         => 'Obrigatório.',
            'class_name.min'              => 'Minímo de 5 caracteres.',
            'class_name.max'              => 'Máximo 255 de caracteres.',
            'class_name.unique'           => 'Modulo já cadastrado',

            'class_date.required'         => 'Obrigatório',
            'module_id.required'          => 'Obrigatório',
        ];
    }

    public function setRules()
    {
        return [
            'class_name'                  => 'required|min:5|max:255|unique:class',
            'class_date'                  => 'required',
            'module_id'                   => 'required',
        ];
    }
}
