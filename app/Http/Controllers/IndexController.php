<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Return view home
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */

    public function home()
    {
        return view('pages.home');
    }

    /**
     * Register Page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function login()
    {
        return view('pages.auth.login');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function register()
    {
        return view('pages.auth.register');
    }

    /**
     * All products - page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function allProducts(Request $request)
    {

        $collections = Collection::all();

        $products = Product::query()->where('isPublished', '=', true);

        if($request->has('collection')) {
            $products = $products->where('collection_id', '=', $request->get('collection'));
        }

        $products = $products->paginate(20)->withQueryString();

        return view('pages.products', compact(['collections', 'products']));

    }
}
