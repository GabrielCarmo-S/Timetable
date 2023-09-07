<?php

namespace App\Actions\ClassM;

use App\Models\ClassM;

class Update
{
    public static function handle($data, $response)
    {
        try {
            ClassM::updateClassM($data->all(), $data->class_id);

            return $response->send(true, null, 'Sucesso ao atualizar classe', []);
        } catch (\Throwable $th) {
            return $response->send(false, null, 'Erro ao atualizar classe', $th->getMessage());
        }
    }
}
