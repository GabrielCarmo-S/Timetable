<?php

namespace App\Http\Requests;

class TeacherCreateRequest extends DefaultRequest
{

    public function setMessages()
    {
        return [
            'teacher_name.required'         => 'Obrigatório.',
            'teacher_name.min'              => 'Minímo de 5 caracteres.',
            'teacher_name.max'              => 'Máximo 255 de caracteres.',
            // 'teacher_name.unique'           => 'Professor já cadastrado',
        ];
    }

    public function setRules()
    {
        return [
            'teacher_name'                  => 'required|min:5|max:255',
        ];
    }
}
