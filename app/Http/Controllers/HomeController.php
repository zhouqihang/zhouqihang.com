<?php

namespace App\Http\Controllers;

use App\Article;
use App\Menu;

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

    public function content(Article $article = null) {
        $this->params['article'] = $article;
        $article->increment('hits', 1);
        return view('content', $this->params);
    }

    public function star(Article $article = null) {
        $article->increment('stars', 1);
        return $article->stars;
    }
}
