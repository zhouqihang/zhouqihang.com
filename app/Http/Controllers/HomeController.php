<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index () {
        return 'hello index';
    }
    public function columns(int $menu = 0) {
        // show list
        return $menu;
    }

    public function content(int $article = 0) {
        return $article;
    }
}
