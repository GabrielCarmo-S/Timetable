<?php

namespace App\Http\Controllers;

use App\Actions\Aulas\Create;
use App\Actions\Aulas\Delete;
use App\Actions\Aulas\Update;
use App\Http\Requests\AulaRequest;
use App\Models\Aula;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AulasController extends TimetableDefaultController
{
  public function construct()
  {
  }

  public function get(Request $request)
  {
    try {
      $aula = new Aula();

      $data = $aula->getAulas();

      return view('aulas.index', ['title' => 'Instituto Mondelli de Odontologia - Aulas', 'titleContent' => 'Listagem - Aulas', 'data' => $data]);
    } catch (\Throwable $th) {
      return view('aulas.index', ['title' => 'Instituto Mondelli de Odontologia - Aulas', 'titleContent' => 'Listagem - Aulas', 'data' => []]);
    }
  }

  public function getAulaById($id)
  {
    try {
      $aula = new Aula();

      $data = $aula->getAulaById($id);

      return $this->response->send(true, $data, 'Aula Encontrada com sucesso!', null);
    } catch (\Throwable $th) {
      return $this->response->send(false, null, 'Erro ao buscar aula' . $th->getMessage());
    }
  }

  public function create(AulaRequest $request)
  {
    try {
      $data = Create::handle($request, $this->response);

      if (!$data->status) {
        return $this->response->send(false, null, $data->message, $data->errors);
      }

      return $this->response->send(true, null, $data->message, $data->errors);
    } catch (\Throwable $th) {
      return $this->response->send(false, null, 'Erro ao cadastrar Aula' . $th->getMessage());
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
      return $this->response->send(false, null, 'Erro ao atualizar aula' . $th->getMessage());
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
      return $this->response->send(false, null, 'Erro ao deletar aula' . $th->getMessage());
    }
  }
}
