<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index () {
        return view('home');
    }

    public function content(int $article = 0) {
        return view('content');
    }
}
