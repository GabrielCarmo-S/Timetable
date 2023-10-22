<?php

namespace App\Actions\Cursos;

use App\Models\Curso;

class Create
{
  public  static function handle($data, $response)
  {
    try {
      Curso::createCurso([
        'nome' => $data->nome,
      ]);

      return $response->send(true, null, 'Sucesso ao cadastrar curso', []);
    } catch (\Throwable $th) {
      return $response->send(false, null, 'Erro ao cadastrar curso' . $th->getMessage());
    }
  }
}
