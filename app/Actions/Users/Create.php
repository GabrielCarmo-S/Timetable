<?php

namespace App\Actions\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Create
{
    public  static function handle($userData, $response)
    {
        try {
            User::createUser([
                'user_name' => $userData->user_name,
                'user_email' => $userData->user_email,
                'user_password' => Hash::make($userData->user_password),
                'user_level' => $userData->user_level
            ]);

            return $response->send(true, null, 'Sucesso ao cadastrar usuário', []);
        } catch (\Throwable $th) {
            return $response->send(false, null, 'Erro ao cadastrar usuário', $th->getMessage());
        }
    }
}
