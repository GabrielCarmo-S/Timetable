<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aulas extends Model
{
    use  HasFactory;

    protected $table = 'aulas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nome',
        'tempo_aula',
        'updated_at',
        'created_at',
    ];

    public function getAulas()
    {
        return Aulas::leftJoin('modulos', 'modulos.id', '=', 'aulas.id')
            ->leftJoin('cursos', 'cursos.id', '=', 'modulos.id')
            ->leftJoin('aulas_usuarios', 'aulas_usuarios.id', '=', 'aulas.id')
            ->leftJoin('usuarios', 'usuarios.id', '=', 'aulas_usuarios.id')
            ->select(
                'aulas.id',
                'aulas.nome',
                'aulas.tempo_aula',
                'aulas.created_at'
            )
            ->get();
    }

    public function getAulasById($id)
    {
        return Aulas::find($id);
    }

    public static function createAulas($data)
    {
        return Aulas::create($data);
    }

    public static function updateAulas($data, $id)
    {
        return Aulas::where("id", $id)->update($data);
    }
}
