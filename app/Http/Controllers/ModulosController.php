<?php

namespace App\Http\Controllers;

use App\Actions\Modulos\Create;
use App\Actions\Modulos\Delete;
use App\Actions\Modulos\Update;
use App\Http\Requests\ModuloRequest;
use App\Models\Modulo;
use Illuminate\Http\Request;

class ModulosController extends TimetableDefaultController
{
  public function construct()
  {
  }

  public function get(Request $request)
  {
    try {
      $module = new Modulo();

      $data = $module->getModulos();

      return view('modulos.index', ['title' => 'Instituto Mondelli de Odontologia - Modulos', 'titleContent' => 'Listagem - Modulos', 'data' => $data]);
    } catch (\Throwable $th) {
      return view('modulos.index', ['title' => 'Instituto Mondelli de Odontologia - Modulos', 'titleContent' => 'Listagem - Modulos', 'data' => []]);
    }
  }

  public function getModuloById($id)
  {
    try {
      $module = new Modulo();

      $data = $module->getModuloById($id);

      return $this->response->send(true, $data, 'Modulo Encontrado com sucesso!', null);
    } catch (\Throwable $th) {
      return $this->response->send(false, null, 'Erro ao buscar modulo' . $th->getMessage());
    }
  }

  public function create(ModuloRequest $request)
  {
    try {
      $data = Create::handle($request, $this->response);

      if (!$data->status) {
        return $this->response->send(false, null, $data->message, $data->errors);
      }

      return $this->response->send(true, null, $data->message, $data->errors);
    } catch (\Throwable $th) {
      return $this->response->send(false, null, 'Erro ao cadastrar modulo' . $th->getMessage());
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
      return $this->response->send(false, null, 'Erro ao atualizar modulo' . $th->getMessage());
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
      return $this->response->send(false, null, 'Erro ao deletar modulo' . $th->getMessage());
    }
  }
}
