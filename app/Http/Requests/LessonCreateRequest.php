<?php

namespace App\Http\Requests;

class LessonCreateRequest extends DefaultRequest
{

    public function setMessages()
    {
        return [
            'lesson_name.required'         => 'Obrigatório.',
            'lesson_name.min'              => 'Minímo de 5 caracteres.',
            'lesson_name.max'              => 'Máximo 255 de caracteres.',
            'lesson_name.unique'           => 'Modulo já cadastrado',
            'is_mandatory.required'        => 'Obrigatório',
            'lesson_date.required'         => 'Obrigatório',
            'lesson_time.required'         => 'Obrigatório',
            'module_id.required'           => 'Obrigatório',
        ];
    }

    public function setRules()
    {
        return [
            'lesson_name'                  => 'required|min:5|max:255|unique:lessons',
            'is_mandatory'                 => 'required',
            'lesson_date'                  => 'required',
            'lesson_time'                  => 'required',
            'module_id'                    => 'required',
        ];
    }
}
