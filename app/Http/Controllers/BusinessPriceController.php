<?php

namespace App\Http\Controllers;

use App\Models\BusinessPriceDetail;
use App\Models\BusinessPriceStatus;
use App\Models\Zone;
use Illuminate\Http\Request;

class BusinessPriceController extends Controller
{
    /**
     * Display a listing of business prices with tonne and load prices
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $search = $request->get('search');
        $status = $request->get('status');
        $unit = $request->get('unit', 'Tonne');
        
        // Use the same approach for both Tonne and Load, just apply different filters
        $query = BusinessPriceDetail::with([
            'business_price.user', 
            'business_price_items.business_price_item_details',
            'business_price_items.product'
        ]);
        
        // Filter by unit
        $query->where('unit', $unit);
        
        // Apply search if provided
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->whereHas('business_price.user', function($subq) use ($search) {
                    $subq->where('name', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%");
                })
                ->orWhere('reference_number', 'like', "%{$search}%")
                ->orWhere('type', 'like', "%{$search}%")
                ->orWhere('attention', 'like', "%{$search}%");
            });
        }
        
        // Filter by status if provided
        if ($status && $status !== 'All Status') {
            $query->where('status', $status);
        }
        
        // We need to make sure the business_price_items relationship is properly loaded
        // with the product names we expect in the view
        $materialColumns = [
            'Fine sand', 'Coarse sand', 'Unwashed sand', 'Aggregate3/4',
            'Crusher run', 'Chipping', 'Quarry waste', '6x9 block',
            'Quarry dust', 'Earth soil'
        ];
        
        // Get the business price details with pagination
        $prices = $query->orderBy('created_at', 'desc')->paginate($perPage);
        
        // For Tonne unit, transform the data to the required format
        if ($unit === 'Tonne') {
            // Transform the data for Tonne unit
            $prices->getCollection()->transform(function($detail) {
                // Define material columns we want to display
                $materialColumns = [
                    'Fine sand', 'Coarse sand', 'Unwashed sand', 'Aggregate3/4',
                    'Crusher run', 'Chipping', 'Quarry waste', '6x9 block',
                    'Quarry dust', 'Earth soil'
                ];
                
                // Initialize prices array
                $prices = array_fill_keys($materialColumns, 0);
                
                // Fill in actual prices from the business price items
                foreach ($detail->business_price_items as $item) {
                    $productName = optional($item->product)->name ?? '';
                    
                    // If this is one of our material columns
                    if (in_array($productName, $materialColumns)) {
                        // Get the price from the first item detail
                        foreach ($item->business_price_item_details as $itemDetail) {
                            $prices[$productName] = $itemDetail->price ?? 0;
                            break; // Just take the first price
                        }
                    }
                }
                
                // Format the data in the structure expected by the view
                return [
                    'id' => $detail->business_price->id,
                    'name' => optional($detail->business_price->user)->name ?? $detail->reference_number,
                    'phone' => optional($detail->business_price->user)->phone ?? '60101234567',
                    'prices' => $prices
                ];
            });
        }
        
        // Get all statuses for the filter dropdown
        $priceStatuses = BusinessPriceStatus::orderBy('order')->pluck('status');
        
        return view('business-prices.index', compact('prices', 'unit', 'priceStatuses'));
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
        
        // Base query - in a real app, this would include relationships
        $query = Zone::query();
        
        // Apply search if provided
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('state', 'like', "%{$search}%");
                  // In a real app, you might also search postcodes:
                  // ->orWhereHas('postcodes', function($subQuery) use ($search) {
                  //     $subQuery->where('code', 'like', "%{$search}%");
                  // });
            });
        }
        
        // Get zones with pagination
        $zones = $query->orderBy('name')->paginate($perPage);
        
        // Get the postcode data
        $zonePostcodes = $this->getZonePostcodeData();
        
        return view('zones.index', compact('zones', 'zonePostcodes'));
    }
    
    /**
     * Get zone price data for materials
     * 
     * @return array
     */
    private function getZonePriceData()
    {
        // In a real application, this data would come from a database query
        // For example:
        // $zones = Zone::with('prices')->get();
        // $zonePriceData = [];
        // foreach ($zones as $zone) {
        //     $zonePriceData[$zone->id] = [
        //         'name' => $zone->name,
        //         'state' => $zone->state,
        //         'prices_10t' => $zone->prices->where('unit', '10t')->pluck('amount')->toArray(),
        //         'prices_6t' => $zone->prices->where('unit', '6t')->pluck('amount')->toArray(),
        //     ];
        // }
        // return $zonePriceData;
        
        // For now, we'll return an empty array since we don't need price data for the simplified view
        return [];
    }
    
    /**
     * Get zone postcode data
     * 
     * @return array
     */
    private function getZonePostcodeData()
    {
        // In a real application, this would come from a database query
        // For example:
        // $zonePostcodes = [];
        // $zones = Zone::with('postcodes')->get();
        // foreach ($zones as $zone) {
        //     if ($zone->postcodes->count() > 0) {
        //         $zonePostcodes[$zone->id] = $zone->postcodes->pluck('code')->implode(', ');
        //     }
        // }
        // return $zonePostcodes;
        
        // For demo purposes, we'll simulate data for a few zones
        $zoneIds = Zone::pluck('id')->toArray();
        $zonePostcodes = [];
        
        // Add sample postcode for Ampang (assuming it has ID 23)
        if (in_array(23, $zoneIds)) {
            $zonePostcodes[23] = '68000';
        }
        
        return $zonePostcodes;
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
        $postcodes = $request->input('postcodes');
        
        try {
            // In a real application, you would update this in the database
            // For example:
            // $zone = Zone::findOrFail($zoneId);
            // 
            // Delete existing postcodes
            // $zone->postcodes()->delete();
            // 
            // Add new postcodes
            // $postcodeArray = array_map('trim', explode(',', $postcodes));
            // foreach ($postcodeArray as $code) {
            //     $zone->postcodes()->create(['code' => $code]);
            // }
            
            // Log the update activity
            // activity()
            //     ->performedOn($zone)
            //     ->causedBy(auth()->user())
            //     ->withProperties(['postcodes' => $postcodes])
            //     ->log('Updated zone postcodes');
            
            // For this demo, we'll simulate success
            
            return response()->json([
                'success' => true,
                'message' => 'Postcodes updated successfully',
                'zoneId' => $zoneId,
                'postcodes' => $postcodes
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update postcodes: ' . $e->getMessage()
            ], 500);
        }
    }
    
    // Note: The getTonnePrices method has been merged into the index method
}