<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'description' , 'img' , 'price' ];

    public static function rules()
    {
        return [
            'title' => 'required|min:5',
            'description' => 'required|min:5',
            'img' => 'required|mimes:jpg,png,jpeg,gif,svg',
            'price' => 'required'
        ];
    }

    public function teacher()
    {
        return $this->hasOne(teacher::class , 'course_id' , 'id');
    }

    public function allteachers()
    {
        return $this->hasMany(teacher::class , 'course_id' , 'id');
    }

    public function getImgAttribute($value)
    {
        return 'images/course/' .$value;
    }
}
