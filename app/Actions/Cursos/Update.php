<?php

namespace App\Actions\Cursos;

use App\Models\Curso;

class Update
{
  public static function handle($data, $response)
  {
    try {
      Curso::updateCurso($data->all(), $data->id);

      return $response->send(true, null, 'Sucesso ao atualizar curso', []);
    } catch (\Throwable $th) {
      return $response->send(false, null, 'Erro ao atualizar curso' . $th->getMessage());
    }
  }
}
