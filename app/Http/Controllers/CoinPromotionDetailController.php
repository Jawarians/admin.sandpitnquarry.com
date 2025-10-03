<?php

namespace App\Http\Controllers;

use App\Models\CoinPromotionDetail;
use App\Models\CoinPromotion;
use Illuminate\Http\Request;

class CoinPromotionDetailController extends Controller
{
    /**
     * Show the form for creating a new coin promotion detail.
     */
    public function create(Request $request)
    {
        $coinPromotionId = $request->query('coin_promotion_id');
        $coinPromotion = CoinPromotion::findOrFail($coinPromotionId);
        
        return view('coin-promotion-details.create', compact('coinPromotion'));
    }
    
    /**
     * Store a newly created coin promotion detail.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'coin_promotion_id' => 'required|exists:coin_promotions,id',
            'price' => 'required|integer',
            'coins' => 'required|integer',
            'free_coins' => 'required|integer',
            'discount' => 'required|integer|min:0|max:100',
            'promotion_images' => 'nullable|string',
        ]);
        
        $validated['creator_id'] = 1; // Default to admin or system user
        
        CoinPromotionDetail::create($validated);
        
        return redirect()->route('coin-promotions.edit', $validated['coin_promotion_id'])
            ->with('success', 'Promotion detail added successfully.');
    }
    
    /**
     * Show the form for editing the specified coin promotion detail.
     */
    public function edit(CoinPromotionDetail $coinPromotionDetail)
    {
        return view('coin-promotion-details.edit', compact('coinPromotionDetail'));
    }
    
    /**
     * Update the specified coin promotion detail.
     */
    public function update(Request $request, CoinPromotionDetail $coinPromotionDetail)
    {
        $validated = $request->validate([
            'price' => 'required|integer',
            'coins' => 'required|integer',
            'free_coins' => 'required|integer',
            'discount' => 'required|integer|min:0|max:100',
            'promotion_images' => 'nullable|string',
        ]);
        
        $coinPromotionDetail->update($validated);
        
        return redirect()->route('coin-promotions.edit', $coinPromotionDetail->coin_promotion_id)
            ->with('success', 'Promotion detail updated successfully.');
    }
    
    /**
     * Remove the specified coin promotion detail.
     */
    public function destroy(CoinPromotionDetail $coinPromotionDetail)
    {
        $coinPromotionId = $coinPromotionDetail->coin_promotion_id;
        $coinPromotionDetail->delete();
        
        return redirect()->route('coin-promotions.edit', $coinPromotionId)
            ->with('success', 'Promotion detail deleted successfully.');
    }
}