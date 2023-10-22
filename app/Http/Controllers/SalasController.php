<?php

namespace App\Http\Controllers;

use App\Actions\Salas\Create;
use App\Actions\Salas\Delete;
use App\Actions\Salas\Update;
use App\Http\Requests\SalaRequest;
use App\Models\Sala;
use Illuminate\Http\Request;

class SalasController extends TimetableDefaultController
{
  public function construct()
  {
  }

  public function get(Request $request)
  {
    try {
      $lesson = new Sala();

      $data = $lesson->getSalas();

      return view('salas.index', ['title' => 'Instituto Mondelli de Odontologia - Sala', 'titleContent' => 'Listagem - Sala', 'data' => $data,]);
    } catch (\Throwable $th) {
      return view('salas.index', ['title' => 'Instituto Mondelli de Odontologia - Sala', 'titleContent' => 'Listagem - Sala', 'data' => []]);
    }
  }

  public function getSalaById($id)
  {
    try {
      $lesson = new Sala();

      $data = $lesson->getSalaById($id);

      return $this->response->send(true, $data, 'Sala Encontrado com sucesso!', null);
    } catch (\Throwable $th) {
      return $this->response->send(false, null, 'Erro ao buscar sala' . $th->getMessage());
    }
  }

  public function create(SalaRequest $request)
  {
    try {
      $data = Create::handle($request, $this->response);

      if (!$data->status) {
        return $this->response->send(false, null, $data->message, $data->errors);
      }

      return $this->response->send(true, null, $data->message, $data->errors);
    } catch (\Throwable $th) {
      return $this->response->send(false, null, 'Erro ao cadastrar sala' . $th->getMessage());
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
      return $this->response->send(false, null, 'Erro ao atualizar sala' . $th->getMessage());
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
      return $this->response->send(false, null, 'Erro ao deletar sala' . $th->getMessage());
    }
  }
}
