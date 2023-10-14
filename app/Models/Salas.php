<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salas extends Model
{
    use  HasFactory;

    protected $table = 'salas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nome',
        'data',
        'hora',
    ];

    public function getSalas()
    {
        return Salas::get();
    }

    public function getSalasById($id)
    {
        return Salas::find($id);
    }

    public static function createSalas($data)
    {
        return Salas::create($data);
    }

    public static function updateSalas($data, $id)
    {
        return Salas::where("class_id", $id)->update($data);
    }
}
