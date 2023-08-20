<?php

namespace App\Http\Controllers;

use App\Actions\Courses\Create;
use App\Actions\Courses\Delete;
use App\Actions\Courses\Update;
use App\Http\Requests\CouseCreateRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends TimetableDefaultController
{
    public function construct()
    {
    }

    public function get(Request $request)
    {
        try {
            $course = new Course();

            $data = $course->getCourse();

            return $this->response->send(true, $data->toJson(), 'Cursos Encontrados com sucesso!', null);
        } catch (\Throwable $th) {
            return $this->response->send(false, null, 'Erro ao buscar cursos', $th->getMessage());
        }
    }

    public function getCourseById($id)
    {
        try {
            $course = new Course();

            $data = $course->getCourseById($id);

            return $this->response->send(true, $data, 'Curso Encontrado com sucesso!', null);
        } catch (\Throwable $th) {
            return $this->response->send(false, null, 'Erro ao buscar curso', $th->getMessage());
        }
    }

    public function create(CouseCreateRequest $request)
    {
        try {
            $data = Create::handle($request, $this->response);

            if (!$data->status) {
                return $this->response->send(false, null, $data->message, $data->errors);
            }

            return $this->response->send(true, null, $data->message, $data->errors);
        } catch (\Throwable $th) {
            return $this->response->send(false, null, 'Erro ao cadastrar curso', $th->getMessage());
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
            return $this->response->send(false, null, 'Erro ao atualizar curso', $th->getMessage());
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
            return $this->response->send(false, null, 'Erro ao deletar curso', $th->getMessage());
        }
    }
}
