<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    
    public function index() : View
    {
        return view('products.index', [
        'products' => Product::latest()->paginate(4)
        ]);
    }
   

    public function create() : View
    {
        return view('products.create');
        }

  


    public function store(StoreProductRequest $request) : RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('product-images', 'public');
        }

        Product::create($validated);

        return redirect()->route('products.index')
            ->withSuccess('New product is added successfully.');
    }



    public function show(Product $product) : View
        {
        return view('products.show', compact('product'));
        }



    public function edit(Product $product) : View
        {
        return view('products.edit', compact('product'));
    }


   public function update(UpdateProductRequest $request, Product $product) : RedirectResponse
{
    $validated = $request->validated();

    if ($request->hasFile('image')) {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $validated['image'] = $request->file('image')->store('product-images', 'public');
    }

    $product->update($validated);

    return redirect()->back()
        ->withSuccess('Product is updated successfully.');
}



    public function destroy(Product $product) : RedirectResponse
    {
        if ($product->image) {
             Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('products.index')
        ->withSuccess('Product is deleted successfully.');
    }
}