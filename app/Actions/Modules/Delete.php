<?php

namespace App\Actions\Modules;

use App\Models\Module;

class Delete
{
    public static function handle($data, $response)
    {
        try {
            Module::where("module_id", $data->id)->delete();

            return $response->send(true, null, 'Sucesso ao deletar modulo', []);
        } catch (\Throwable $th) {
            return $response->send(false, null, 'Erro ao deletar modulo', $th->getMessage());
        }
    }
}
