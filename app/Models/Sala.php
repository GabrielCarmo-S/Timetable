<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use  HasFactory;

    protected $table = 'salas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nome',
        'data',
        'inicio',
        'termino',
    ];

    public function getSalas()
    {
        return Sala::get();
    }

    public function getSalaById($id)
    {
        return Sala::find($id);
    }

    public static function createSala($data)
    {
        return Sala::create($data);
    }

    public static function updateSala($data, $id)
    {
        return Sala::where("id", $id)->update($data);
    }
}
