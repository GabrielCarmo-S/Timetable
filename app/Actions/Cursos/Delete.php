<?php

namespace App\Actions\Cursos;

use App\Models\Curso;

class Delete
{
  public static function handle($data, $response)
  {
    try {
      Curso::where("id", $data->id)->delete();

      return $response->send(true, null, 'Sucesso ao deletar curso', []);
    } catch (\Throwable $th) {
      return $response->send(false, null, 'Erro ao deletar curso' . $th->getMessage());
    }
  }
}
