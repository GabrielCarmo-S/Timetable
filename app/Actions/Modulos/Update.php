<?php

namespace App\Actions\Modulos;

use App\Models\Modulo;

class Update
{
  public static function handle($data, $response)
  {
    try {
      Modulo::updateModulo($data->all(), $data->id);

      return $response->send(true, null, 'Sucesso ao atualizar modulo', []);
    } catch (\Throwable $th) {
      return $response->send(false, null, 'Erro ao atualizar modulo' . $th->getMessage());
    }
  }
}
