<?php

namespace App\Actions\Modules;

use App\Models\Module;

class Create
{
    public  static function handle($data, $response)
    {
        try {
            Module::createModule([
                'module_name' => $data->module_name,
                'course_id' => $data->course_id,
            ]);

            return $response->send(true, null, 'Sucesso ao cadastrar modulo', []);
        } catch (\Throwable $th) {
            return $response->send(false, null, 'Erro ao cadastrar modulo', $th->getMessage());
        }
    }
}
