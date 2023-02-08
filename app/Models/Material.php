<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Material extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function store($request, $newCourses) {
        if ($request->hasfile('materials')) {
            foreach ($request->file('materials') as $file) {
                $path = Storage::disk('public')->put('materials', $file);
                time() . "_" . uniqid() . "_" . $file->getClientOriginalName();

                Material::create([
                    'courses_id' => $newCourses->id,
                    'material' => $path
                ]);
            }
    }
    }


    public static function updateMaterial($request, $courses, $materials)
    {
        foreach ($materials as $material) {
            Material::where('courses_id', $courses->id)->delete();
            Storage::disk('public')->delete($material->material);
        }

        if ($request->hasfile('materials')) {
            foreach ($request->file('materials') as $file) {
                $path = Storage::disk('public')->put('materials', $file);
                time() . "_" . uniqid() . "_" . $file->getClientOriginalName();

                Material::create([
                    'courses_id' => $courses->id,
                    'material' => $path
                ]);
            }
        }
    }
}


