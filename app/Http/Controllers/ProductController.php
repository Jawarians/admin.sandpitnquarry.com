<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of products.
     */
    public function index()
    {
        $products = Product::with('product_category')->paginate(15);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $categories = \App\Models\ProductCategory::where('active', 1)->get();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created product.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'nullable|string|max:255',
            'nama' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'product_category_id' => 'nullable|integer',
            'active' => 'nullable|in,0,1'
        ]);

        try {
            Product::create([
                'name' => $data['name'],
                'nama' => $data['nama'] ?? null,
                'description' => $data['description'] ?? null,
                'product_category_id' => $data['product_category_id'] ?? null,
                'active' => isset($data['active']) && $data['active'] == '1' ? 1 : 0,
            ]);
            return redirect()->route('products.index')->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Unable to create product.');
        }
    }
}
