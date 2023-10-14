<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    use  HasFactory;

    protected $table = 'cursos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nome',
        'updated_at',
        'created_at',
    ];

    public function getCursos()
    {
        return Cursos::get();
    }

    public function getCursosById($id)
    {
        return Cursos::find($id);
    }

    public static function createCursos($data)
    {
        return Cursos::create($data);
    }

    public static function updateCursos($data, $id)
    {
        return Cursos::where("id", $id)->update($data);
    }
}
