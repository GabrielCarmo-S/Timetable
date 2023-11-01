<?php

namespace App\Http\Controllers;

use App\Actions\Usuarios\Create;
use App\Actions\Usuarios\Delete;
use App\Actions\Usuarios\Update;
use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuariosController extends TimetableDefaultController
{
    public function construct()
    {
    }

    public function get(Request $request)
    {
        try {
            $user = new Usuario();

            $data = $user->getUsuarios();

            return view('usuarios.index', ['title' => 'Instituto Mondelli de Odontologia - Usuários', 'titleContent' => 'Listagem - Usuários', 'data' => $data]);
        } catch (\Throwable $th) {
            return view('usuarios.index', ['title' => 'Instituto Mondelli de Odontologia - Usuários', 'titleContent' => 'Listagem - Usuários', 'data' => []]);
        }
    }

    public function getUsuarioById($id)
    {
        try {
            $user = new Usuario();

            $data = $user->getUsuarioById($id);

            return $this->response->send(true, $data, 'Usuario Encontrado com sucesso!', null);
        } catch (\Throwable $th) {
            return $this->response->send(false, null, 'Erro ao buscar usuário' . $th->getMessage());
        }
    }

    public function create(UsuarioRequest $request)
    {
        try {
            $data = Create::handle($request, $this->response);

            if (!$data->status) {
                return $this->response->send(false, null, $data->message, $data->errors);
            }

            return $this->response->send(true, null, $data->message, $data->errors);
        } catch (\Throwable $th) {
            return $this->response->send(false, null, 'Erro ao cadastrar usuário' . $th->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $rest = $request->except('_method', 'foto', 'password');

            $data = Update::handle($rest, $this->response);

            if (!$data->status) {
                return $this->response->send(false, null, $data->message, $data->errors);
            }

            return $this->response->send(true, null, $data->message, $data->errors);
        } catch (\Throwable $th) {
            return $this->response->send(false, null, 'Erro ao atualizar usuário' . $th->getMessage());
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
            return $this->response->send(false, null, 'Erro ao deletar usuário' . $th->getMessage());
        }
    }
}
