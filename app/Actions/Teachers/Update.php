<?php

namespace App\Actions\Teachers;

use App\Models\Teacher;

class Update
{
    public static function handle($data, $response)
    {
        try {
            Teacher::updateTeacher($data->all(), $data->teacher_id);

            return $response->send(true, null, 'Sucesso ao atualizar o professor', []);
        } catch (\Throwable $th) {
            return $response->send(false, null, 'Erro ao atualizar o professor', $th->getMessage());
        }
    }
}
