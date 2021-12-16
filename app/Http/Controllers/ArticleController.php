<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use GuzzleHttp\Message\Response;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //for easy demonstration, use index as traditional way
    public function index()
    {
        $articles = Article::all();
        return view('article.index', ['articles' => $articles]);
    }

    //This is the function for article list JSON response
    public function list()
    {
        $articles = Article::all();
        return response()->json($articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|max:255',
            'image' => 'required',

        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'mimes:jpg,jpeg,gif,bmp,png'
            ]);

            $request->file('image')->store('article_images');
            $article = new Article;
            $article->title = $request->get('title');
            $article->body = $request->get('body');
            $article->image = $request->file('image')->hashName();
            $article->save();
        }

        return redirect('/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return response()->json($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return response()->json($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $this->save($request, $article);
        return redirect('/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect('/articles');
    }
}
