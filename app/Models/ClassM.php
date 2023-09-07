<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassM extends Model
{
    use  HasFactory;

    protected $table = 'class';
    protected $primaryKey = 'class_id';
    protected $fillable = [
        'class_name',
        'class_date',
        'updated_at',
        'created_at',
        'module_id',
    ];

    public function getClassM()
    {
        return ClassM::get();
    }

    public function getClassMById($id)
    {
        return ClassM::find($id);
    }

    public static function createClassM($data)
    {
        return ClassM::create($data);
    }

    public static function updateClassM($data, $id)
    {
        return ClassM::where("class_id", $id)->update($data);
    }
}
