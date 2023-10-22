<?php

namespace App\Actions\Aulas;

use App\Models\Aula;

class Create
{
  public  static function handle($data, $response)
  {
    try {
      Aula::createAula([
        'nome' => $data->nome,
        'inicio' => $data->inicio,
        'termino' => $data->termino,
      ]);

      return $response->send(true, null, 'Sucesso ao cadastrar aula', []);
    } catch (\Throwable $th) {
      return $response->send(false, null, 'Erro ao cadastrar aula' . $th->getMessage());
    }
  }
}
