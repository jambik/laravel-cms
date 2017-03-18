<?php

namespace App\Http\Controllers;

use App\Category;
use App\Page;
use App\Product;

class CatalogController extends FrontendController
{
    /**
     * Display catalog index page.
     *
     * @return Response
     */
    public function index()
    {
        $page = Page::findBySlug('catalog');

        return view('catalog.index', compact('page'));
    }

    /**
     * Display category page.
     *
     * @param $slug
     * @return Response
     */
    public function category($slug)
    {
        $category = Category::findBySlugOrFail($slug);
        $descendants = $category->descendants()->get();
        $children = $descendants->where('parent_id', $category->id);

        $products = Product::whereIn('category_id', $descendants->pluck('id')->push($category->id)->toArray())->get();

        return view('catalog.category', compact('category', 'children', 'products'));
    }

    /**
     * Display product page.
     *
     * @param $slug
     * @return Response
     */
    public function product($slug)
    {
        $product = Product::findBySlugOrFail($slug);
        $category = $product->category;

        $amount            = 3;
        $sameProducts      = Product::where('id', '<>', $product->id)->get();
        $sameProductsCount = $sameProducts->count();
        $sameProducts      = $sameProductsCount > 1
                                ? $sameProducts->random($sameProductsCount < $amount ? $sameProductsCount : $amount)
                                : $sameProducts;

        return view('catalog.product', compact('category', 'product', 'sameProducts'));
    }
}