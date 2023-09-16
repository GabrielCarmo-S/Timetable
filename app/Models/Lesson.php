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
        return Lesson::leftJoin('modules', 'modules.module_id', '=', 'lessons.module_id')
            ->leftJoin('courses', 'courses.course_id', '=', 'modules.course_id')
            ->leftJoin('lesson_teachers', 'lesson_teachers.lesson_id', '=', 'lessons.lesson_id')
            ->leftJoin('teachers', 'teachers.teacher_id', '=', 'lesson_teachers.teacher_id')
            ->select(
                'lessons.lesson_id',
                'lessons.lesson_name',
                'lessons.is_mandatory',
                'lessons.lesson_date',
                'lessons.lesson_time',
                'modules.module_name',
                'courses.course_name',
                'teachers.teacher_name'
            )
            ->get();
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
