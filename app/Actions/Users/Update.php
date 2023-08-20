<?php

namespace App\Actions\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Update
{
    public static function handle($data, $response)
    {
        try {
            User::updateUser($data->all(), $data->user_id);

            return $response->send(true, null, 'Sucesso ao atualizar usuário', []);
        } catch (\Throwable $th) {
            return $response->send(false, null, 'Erro ao atualizar usuário', $th->getMessage());
        }
    }
}
