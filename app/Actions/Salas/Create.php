<?php

namespace App\Actions\Salas;

use App\Models\Sala;

class Create
{
  public  static function handle($data, $response)
  {
    try {
      Sala::createSala([
        'nome' => $data->nome,
        'data' => $data->data,
        'inicio' => $data->inicio,
        'termino' => $data->termino,
      ]);

      return $response->send(true, null, 'Sucesso ao cadastrar sala', []);
    } catch (\Throwable $th) {
      return $response->send(false, null, 'Erro ao cadastrar sala' . $th->getMessage());
    }
  }
}
