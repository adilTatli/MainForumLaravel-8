<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class  MainController extends Controller
{

    public function index ()
    {
        $title = 'Главная';
        return view('user_panel.index', compact('title'));
    }

}
