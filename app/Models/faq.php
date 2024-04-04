<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faq extends Model
{
    use HasFactory;
    protected $fillable = ['question' , 'answer'];

    public static function data()
    {
        return [
            'question' => ['required' , 'min:3'],
            'answer' => ['required' , 'min:3']
        ];
    }

    public static function answer()
    {
        return [
            'answer' => ['required' , 'min:3']
        ];
    }
}
