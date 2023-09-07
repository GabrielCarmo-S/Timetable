<?php

namespace App\Actions\Modules;

use App\Models\Module;

class Update
{
    public static function handle($data, $response)
    {
        try {
            Module::updateModule($data->all(), $data->module_id);

            return $response->send(true, null, 'Sucesso ao atualizar modulo', []);
        } catch (\Throwable $th) {
            return $response->send(false, null, 'Erro ao atualizar modulo', $th->getMessage());
        }
    }
}
