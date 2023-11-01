<?php

namespace App\Actions\Aulas;

use App\Models\Aula;

class Update
{
    public static function handle($data, $response)
    {
        try {
            Aula::updateAula($data, $data['id']);

            return $response->send(true, null, 'Sucesso ao atualizar aula', []);
        } catch (\Throwable $th) {
            return $response->send(false, null, 'Erro ao atualizar aula' . $th->getMessage());
        }
    }
}
