<?php

namespace App\Actions\Salas;

use App\Models\Sala;

class Delete
{
  public static function handle($data, $response)
  {
    try {
      Sala::where("id", $data->id)->delete();

      return $response->send(true, null, 'Sucesso ao deletar sala', []);
    } catch (\Throwable $th) {
      return $response->send(false, null, 'Erro ao deletar sala' . $th->getMessage());
    }
  }
}
