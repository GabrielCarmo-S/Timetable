<?php

namespace App\Actions\Modulos;

use App\Models\Modulo;

class Delete
{
  public static function handle($data, $response)
  {
    try {
      Modulo::where("id", $data->id)->delete();

      return $response->send(true, null, 'Sucesso ao deletar modulo', []);
    } catch (\Throwable $th) {
      return $response->send(false, null, 'Erro ao deletar modulo' . $th->getMessage());
    }
  }
}
