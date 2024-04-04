<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','img','course_id'];

    public function course()
    {
        return $this->belongsTo(course::class , 'course_id' , 'id');
    }

    public function getImgAttribute($value)
    {
        return 'images/teacher/' . $value;
    }
}
