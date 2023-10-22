<?php

namespace App\Actions\Usuarios;

use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class Create
{
    public  static function handle($data, $response)
    {
        try {
            $path = null;

            $file = $data->file('foto');

            if (!empty($file)) {
                $path = $file->store('public/usuarios/fotos');
            }

            Usuario::createUsuario([
                'nome' => $data->nome,
                'email' => $data->email,
                'password' => Hash::make($data->password),
                'prefixo' => $data->prefixo,
                'nome_completo' => $data->nome_completo,
                'nome_abrev' => $data->nome_abrev,
                'foto' => $path,
                'level' => $data->level
            ]);

            return $response->send(true, null, 'Sucesso ao cadastrar usuário', []);
        } catch (\Throwable $th) {
            return $response->send(false, null, 'Erro ao cadastrar usuário' . $th->getMessage());
        }
    }
}
