<?php

namespace App\Actions\Teachers;

use App\Models\Teacher;

class Delete
{
    public static function handle($data, $response)
    {
        try {
            Teacher::where("teacher_id", $data->id)->delete();

            return $response->send(true, null, 'Sucesso ao deletar o professor', []);
        } catch (\Throwable $th) {
            return $response->send(false, null, 'Erro ao deletar o professor', $th->getMessage());
        }
    }
}
