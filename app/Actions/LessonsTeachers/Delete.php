<?php

namespace App\Actions\LessonsTeachers;

use App\Models\LessonTeacher;

class Delete
{
    public static function handle($data, $response)
    {
        try {
            LessonTeacher::where("lesson_id", $data->id)->delete();

            return $response->send(true, null, 'Sucesso ao deletar lição', []);
        } catch (\Throwable $th) {
            return $response->send(false, null, 'Erro ao deletar lição', $th->getMessage());
        }
    }
}
