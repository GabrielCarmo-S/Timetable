<?php

namespace App\Actions\Courses;

use App\Models\Course;

class Delete
{
    public static function handle($data, $response)
    {
        try {
            Course::where("course_id", $data->id)->delete();

            return $response->send(true, null, 'Sucesso ao deletar curso', []);
        } catch (\Throwable $th) {
            return $response->send(false, null, 'Erro ao deletar curso', $th->getMessage());
        }
    }
}
