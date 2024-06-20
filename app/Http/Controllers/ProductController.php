<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $products = Product::paginate();

        return view('product.index', compact('products'))
            ->with('i', ($request->input('page', 1) - 1) * $products->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $product = new Product();

        return view('product.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request): RedirectResponse
    {
        // Récupérer l'image du formulaire
        $image = $request->file('image');

        // Génération d'un nom de fichier unique
        $fileName = uniqid() . '.' . $image->getClientOriginalExtension();

        // Enregistrer l'image dans le système de fichiers
        $image->storeAs('public/images', $fileName); 
        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->image = $fileName;
        $product->save();

        return Redirect::route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $product = Product::find($id);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $product = Product::find($id);

        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->validated());

        return Redirect::route('products.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Product::find($id)->delete();

        return Redirect::route('products.index')
            ->with('success', 'Product deleted successfully');
    }

    public function showPublic($id)
    {
        $product = Product::findOrFail($id);
        return view('productshow', compact('product'));
    }
    public function showAll()
    {
        $product = Product::all();
        return view('products/products', compact('product'));
    }

    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        
        $cart = session()->get('cart', []);
        if(count($cart) !== 0){
            if(array_key_exists($product->id, $cart)){
                $cart[$product->id] = [
                    "name" => $product->name,
                    "quantity" => intval($cart[$product->id]["quantity"]) + 1,
                    "price" => $product->price,
                    "image" => $product->image
                ];
            } else {
                $cart[$product->id] = [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->image
                ];
            }
        } else {
            $cart = [];
            $cart[$product->id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Ajouté au panier!');
    }
}
