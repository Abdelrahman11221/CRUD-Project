<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Apicontroller extends Controller
{
    public function test()
    {
        $user = User::get();
        return $user;
    }
}
