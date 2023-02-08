<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Courses extends Model
{
    use HasFactory;

    protected $table = 'courses';
    protected $guarded = false;

    public function material() {
       return $this->hasMany(Material::class);
    }

    public function updateCourse($data, $courses)
    {
        $courses->updata($data);
    }

    public function deleteCourse($materials, $courses)
    {
        foreach ($materials as $material) {
            Storage::disk('public')->delete($material->material);
        }
        $courses->delete();
    }

}
