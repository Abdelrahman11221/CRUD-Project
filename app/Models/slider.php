<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    use HasFactory;
    protected $fillable = ['title' , 'subtitle' , 'image'];

    public static function rules()
    {
        //The columns name ('title') --> must be the fields name in the form ... 
        return [
            'title' => 'required|min:3',
            'description' => 'required|min:5',
            'img' => 'mimes:jpg,png,jpeg,gif,svg'
        ];
    }

    public function getImageAttribute($value)
    {
        return 'images/sliders/' . $value;
    }
}
