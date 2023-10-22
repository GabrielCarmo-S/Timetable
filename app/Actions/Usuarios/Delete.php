<?php

namespace App\Actions\Usuarios;

use App\Models\Usuario;

class Delete
{
    public static function handle($data, $response)
    {
        try {
            Usuario::where("id", $data->id)->delete();

            return $response->send(true, null, 'Sucesso ao deletar usuário', []);
        } catch (\Throwable $th) {
            return $response->send(false, null, 'Erro ao deletar usuário' . $th->getMessage());
        }
    }
}
