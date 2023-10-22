<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    use  HasFactory;

    protected $table = 'modulos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nome',
        'quando_comeca',
        'quando_termina',
        'updated_at',
        'created_at',
    ];

    public function getModulos()
    {
        return Modulo::get();
    }

    public function getModuloById($id)
    {
        return Modulo::find($id);
    }

    public static function createModulo($data)
    {
        return Modulo::create($data);
    }

    public static function updateModulo($data, $id)
    {
        return Modulo::where("id", $id)->update($data);
    }
}
