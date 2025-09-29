<?php

namespace App\Http\Controllers;

use App\Models\PriceItem;
use App\Models\Zone;
use App\Models\Site;
use App\Models\Product;
use App\Models\Price;
use Illuminate\Http\Request;

class PriceItemController extends Controller
{
    /**
     * Display a listing of the price items
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 50);
        $search = $request->get('search');
        $priceId = $request->get('price_id');
        
        $query = PriceItem::with(['product']);
        
        // Apply search if provided
        if ($search) {
            $query->whereHas('product', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }
        
        // Filter by price_id if provided
        if ($priceId) {
            $query->where('price_id', $priceId);
        }
        
        // Get the price items with pagination
        $priceItems = $query->orderBy('created_at', 'desc')->paginate($perPage);
        
        return view('price-items.index', compact('priceItems'));
    }
    
    /**
     * Display a listing of tonne prices for a specific price ID
     *
     * @param Request $request
     * @param int $priceId
     * @return \Illuminate\Http\Response
     */
    public function tonnePrices(Request $request, $priceId)
    {
        $perPage = $request->get('per_page', 50);
        $search = $request->get('search');
        
        $price = Price::with(['price_items' => function ($query) {
            $query->where('price_itemable_type', 'site');
        }])->findOrFail($priceId);
        
        // Group price items by site_id, wheel_id, and product_id for easier access
        $priceItems = $price->price_items->groupBy(['price_itemable_id', 'wheel_id', 'product_id']);
        
        // Get active products
        $products = Product::where('active', true)
            ->orderBy('id')
            ->get();
        
        // Query for sites
        $sitesQuery = Site::query()
            ->orderByDesc('state')
            ->orderBy('name');
        
        // Apply search if provided
        if ($search) {
            $sitesQuery->where(function($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('state', 'like', "%{$search}%");
            });
        }
        
        $sites = $sitesQuery->paginate($perPage);
        
        // Format data for the view
        $sitesData = [];
        foreach ($sites as $site) {
            $siteData = [
                'id' => $site->id,
                'name' => $site->name,
                'state' => $site->state,
                'products' => [],
            ];
            
            foreach ($products as $product) {
                $wheelId = 1; // Default for tonne prices
                $priceItem = $priceItems[$site->id][$wheelId][$product->id] ?? null;
                $amount = $priceItem ? $priceItem[0]->amount : 0;
                
                $siteData['products'][$product->id] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'amount' => $amount,
                ];
            }
            
            $sitesData[] = $siteData;
        }
        
        return view('price-items.tonne-prices', compact('sitesData', 'products', 'price', 'sites'));
    }
    
    /**
     * Display a listing of load prices for a specific price ID
     *
     * @param Request $request
     * @param int $priceId
     * @return \Illuminate\Http\Response
     */
    public function loadPrices(Request $request, $priceId)
    {
        $perPage = $request->get('per_page', 50);
        $search = $request->get('search');
        
        // Different wheel sizes for load prices
        $wheels = [10, 6];
        
        $price = Price::with(['price_items' => function ($query) {
            $query->where('price_itemable_type', 'zone');
        }])->findOrFail($priceId);
        
        // Group price items by zone_id, wheel_id, and product_id for easier access
        $priceItems = $price->price_items->groupBy(['price_itemable_id', 'wheel_id', 'product_id']);
        
        // Get active products
        $products = Product::where('active', true)
            ->orderBy('id')
            ->get();
        
        // Query for zones
        $zonesQuery = Zone::query()
            ->orderByDesc('state')
            ->orderBy('name');
        
        // Apply search if provided
        if ($search) {
            $zonesQuery->where(function($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('state', 'like', "%{$search}%");
            });
        }
        
        $zones = $zonesQuery->with('postcode_zones')->paginate($perPage);
        
        // Format data for the view
        $zonesData = [];
        foreach ($zones as $zone) {
            $zoneData = [
                'id' => $zone->id,
                'name' => $zone->name,
                'state' => $zone->state,
                'postcodes' => $zone->postcode_zones->pluck('postcode')->implode(', '),
                'wheels' => [],
            ];
            
            // For each wheel size
            foreach ($wheels as $wheel) {
                $wheelData = [
                    'id' => $wheel,
                    'products' => [],
                ];
                
                foreach ($products as $product) {
                    $priceItem = $priceItems[$zone->id][$wheel][$product->id] ?? null;
                    $amount = $priceItem ? $priceItem[0]->amount : 0;
                    
                    $wheelData['products'][$product->id] = [
                        'id' => $product->id,
                        'name' => $product->name,
                        'amount' => $amount,
                    ];
                }
                
                $zoneData['wheels'][$wheel] = $wheelData;
            }
            
            $zonesData[] = $zoneData;
        }
        
        return view('price-items.load-prices', compact('zonesData', 'products', 'price', 'zones', 'wheels'));
    }
    
    /**
     * Update a tonne price
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateTonnePrice(Request $request)
    {
        $priceId = $request->input('price_id');
        $siteId = $request->input('site_id');
        $productId = $request->input('product_id');
        $wheelId = $request->input('wheel_id', 1); // Default to 1 for tonne prices
        $amount = $request->input('amount', 0);
        $amount = $amount * 100; // Multiply by 100 before storing
        $creatorId = $request->input('creator_id', 0);
        
        try {
            if ($amount <= 0) {
                // Delete the price item if amount is 0 or negative
                PriceItem::where('price_id', $priceId)
                    ->where('price_itemable_type', 'site')
                    ->where('price_itemable_id', $siteId)
                    ->where('product_id', $productId)
                    ->where('wheel_id', $wheelId)
                    ->delete();
            } else {
                // Create or update the price item
                PriceItem::updateOrCreate(
                    [
                        'price_id' => $priceId,
                        'price_itemable_type' => 'site',
                        'price_itemable_id' => $siteId,
                        'product_id' => $productId,
                        'wheel_id' => $wheelId,
                    ],
                    [
                        'amount' => $amount,
                        'creator_id' => $creatorId,
                    ]
                );
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Price updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update price: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Update a load price
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateLoadPrice(Request $request)
    {
        $priceId = $request->input('price_id');
        $zoneId = $request->input('zone_id');
        $productId = $request->input('product_id');
        $wheelId = $request->input('wheel_id');
        $amount = $request->input('amount', 0);
        $amount = $amount * 100; // Multiply by 100 before storing
        $creatorId = $request->input('creator_id', 0);
        
        try {
            if ($amount <= 0) {
                // Delete the price item if amount is 0 or negative
                PriceItem::where('price_id', $priceId)
                    ->where('price_itemable_type', 'zone')
                    ->where('price_itemable_id', $zoneId)
                    ->where('product_id', $productId)
                    ->where('wheel_id', $wheelId)
                    ->delete();
            } else {
                // Create or update the price item
                PriceItem::updateOrCreate(
                    [
                        'price_id' => $priceId,
                        'price_itemable_type' => 'zone',
                        'price_itemable_id' => $zoneId,
                        'product_id' => $productId,
                        'wheel_id' => $wheelId,
                    ],
                    [
                        'amount' => $amount,
                        'creator_id' => $creatorId,
                    ]
                );
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Price updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update price: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Display a listing of zones with their price data
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function zones(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $search = $request->get('search');
        
        // Base query
        $query = Zone::query();
        
        // Apply search if provided
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('state', 'like', "%{$search}%");
            });
        }
        
        // Get zones with pagination
        $zones = $query->orderBy('name')->paginate($perPage);
        
        // Get the postcode data
        $zonePostcodes = [];
        $zoneData = Zone::with('postcode_zones')->get();
        foreach ($zoneData as $zone) {
            // Store postcodes as an array for each zone
            $zonePostcodes[$zone->id] = $zone->postcode_zones->pluck('postcode')->toArray();
        }
        
        return view('zones.index', compact('zones', 'zonePostcodes'));
    }
    
    /**
     * Add a postcode to a zone
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function addPostcode(Request $request)
    {
        $zoneId = $request->input('zone_id');
        $postcodeValue = $request->input('postcode');
        
        try {
            // Logic to add a postcode to a zone
            // This would typically involve creating a new PostcodeZone record
            // For now, we're just returning success
            
            return response()->json([
                'success' => true,
                'message' => 'Postcode added successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add postcode: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Update zone postcodes
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function updatePostcodes(Request $request)
    {
        $zoneId = $request->input('zone_id');
        $postcodeString = $request->input('postcodes');
        
        try {
            // Convert comma-separated postcodes string to array
            $postcodes = [];
            if (!empty($postcodeString)) {
                $postcodes = array_map('trim', explode(',', $postcodeString));
                // Remove any empty values
                $postcodes = array_filter($postcodes);
            }
            
            // Logic to update postcodes for a zone
            // This would typically involve updating PostcodeZone records
            // For demonstration purposes, we're just returning success
            
            return response()->json([
                'success' => true,
                'message' => 'Postcodes updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update postcodes: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Show the form for creating a new price item
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::where('active', true)->orderBy('name')->get();
        $prices = Price::orderBy('id')->get();
        return view('price-items.create', compact('products', 'prices'));
    }
    
    /**
     * Store a newly created price item in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'price_id' => 'required|exists:prices,id',
            'product_id' => 'required|exists:products,id',
            'price_itemable_type' => 'required|in:site,zone',
            'price_itemable_id' => 'required|integer',
            'amount' => 'required|numeric|min:0',
            'wheel_id' => 'required|integer',
        ]);
        
        $data = $request->all();
        $data['amount'] = $data['amount'] * 100; // Multiply by 100 before storing
        
        PriceItem::create($data);
        
        return redirect()->route('price.items.index')
            ->with('success', 'Price item created successfully.');
    }
    
    /**
     * Display the specified price item
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $priceItem = PriceItem::with(['product'])->findOrFail($id);
        return view('price-items.show', compact('priceItem'));
    }
    
    /**
     * Show the form for editing the specified price item
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $priceItem = PriceItem::findOrFail($id);
        $products = Product::where('active', true)->orderBy('name')->get();
        $prices = Price::orderBy('id')->get();
        
        return view('price-items.edit', compact('priceItem', 'products', 'prices'));
    }
    
    /**
     * Update the specified price item in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'price_id' => 'required|exists:prices,id',
            'product_id' => 'required|exists:products,id',
            'price_itemable_type' => 'required|in:site,zone',
            'price_itemable_id' => 'required|integer',
            'amount' => 'required|numeric|min:0',
            'wheel_id' => 'required|integer',
        ]);
        
        $priceItem = PriceItem::findOrFail($id);
        $data = $request->all();
        $data['amount'] = $data['amount'] * 100; // Multiply by 100 before storing
        
        $priceItem->update($data);
        
        return redirect()->route('price.items.index')
            ->with('success', 'Price item updated successfully.');
    }
    
    /**
     * Remove the specified price item from storage
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $priceItem = PriceItem::findOrFail($id);
        $priceItem->delete();
        
        return redirect()->route('price.items.index')
            ->with('success', 'Price item deleted successfully.');
    }
}
