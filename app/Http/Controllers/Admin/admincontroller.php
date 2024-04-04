<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class admincontroller extends Controller
{
    public function admin(){
        return view('adminassets.index');
    }
}
