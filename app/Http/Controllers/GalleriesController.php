<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Page;

class GalleriesController extends FrontendController
{
    /**
     * Display catalog index page.
     *
     * @return Response
     */
    public function index()
    {
        $galleries = Gallery::all();
        $page = Page::findBySlug('galleries');

        return view('galleries.index', compact('galleries', 'page'));
    }

    /**
     * Display category page.
     *
     * @param $slug
     * @return Response
     */
    public function show($slug)
    {
        $item = Gallery::findBySlugOrFail($slug);

        return view('galleries.show', compact('item'));
    }
}