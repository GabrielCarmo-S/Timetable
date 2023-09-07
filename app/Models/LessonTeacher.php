<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonTeacher extends Model
{
    use  HasFactory;

    protected $table = 'lesson_teachers';
    protected $primaryKey = 'lesson_id';
    protected $fillable = [
        'lesson_id',
        'teacher_id',
        'updated_at',
        'created_at',
    ];

    public function getLessonTeacher()
    {
        return LessonTeacher::get();
    }

    public function getLessonTeacherById($id)
    {
        return LessonTeacher::find($id);
    }

    public static function createLessonTeacher($data)
    {
        return LessonTeacher::create($data);
    }

    public static function updateLessonTeacher($data, $id)
    {
        return LessonTeacher::where("lesson_id", $id)->update($data);
    }
}
