<?php

namespace App\Http\Controllers;

use App\Actions\ClassM\Create;
use App\Actions\ClassM\Delete;
use App\Actions\ClassM\Update;
use App\Http\Requests\ClassCreateRequest;
use App\Models\ClassM;
use Illuminate\Http\Request;

class ClassMController extends TimetableDefaultController
{
    public function construct()
    {
    }

    public function get(Request $request)
    {
        try {
            $classe = new ClassM();

            $data = $classe->getClassM();

            return $this->response->send(true, $data->toJson(), 'Classes Encontrados com sucesso!', null);
        } catch (\Throwable $th) {
            return $this->response->send(false, null, 'Erro ao buscar classes', $th->getMessage());
        }
    }

    public function getClassMById($id)
    {
        try {
            $classe = new ClassM();

            $data = $classe->getClassMById($id);

            return $this->response->send(true, $data, 'Classe Encontrado com sucesso!', null);
        } catch (\Throwable $th) {
            return $this->response->send(false, null, 'Erro ao buscar classe', $th->getMessage());
        }
    }

    public function create(ClassCreateRequest $request)
    {
        try {
            $data = Create::handle($request, $this->response);

            if (!$data->status) {
                return $this->response->send(false, null, $data->message, $data->errors);
            }

            return $this->response->send(true, null, $data->message, $data->errors);
        } catch (\Throwable $th) {
            return $this->response->send(false, null, 'Erro ao cadastrar classe', $th->getMessage());
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
            return $this->response->send(false, null, 'Erro ao atualizar classe', $th->getMessage());
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
            return $this->response->send(false, null, 'Erro ao deletar classe', $th->getMessage());
        }
    }
}
