<?php

namespace App\Actions\Modulos;

use App\Models\Modulo;

class Create
{
  public  static function handle($data, $response)
  {
    try {
      Modulo::createModulo([
        'nome' => $data->nome,
        'quando_comeca'  => $data->quando_comeca,
        'quando_termina' => $data->quando_termina,
      ]);

      return $response->send(true, null, 'Sucesso ao cadastrar modulo', []);
    } catch (\Throwable $th) {
      return $response->send(false, null, 'Erro ao cadastrar modulo' . $th->getMessage());
    }
  }
}
