<?php

namespace App\Http\Controllers;

use App\Actions\Users\Create;
use App\Http\Requests\UserCreateRequest;
use Illuminate\Http\Request;

class UserController extends TimetableDefaultController
{
    public function construct()
    {
    }

    public function get(Request $request)
    {
        dd($request->all());
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
}
