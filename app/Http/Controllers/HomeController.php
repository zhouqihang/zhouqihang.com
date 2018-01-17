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
        $this->params['title'] = '启航-去远方';
        $this->params['email'] = 'console_log@126.com';
        $this->params['beian'] = '豫ICP备15015306号-2';
        $this->params['beianLink'] = 'http://www.miitbeian.gov.cn/';
        $this->params['github'] = 'https://github.com/zhouqihang';
        $this->params['sina'] = 'http://weibo.com/zhqihang';
        // TODO edit keywords and desc
        $this->params['keywords'] = '';
        $this->params['desc'] = '';
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
        $this->params['title'] = base64_decode($article->title) . ' - ' . $this->params['title'];
        $article->increment('hits', 1);
        return view('content', $this->params);
    }

    public function star(Article $article = null) {
        $article->increment('stars', 1);
        return $article->stars;
    }
}
