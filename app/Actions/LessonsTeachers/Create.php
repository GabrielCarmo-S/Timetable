<?php

namespace App\Actions\LessonsTeachers;

use App\Models\LessonTeacher;

class Create
{
    public  static function handle($data, $response)
    {
        try {
            LessonTeacher::createLessonTeacher([
                'lesson_id' => $data->lesson_id,
                'teacher_id' => $data->teacher_id,
            ]);

            return $response->send(true, null, 'Sucesso ao cadastrar lição', []);
        } catch (\Throwable $th) {
            return $response->send(false, null, 'Erro ao cadastrar lição', $th->getMessage());
        }
    }
}
