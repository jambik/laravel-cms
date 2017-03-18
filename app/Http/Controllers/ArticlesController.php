<?php

namespace App\Http\Controllers;

use App\Article;
use App\Page;

class ArticlesController extends FrontendController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $articles = Article::all();
        $page = Page::findBySlug('articles');

        return view('articles.index', compact('articles', 'page'));
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return Response
     */
    public function show($slug)
    {
        $item = Article::findBySlugOrFail($slug);

        return view('articles.show', compact('item'));
    }
}
