<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use  HasFactory;

    protected $table = 'teachers';
    protected $primaryKey = 'teacher_id';
    protected $fillable = [
        'teacher_name',
        'updated_at',
        'created_at',
    ];

    public function getTeacher()
    {
        return Teacher::get();
    }

    public function getTeacherById($id) 
    {
        return Teacher::find($id);
    }

    public static function createTeacher($data)
    {
        return Teacher::create($data);
    }

    public static function updateTeacher($data, $id)
    {
        return Teacher::where("teacher_id", $id)->update($data);
    }
}
