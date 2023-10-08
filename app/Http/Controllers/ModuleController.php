<?php

namespace App\Http\Controllers;

use App\Actions\Modules\Create;
use App\Actions\Modules\Delete;
use App\Actions\Modules\Update;
use App\Http\Requests\ModuleCreateRequest;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends TimetableDefaultController
{
    public function construct()
    {
    }

    public function get(Request $request)
    {
        try {
            $module = new Module();

            $data = $module->getModule();

            return view('modulos.index', ['title' => 'TimeTable - Modulos', 'titleContent' => 'Listagem - Modulos', 'data' => $data]);
        } catch (\Throwable $th) {
            return view('modulos.index', ['title' => 'TimeTable - Modulos', 'titleContent' => 'Listagem - Modulos', 'data' => []]);
        }
    }

    public function getModuleById($id)
    {
        try {
            $module = new Module();

            $data = $module->getModuleById($id);

            return $this->response->send(true, $data, 'Modulo Encontrado com sucesso!', null);
        } catch (\Throwable $th) {
            return $this->response->send(false, null, 'Erro ao buscar modulo', $th->getMessage());
        }
    }

    public function create(ModuleCreateRequest $request)
    {
        try {
            $data = Create::handle($request, $this->response);

            if (!$data->status) {
                return $this->response->send(false, null, $data->message, $data->errors);
            }

            return $this->response->send(true, null, $data->message, $data->errors);
        } catch (\Throwable $th) {
            return $this->response->send(false, null, 'Erro ao cadastrar modulo', $th->getMessage());
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
            return $this->response->send(false, null, 'Erro ao atualizar modulo', $th->getMessage());
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
            return $this->response->send(false, null, 'Erro ao deletar modulo', $th->getMessage());
        }
    }
}
