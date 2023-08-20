<?php

namespace App\Actions\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Create
{
    public  static function handle($data, $response)
    {
        try {
            User::createUser([
                'user_name' => $data->user_name,
                'user_email' => $data->user_email,
                'user_password' => Hash::make($data->user_password),
                'user_level' => $data->user_level
            ]);

            return $response->send(true, null, 'Sucesso ao cadastrar usuário', []);
        } catch (\Throwable $th) {
            return $response->send(false, null, 'Erro ao cadastrar usuário', $th->getMessage());
        }
    }
}
