<?php

namespace App\Http\Requests;

class ModuleCreateRequest extends DefaultRequest
{

    public function setMessages()
    {
        return [
            'module_name.required'         => 'Obrigatório.',
            'module_name.min'              => 'Minímo de 5 caracteres.',
            'module_name.max'              => 'Máximo 255 de caracteres.',
            'module_name.unique'           => 'Modulo já cadastrado',

            'course_id.required'           => 'Obrigatório',
        ];
    }

    public function setRules()
    {
        return [
            'module_name'                  => 'required|min:5|max:255|unique:modules',
            'course_id'                    => 'required',
        ];
    }
}
