<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $products = Product::paginate();

        return view('product.index', compact('products'))
            ->with('i', ($request->input('page', 1) - 1) * $products->perPage());
    }

    public function create(): View
    {
        $product = new Product();
        return view('product.create', compact('product'));
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        $image = $request->file('image');
        $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images', $fileName);

        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->image = $fileName;
        $product->save();

        return Redirect::route('products.index')->with('success', 'Product created successfully.');
    }

    public function show($id): View
    {
        $product = Product::find($id);
        return view('product.show', compact('product'));
    }

    public function edit($id): View
    {
        $product = Product::find($id);
        return view('product.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->validated());
        return Redirect::route('products.index')->with('success', 'Product updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Product::find($id)->delete();
        return Redirect::route('products.index')->with('success', 'Product deleted successfully');
    }

    public function showPublic($id): View
    {
        $product = Product::findOrFail($id);
        return view('productshow', compact('product'));
    }

    public function showAll()
    {
        $products = Product::all();
        return view('products.products', compact('products'));
    }


    public function addToCart(Request $request): RedirectResponse
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);

        $cart = session()->get('cart', []);

        if (isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity'] += $request->quantity;
        } else {
            $cart[$request->product_id] = [
                "name" => $product->name,
                "quantity" => $request->quantity,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('product.showPublic', $product->id)->with('success', 'Product added to cart!');
    }
}
