<?php

namespace App\Actions\Courses;

use App\Models\Course;

class Update
{
    public static function handle($data, $response)
    {
        try {
            Course::updateCourse($data->all(), $data->course_id);

            return $response->send(true, null, 'Sucesso ao atualizar curso', []);
        } catch (\Throwable $th) {
            return $response->send(false, null, 'Erro ao atualizar curso', $th->getMessage());
        }
    }
}
