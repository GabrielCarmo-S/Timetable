<?php

namespace App\Actions\Salas;

use App\Models\Sala;

class Update
{
    public static function handle($data, $response)
    {
        try {
            Sala::updateSala($data, $data['id']);

            return $response->send(true, null, 'Sucesso ao atualizar sala', []);
        } catch (\Throwable $th) {
            return $response->send(false, null, 'Erro ao atualizar sala' . $th->getMessage());
        }
    }
}
