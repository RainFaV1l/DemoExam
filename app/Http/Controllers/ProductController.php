<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\CreateUserRequest;
use App\Http\Requests\Product\CreateRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected CartService $cartService;

    public function __construct()
    {
        $this->cartService = new CartService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {

        $validated = $request->validated();

        // $request->get('is_published') ? true : false
        $validated['is_published'] = (bool)$request->get('is_published');

        if($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image_path')->store('public/images');
        }

        $product = Product::query()->create($validated);

        return redirect()->route('admin.index')->with(['message' => "Product \"$product\" has been created!"]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('pages.product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Product $product)
    {

        $validated = $request->validated();

        if($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image_path')->store('public/images');
        }

        $product = Product::query()->update($validated);

        return redirect()->route('product.show', $product)->with(['message' => "Product \"$product\" has been updated!"]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addToCart($id)
    {
        $product = Product::query()->find($id);

        if(is_null($product)) {
            return back();
        }

        $this->cartService->add($product);

        return back();

    }
}
