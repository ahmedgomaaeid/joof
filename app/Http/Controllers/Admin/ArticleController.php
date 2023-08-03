<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('admin.article.index', compact('articles'));
    }
    public function create()
    {
        return view('admin.article.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required|min:10',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $article = new Article();
        $article->title = $request->title;
        $article->description = $request->description;
        if ($request->hasFile('image')) {
            $file_extension = $request->file('image')->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $request->file('image')->move('../webassets/imgs/', $file_name);
        }
        $article->image = $file_name;
        $article->save();
        return redirect()->route('admin.articles')->with('success', 'تم اضافة المقال بنجاح');
    }
    public function edit($id)
    {
        $article = Article::find($id);
        return view('admin.article.edit', compact('article'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required|min:10',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $article = Article::find($id);
        $article->title = $request->title;
        $article->description = $request->description;
        if ($request->hasFile('image')) {
            $file_extension = $request->file('image')->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $request->file('image')->move('../webassets/imgs/', $file_name);
            $article->image = $file_name;
        }
        $article->save();
        return redirect()->route('admin.articles')->with('success', 'تم تعديل المقال بنجاح');
    }


    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect()->route('admin.articles')->with('success', 'تم حذف المقال بنجاح');
    }
}
