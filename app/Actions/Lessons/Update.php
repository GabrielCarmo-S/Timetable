<?php

namespace App\Actions\Lessons;

use App\Models\Lesson;

class Update
{
    public static function handle($data, $response)
    {
        try {
            Lesson::updateLesson($data->all(), $data->lesson_id);

            return $response->send(true, null, 'Sucesso ao atualizar lição', []);
        } catch (\Throwable $th) {
            return $response->send(false, null, 'Erro ao atualizar lição', $th->getMessage());
        }
    }
}
