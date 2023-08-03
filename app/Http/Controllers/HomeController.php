<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // get four first articles
        $articles = Article::take(4)->get();
        // get all categories
        $categories = Category::all();
        // return view with data
        return view('index', compact('articles', 'categories'));
    }
    public function news()
    {
        $articles = Article::all();
        return view('news', compact('articles'));
    }
}
