<?php

namespace App\Http\Controllers;

use App\Actions\Users\Create;
use App\Actions\Users\Delete;
use App\Actions\Users\Update;
use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends TimetableDefaultController
{
    public function construct()
    {
    }

    public function get(Request $request)
    {
        return view('usuarios.index', ['title' => 'TimeTable - Usuários', 'titleContent' => 'Listagem - Usuários']);
        // try {
        //     $user = new User();

        //     $data = $user->getUsers();

        //     return $this->response->send(true, $data->toJson(), 'Usuarios Encontrados com sucesso!', null);
        // } catch (\Throwable $th) {
        //     return $this->response->send(false, null, 'Erro ao buscar usuários', $th->getMessage());
        // }
    }

    public function getUserById($id)
    {
        try {
            $user = new User();

            $data = $user->getUserById($id);

            return $this->response->send(true, $data, 'Usuario Encontrado com sucesso!', null);
        } catch (\Throwable $th) {
            return $this->response->send(false, null, 'Erro ao buscar usuário', $th->getMessage());
        }
    }

    public function create(UserCreateRequest $request)
    {
        try {
            $data = Create::handle($request, $this->response);

            if (!$data->status) {
                return $this->response->send(false, null, $data->message, $data->errors);
            }

            return $this->response->send(true, null, $data->message, $data->errors);
        } catch (\Throwable $th) {
            return $this->response->send(false, null, 'Erro ao cadastrar usuário', $th->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $data = Update::handle($request, $this->response);

            if (!$data->status) {
                return $this->response->send(false, null, $data->message, $data->errors);
            }

            return $this->response->send(true, null, $data->message, $data->errors);
        } catch (\Throwable $th) {
            return $this->response->send(false, null, 'Erro ao atualizar usuário', $th->getMessage());
        }
    }

    public function delete(Request $request)
    {
        try {
            $data = Delete::handle($request, $this->response);

            if (!$data->status) {
                return $this->response->send(false, null, $data->message, $data->errors);
            }

            return $this->response->send(true, null, $data->message, $data->errors);
        } catch (\Throwable $th) {
            return $this->response->send(false, null, 'Erro ao deletar usuário', $th->getMessage());
        }
    }
}
