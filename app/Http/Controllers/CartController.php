<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;

class CartController extends FrontendController
{
    /**
     * Display catalog index page.
     *
     * @return Response
     */
    public function index()
    {
        $cart = Cart::content();

        $products = Product::whereIn('id', $cart->pluck('id'))->get()->keyBy('id');

        $cart->transform(function ($item, $key) use ($products) {
            $item->product = $products[$item->id];
            return $item;
        });

        return view('cart.index', compact('cart'));
    }

    /**
     * Add item to cart.
     *
     * @param $id
     * @param int $qty
     * @param null $attributes
     * @return Response
     */
    public function add($id, $qty = 1, $attributes = null)
    {
        $product = Product::findOrFail($id);

        $cartItem = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $qty,
            'price' => $product->price,
        ]);

        $cartItem->associate(Product::class);

        return redirect(route('cart.index'));
    }

    /**
     * Delete item from cart.
     *
     * @param $rowId
     * @return Response
     */
    public function delete($rowId)
    {
        Cart::remove($rowId);

        return redirect(route('cart.index'));
    }
}