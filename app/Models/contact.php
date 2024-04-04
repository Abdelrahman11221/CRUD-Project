<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','phone_num','message'];

    public static function create_rule()
    {
        return [
            'name' => 'required|min:3',
            'email'=>'required|email',
            'phone'=>'required|max:12',
            'message'=>'required|max:250'
        ];
    }
}
