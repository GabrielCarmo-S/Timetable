<?php

namespace App\Actions\ClassM;

use App\Models\ClassM;

class Delete
{
    public static function handle($data, $response)
    {
        try {
            ClassM::where("class_id", $data->id)->delete();

            return $response->send(true, null, 'Sucesso ao deletar classe', []);
        } catch (\Throwable $th) {
            return $response->send(false, null, 'Erro ao deletar classe', $th->getMessage());
        }
    }
}
