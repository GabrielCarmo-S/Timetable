<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use  HasFactory;

    protected $table = 'lessons';
    protected $primaryKey = 'lesson_id';
    protected $fillable = [
        'lesson_id',
        'lesson_name',
        'is_mandatory',
        'lesson_date',
        'lesson_time',
        'updated_at',
        'created_at',
        'module_id',
    ];

    public function getLesson()
    {
        return Lesson::get();
    }

    public function getLessonById($id)
    {
        return Lesson::find($id);
    }

    public static function createLesson($data)
    {
        return Lesson::create($data);
    }

    public static function updateLesson($data, $id)
    {
        return Lesson::where("lesson_id", $id)->update($data);
    }
}
