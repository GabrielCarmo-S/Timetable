<?php

namespace App\Http\Controllers;

use App\Actions\Aulas\Create;
use App\Actions\Aulas\Delete;
use App\Actions\Aulas\Update;
use App\Http\Requests\ClassCreateRequest;
use App\Models\Aulas;
use Illuminate\Http\Request;

class AulasController extends TimetableDefaultController
{
    public function construct()
    {
    }

    public function get(Request $request)
    {
        try {
            $aula = new Aulas();

            $data = $aula->getAulas();

            return view('classes.index', ['title' => 'TimeTable - Aulas', 'titleContent' => 'Listagem - Aulas', 'data' => $data]);
        } catch (\Throwable $th) {
            return view('classes.index', ['title' => 'TimeTable - Aulas', 'titleContent' => 'Listagem - Aulas', 'data' => []]);
        }
    }

    public function getAulasById($id)
    {
        try {
            $aula = new Aulas();

            $data = $aula->getAulasById($id);

            return $this->response->send(true, $data, 'Aula Encontrada com sucesso!', null);
        } catch (\Throwable $th) {
            return $this->response->send(false, null, 'Erro ao buscar aula', $th->getMessage());
        }
    }

    public function create(AulasCreateRequest $request)
    {
        try {
            $data = Create::handle($request, $this->response);

            if (!$data->status) {
                return $this->response->send(false, null, $data->message, $data->errors);
            }

            return $this->response->send(true, null, $data->message, $data->errors);
        } catch (\Throwable $th) {
            return $this->response->send(false, null, 'Erro ao cadastrar Aula', $th->getMessage());
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
            return $this->response->send(false, null, 'Erro ao atualizar aula', $th->getMessage());
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
            return $this->response->send(false, null, 'Erro ao deletar aula', $th->getMessage());
        }
    }
}
