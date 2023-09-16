<?php

namespace App\Http\Controllers;

use App\Actions\Lessons\Create;
use App\Actions\Lessons\Delete;
use App\Actions\Lessons\Update;
use App\Http\Requests\LessonCreateRequest;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends TimetableDefaultController
{
    public function construct()
    {
    }

    public function get(Request $request)
    {
        try {
            $lesson = new Lesson();

            $data = $lesson->getLesson();

            return view('licoes.index', ['title' => 'TimeTable - Lições', 'titleContent' => 'Listagem - Lições', 'data' => $data]);
        } catch (\Throwable $th) {
            return view('licoes.index', ['title' => 'TimeTable - Lições', 'titleContent' => 'Listagem - Lições', 'data' => []]);
        }
    }

    public function getLessonById($id)
    {
        try {
            $lesson = new Lesson();

            $data = $lesson->getLessonById($id);

            return $this->response->send(true, $data, 'Lição Encontrado com sucesso!', null);
        } catch (\Throwable $th) {
            return $this->response->send(false, null, 'Erro ao buscar lição', $th->getMessage());
        }
    }

    public function create(LessonCreateRequest $request)
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
