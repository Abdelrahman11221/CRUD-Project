<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_review extends Model
{
    use HasFactory;
    protected $fillable = ['std_name','job_title','review'];

    public static function review_rules()
    {
        return [
            'name' => 'required|min:3',
            'job_title'=>'required|min:2',
            'review'=>'required|max:250'
        ];
    }
}
