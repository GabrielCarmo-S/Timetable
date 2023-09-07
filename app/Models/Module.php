<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use  HasFactory;

    protected $table = 'modules';
    protected $primaryKey = 'module_id';
    protected $fillable = [
        'module_name',
        'updated_at',
        'created_at',
        'course_id',
    ];

    public function getModule()
    {
        return Module::get();
    }

    public function getModuleById($id)
    {
        return Module::find($id);
    }

    public static function createModule($data)
    {
        return Module::create($data);
    }

    public static function updateModule($data, $id)
    {
        return Module::where("module_id", $id)->update($data);
    }
}
