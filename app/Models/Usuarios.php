<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use  HasFactory;

    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $fillable = [
        'prefixo',
        'nome_completo',
        'nome_abrev',
        'foto',
        'email',
        'password',
        'level',
        'updated_at',
        'created_at',
    ];

    public function getUsuarios()
    {
        return Usuario::get();
    }

    public function getUsuarioById($id)
    {
        return Usuario::find($id);
    }

    public static function createUsuario($data)
    {
        return Usuario::create($data);
    }

    public static function updateUsuario($data, $id)
    {
        return Usuario::where("id", $id)->update($data);
    }
}
