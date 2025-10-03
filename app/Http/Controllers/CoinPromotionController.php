<?php

namespace App\Http\Controllers;

use App\Models\CoinPromotion;
use Illuminate\Http\Request;

class CoinPromotionController extends Controller
{
    /**
     * Display a listing of coin promotions.
     */
    public function index()
    {
        $coinPromotions = CoinPromotion::with('creator')
            ->orderBy('id', 'desc')
            ->paginate(10);
        
        return view('coin-promotions.index', compact('coinPromotions'));
    }
    
    /**
     * Show the form for creating a new coin promotion.
     */
    public function create()
    {
        return view('coin-promotions.create');
    }
    
    /**
     * Store a newly created coin promotion.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'start_at' => 'required|date',
        ]);
        
        $validated['creator_id'] = 1; // Default to admin or system user
        
        $coinPromotion = CoinPromotion::create($validated);
        
        return redirect()->route('coin-promotions.index')
            ->with('success', 'Coin promotion created successfully.');
    }
    
    /**
     * Show the form for editing the specified coin promotion.
     */
    public function edit(CoinPromotion $coinPromotion)
    {
        $coinPromotion->load('coin_promotion_details');
        return view('coin-promotions.edit', compact('coinPromotion'));
    }
    
    /**
     * Update the specified coin promotion.
     */
    public function update(Request $request, CoinPromotion $coinPromotion)
    {
        $validated = $request->validate([
            'start_at' => 'required|date',
        ]);
        
        $coinPromotion->update($validated);
        
        return redirect()->route('coin-promotions.edit', $coinPromotion)
            ->with('success', 'Coin promotion updated successfully.');
    }
    
    /**
     * Remove the specified coin promotion.
     */
    public function destroy(CoinPromotion $coinPromotion)
    {
        $coinPromotion->delete();
        
        return redirect()->route('coin-promotions.index')
            ->with('success', 'Coin promotion deleted successfully.');
    }
}