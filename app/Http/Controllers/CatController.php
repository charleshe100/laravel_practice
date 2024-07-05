<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;


class CatController extends Controller
{
    public function hello(){
        return view('hello');
    }
}
