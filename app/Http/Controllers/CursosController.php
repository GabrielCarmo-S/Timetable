<?php

namespace App\Http\Controllers;

use App\Actions\Cursos\Create;
use App\Actions\Cursos\Delete;
use App\Actions\Cursos\Update;
use App\Http\Requests\CursoRequest;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursosController extends TimetableDefaultController
{
    public function construct()
    {
    }

    public function get(Request $request)
    {
        try {
            $curso = new Curso();

            $data = $curso->getCursos();

            return view('cursos.index', ['title' => 'Instituto Mondelli de Odontologia - Cursos', 'titleContent' => 'Listagem - Cursos', 'data' => $data]);
        } catch (\Throwable $th) {
            return view('cursos.index', ['title' => 'Instituto Mondelli de Odontologia - Cursos', 'titleContent' => 'Listagem - Cursos', 'data' => []]);
        }
    }

    public function getCursoById($id)
    {
        try {
            $curso = new Curso();

            $data = $curso->getCursoById($id);

            return $this->response->send(true, $data, 'Curso Encontrado com sucesso!', null);
        } catch (\Throwable $th) {
            return $this->response->send(false, null, 'Erro ao buscar curso' . $th->getMessage());
        }
    }

    public function create(CursoRequest $request)
    {
        try {
            $data = Create::handle($request, $this->response);

            if (!$data->status) {
                return $this->response->send(false, null, $data->message, $data->errors);
            }

            return $this->response->send(true, null, $data->message, $data->errors);
        } catch (\Throwable $th) {
            return $this->response->send(false, null, 'Erro ao cadastrar curso' . $th->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $rest = $request->except('_method');

            $data = Update::handle($rest, $this->response);

            if (!$data->status) {
                return $this->response->send(false, null, $data->message, $data->errors);
            }

            return $this->response->send(true, null, $data->message, $data->errors);
        } catch (\Throwable $th) {
            return $this->response->send(false, null, 'Erro ao atualizar curso' . $th->getMessage());
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
            return $this->response->send(false, null, 'Erro ao deletar curso' . $th->getMessage());
        }
    }
}
