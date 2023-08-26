<?php

namespace App\Actions\Teachers;

use App\Models\Teacher;

class Create
{
    public  static function handle($data, $response)
    {
        try {
            Teacher::createTeacher([
                'teacher_name' => $data->teacher_name,
            ]);

            return $response->send(true, null, 'Sucesso ao cadastrar o professor', []);
        } catch (\Throwable $th) {
            return $response->send(false, null, 'Erro ao cadastrar o professor', $th->getMessage());
        }
    }
}
