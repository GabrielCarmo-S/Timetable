<?php

namespace App\Http\Requests;

class LessonTeacherCreateRequest extends DefaultRequest
{

    public function setMessages()
    {
        return [
            'lesson_id.required'           => 'Obrigatório',
            'teacher_id.required'          => 'Obrigatório',
        ];
    }

    public function setRules()
    {
        return [
            'lesson_id'                    => 'required',
            'teacher_id'                   => 'required',
        ];
    }
}
