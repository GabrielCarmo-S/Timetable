<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
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
        return Curso::get();
    }

    public function getCursoById($id)
    {
        return Curso::find($id);
    }

    public static function createCurso($data)
    {
        return Curso::create($data);
    }

    public static function updateCurso($data, $id)
    {
        return Curso::where("id", $id)->update($data);
    }
}
