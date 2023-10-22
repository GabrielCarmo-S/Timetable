<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use  HasFactory;

    protected $table = 'aulas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nome',
        'inicio',
        'termino',
        'updated_at',
        'created_at',
    ];

    public function getAulas()
    {
        return Aula::get();
    }

    public function getAulaById($id)
    {
        return Aula::find($id);
    }

    public static function createAula($data)
    {
        return Aula::create($data);
    }

    public static function updateAula($data, $id)
    {
        return Aula::where("id", $id)->update($data);
    }
}
