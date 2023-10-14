<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulos extends Model
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
        return Modulos::get();
    }

    public function getModulosById($id)
    {
        return Modulos::find($id);
    }

    public static function createModulos($data)
    {
        return Modulos::create($data);
    }

    public static function updateModulos($data, $id)
    {
        return Modulos::where("id", $id)->update($data);
    }
}
