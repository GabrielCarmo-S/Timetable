<?php

namespace App\Http\Requests;

class CourseCreateRequest extends DefaultRequest
{

    public function setMessages()
    {
        return [
            'course_name.required'         => 'Obrigatório.',
            'course_name.min'              => 'Minímo de 5 caracteres.',
            'course_name.max'              => 'Máximo 255 de caracteres.',
            'course_name.unique'           => 'Curso já cadastrado',
        ];
    }

    public function setRules()
    {
        return [
            'course_name'                  => 'required|min:5|max:255|unique:courses',
        ];
    }
}
