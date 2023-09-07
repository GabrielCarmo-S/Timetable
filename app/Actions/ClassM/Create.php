<?php

namespace App\Actions\ClassM;

use App\Models\ClassM;

class Create
{
    public  static function handle($data, $response)
    {
        try {
            ClassM::createClassM([
                'class_name' => $data->class_name,
                'class_date' => $data->class_date,
                'module_id' => $data->course_id,
            ]);

            return $response->send(true, null, 'Sucesso ao cadastrar classe', []);
        } catch (\Throwable $th) {
            return $response->send(false, null, 'Erro ao cadastrar classe', $th->getMessage());
        }
    }
}
