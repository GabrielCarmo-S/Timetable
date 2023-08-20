<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use  HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_name',
        'user_email',
        'user_password',
        'user_level',
        'updated_at',
        'created_at',
    ];

    public function getUsers()
    {
        return User::get();
    }

    public function getUserById($id)
    {
        return User::find($id);
    }

    public static function createUser($data)
    {
        return User::create($data);
    }

    public static function updateUser($data, $id)
    {
        return User::where("user_id", $id)->update($data);
    }
}
