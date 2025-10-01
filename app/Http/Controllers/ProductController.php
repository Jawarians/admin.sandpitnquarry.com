<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\ProductImage;

class ProductController extends Controller
{
    /**
     * Display a listing of products.
     */
    public function index()
    {
        $products = Product::with(['product_category', 'product_images' => function($query) {
            $query->where('featured', true)->orWhereIn('id', function($subquery) {
                $subquery->selectRaw('MIN(id)')->from('product_images')->groupBy('product_id');
            });
        }])->paginate(request('per_page', 10));
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
            'active' => 'nullable|in:0,1',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured' => 'nullable|in:0,1'
        ]);

        try {
            // Begin transaction to ensure data integrity
            DB::beginTransaction();
            
            // Create the product
            $product = Product::create([
                'name' => $data['name'],
                'nama' => $data['nama'] ?? null,
                'description' => $data['description'] ?? null,
                'product_category_id' => $data['product_category_id'] ?? null,
                'active' => isset($data['active']) && $data['active'] == '1' ? 1 : 0,
                'creator_id' => Auth::id() ?? 1, // Use authenticated user ID or default to 1
            ]);

            // Handle image upload if provided
            if ($request->hasFile('product_image')) {
                $image = $request->file('product_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                
                // Store in Google Cloud Storage or local storage
                $imagePath = $image->storeAs('products', $imageName, 'public');
                $imageUrl = asset('storage/' . $imagePath);

                // Create product image record
                $product->product_images()->create([
                    'url' => $imageUrl,
                    'featured' => $request->has('featured') ? 1 : 0,
                    'creator_id' => Auth::id() ?? 1, // Use authenticated user ID or default to 1
                ]);
            }

            DB::commit();
            return redirect()->route('products.index')->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', 'Unable to create product: ' . $e->getMessage());
        }
    }
}
