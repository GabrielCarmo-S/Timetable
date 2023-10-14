<?php

namespace App\Actions\Lessons;

use App\Models\Lesson;

class Create
{
    public  static function handle($data, $response)
    {
        try {
            Lesson::createLesson([
                'lesson_name' => $data->lesson_name,
                'is_mandatory' => $data->is_mandatory,
                'lesson_date' => $data->lesson_date,
                'lesson_time' => $data->lesson_time,
                'module_id' => $data->module_id,
            ]);

            return $response->send(true, null, 'Sucesso ao cadastrar lição', []);
        } catch (\Throwable $th) {
            return $response->send(false, null, 'Erro ao cadastrar lição', $th->getMessage());
        }
    }
}
