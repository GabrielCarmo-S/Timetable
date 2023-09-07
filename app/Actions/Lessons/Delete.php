<?php

namespace App\Actions\Lessons;

use App\Models\Lesson;

class Delete
{
    public static function handle($data, $response)
    {
        try {
            Lesson::where("lesson_id", $data->lesson_id)->delete();

            return $response->send(true, null, 'Sucesso ao deletar lição', []);
        } catch (\Throwable $th) {
            return $response->send(false, null, 'Erro ao deletar lição', $th->getMessage());
        }
    }
}
