<?php

namespace App\Actions\Courses;

use App\Models\Course;

class Create
{
    public  static function handle($data, $response)
    {
        try {
            Course::createCourse([
                'course_name' => $data->course_name,
            ]);

            return $response->send(true, null, 'Sucesso ao cadastrar curso', []);
        } catch (\Throwable $th) {
            return $response->send(false, null, 'Erro ao cadastrar curso', $th->getMessage());
        }
    }
}
