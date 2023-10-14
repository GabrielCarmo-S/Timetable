<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cronograma extends Model
{
    use  HasFactory;

    protected $table = 'cronograma';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'curso_id',
        'modulo_id',
        'aula_id',
        'usuario_id',
        'sala_id',
        'obrigatorio',
        'updated_at',
        'created_at',
    ];

    public function getCronograma()
    {
        return Cronograma::get();
    }

    public function getCronogramaById($id)
    {
        return Cronograma::find($id);
    }

    public static function createCronograma($data)
    {
        return Cronograma::create($data);
    }

    public static function updateCronograma($data, $id)
    {
        return Cronograma::where("id", $id)->update($data);
    }
}
