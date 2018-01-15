<?php

namespace App\Http\Controllers;

use App\Article;
use App\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $params = [];

    public function __construct(){
        // get menus
        $menus = Menu::get(['title', 'label_id']);
        $this->params['menus'] = $menus;
    }

    public function index (int $menu = null) {

        // get five
        if ($menu === null) {
            $newArticles = Article::orderBy('created_at', 'desc')->paginate(5);
        }
        else {
            $newArticles = Article::where(['menu_id' => $menu])->orderBy('created_at', 'desc')->paginate(5);
        }
        $this->params['articles'] = $newArticles;
        return view('home', $this->params);
    }

    public function content(int $article = 0) {
        return view('content');
    }
}
