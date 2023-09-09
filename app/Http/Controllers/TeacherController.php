<?php

namespace App\Http\Controllers;

use App\Actions\Teachers\Create;
use App\Actions\Teachers\Delete;
use App\Actions\Teachers\Update;
use App\Http\Requests\TeacherCreateRequest;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends TimetableDefaultController
{
    public function construct()
    {
    }

    public function get(Request $request)
    {
        return view('professores.index', ['title' => 'TimeTable - Professores', 'titleContent' => 'Listagem - Professores']);
        // try {
        //     $teacher = new Teacher();

        //     $data = $teacher->getTeacher();

        //     return $this->response->send(true, $data->toJson(), 'Professores Encontrados com sucesso!', null);
        // } catch (\Throwable $th) {
        //     return $this->response->send(false, null, 'Erro ao buscar os professores', $th->getMessage());
        // }
    }

    public function getTeacherById($id)
    {
        try {
            $teacher = new Teacher();

            $data = $teacher->getTeacherById($id);

            return $this->response->send(true, $data, 'Professor Encontrado com sucesso!', null);
        } catch (\Throwable $th) {
            return $this->response->send(false, null, 'Erro ao buscar o professor', $th->getMessage());
        }
    }

    public function create(TeacherCreateRequest $request)
    {
        try {
            $data = Create::handle($request, $this->response);

            if (!$data->status) {
                return $this->response->send(false, null, $data->message, $data->errors);
            }

            return $this->response->send(true, null, $data->message, $data->errors);
        } catch (\Throwable $th) {
            return $this->response->send(false, null, 'Erro ao cadastrar professor', $th->getMessage());
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
            return $this->response->send(false, null, 'Erro ao atualizar professor', $th->getMessage());
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
            return $this->response->send(false, null, 'Erro ao deletar professor', $th->getMessage());
        }
    }
}
