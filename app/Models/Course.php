<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use  HasFactory;

    protected $table = 'courses';
    protected $primaryKey = 'course_id';
    protected $fillable = [
        'course_name',
        'updated_at',
        'created_at',
    ];

    public function getCourse()
    {
        return Course::get();
    }

    public function getCourseById($id)
    {
        return Course::find($id);
    }

    public static function createCourse($data)
    {
        return Course::create($data);
    }

    public static function updateCourse($data, $id)
    {
        return Course::where("course_id", $id)->update($data);
    }
}
