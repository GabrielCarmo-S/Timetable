<?php

namespace App\Actions\LessonsTeachers;

use App\Models\LessonTeacher;

class Update
{
    public static function handle($data, $response)
    {
        try {
            LessonTeacher::updateLessonTeacher($data->all(), $data->lesson_id);

            return $response->send(true, null, 'Sucesso ao atualizar lição', []);
        } catch (\Throwable $th) {
            return $response->send(false, null, 'Erro ao atualizar lição', $th->getMessage());
        }
    }
}
