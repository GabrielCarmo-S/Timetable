<?php

namespace App\Actions\Usuarios;

use App\Models\Usuario;

class Update
{
    public static function handle($data, $response)
    {
        try {
            Usuario::updateUsuario($data, $data['id']);

            return $response->send(true, null, 'Sucesso ao atualizar usuário', []);
        } catch (\Throwable $th) {
            return $response->send(false, null, 'Erro ao atualizar usuário' . $th->getMessage());
        }
    }
}
