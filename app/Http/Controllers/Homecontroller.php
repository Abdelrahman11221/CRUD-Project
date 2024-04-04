<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\EndUserInterface;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public $interface;

    public function __construct(EndUserInterface $interface)
    {
        $this->interface = $interface;
    }

    public function home()
    {
        return $this->interface->home();
    }

}
