<?php
namespace App\Http\Repositories;

use App\Http\Interfaces\EndUserInterface;

class EndUserRepository implements EndUserInterface
{
    public function home()
    {
        return view('index');
    }
}

?>