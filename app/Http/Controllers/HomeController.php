<?php

namespace App\Http\Controllers;

use App\Article;
use App\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $params = [];

    public function index () {
        // get menus
        $menus = Menu::get(['title', 'label_id']);
        $this->params['menus'] = $menus;

        // get five
        $newArticles = Article::orderBy('created_at', 'desc')->paginate(5);
        $this->params['articles'] = $newArticles;
        return view('home', $this->params);
    }

    public function content(int $article = 0) {
        return view('content');
    }
}
