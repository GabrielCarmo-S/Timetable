<?php

namespace App\Actions\Aulas;

use App\Models\Aula;

class Delete
{
  public static function handle($data, $response)
  {
    try {
      Aula::where("id", $data->id)->delete();

      return $response->send(true, null, 'Sucesso ao deletar aula', []);
    } catch (\Throwable $th) {
      return $response->send(false, null, 'Erro ao deletar aula' . $th->getMessage());
    }
  }
}
