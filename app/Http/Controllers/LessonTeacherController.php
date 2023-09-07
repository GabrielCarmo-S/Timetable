<?php

namespace App\Http\Controllers;

use App\Actions\LessonsTeachers\Create;
use App\Actions\LessonsTeachers\Delete;
use App\Actions\LessonsTeachers\Update;
use App\Http\Requests\LessonTeacherCreateRequest;
use App\Models\LessonTeacher;
use Illuminate\Http\Request;

class LessonTeacherController extends TimetableDefaultController
{
    public function construct()
    {
    }

    public function get(Request $request)
    {
        try {
            $lesson = new LessonTeacher();

            $data = $lesson->getLessonTeacher();

            return $this->response->send(true, $data->toJson(), 'Lições Encontrados com sucesso!', null);
        } catch (\Throwable $th) {
            return $this->response->send(false, null, 'Erro ao buscar lições', $th->getMessage());
        }
    }

    public function getLessonTeacherById($id)
    {
        try {
            $lesson = new LessonTeacher();

            $data = $lesson->getLessonTeacherById($id);

            return $this->response->send(true, $data, 'Lição Encontrado com sucesso!', null);
        } catch (\Throwable $th) {
            return $this->response->send(false, null, 'Erro ao buscar lição', $th->getMessage());
        }
    }

    public function create(LessonTeacherCreateRequest $request)
    {
        try {
            $data = Create::handle($request, $this->response);

            if (!$data->status) {
                return $this->response->send(false, null, $data->message, $data->errors);
            }

            return $this->response->send(true, null, $data->message, $data->errors);
        } catch (\Throwable $th) {
            return $this->response->send(false, null, 'Erro ao cadastrar lição', $th->getMessage());
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
            return $this->response->send(false, null, 'Erro ao atualizar lição', $th->getMessage());
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
            return $this->response->send(false, null, 'Erro ao deletar lição', $th->getMessage());
        }
    }
}
