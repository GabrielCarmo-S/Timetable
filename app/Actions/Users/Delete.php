<?php

namespace App\Actions\Users;

use App\Models\User;

class Delete
{
    public static function handle($data, $response)
    {
        try {
            User::where("user_id", $data->id)->delete();

            return $response->send(true, null, 'Sucesso ao deletar usuário', []);
        } catch (\Throwable $th) {
            return $response->send(false, null, 'Erro ao deletar usuário', $th->getMessage());
        }
    }
}
