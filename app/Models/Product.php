<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    protected $fillable = [
            'name',
            'nama',
            'description',
            'ideal',
            'benefit',
            'code',
            'url',
            'product_category_id',
            'product_images',
            'favourites'
    ];

    public function business_price_items(): HasMany
    {
        return $this->hasMany(BusinessPriceItem::class);
    }

    public function business_price_details(): BelongsToMany
    {
        return $this->belongsToMany(BusinessPriceDetail::class, 'business_price_items');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function featured_image(): HasOne
    {
        return $this->hasOne(ProductImage::class)->ofMany([
            'created_at' => 'max',
            'id' => 'max',
        ], function ($query) {
            $query->where('featured', true);
        });
    }

    public function product_category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function price_items(): HasMany
    {
        return $this->hasMany(PriceItem::class);
    }

    public function favourites(): HasMany
    {
        return $this->hasMany(Favourite::class,);
    }

    public function product_images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function retail_postcodes(): BelongsToMany
    {
        return $this->belongsToMany(Postcode::class, 'retail_prices')->withTimestamps();
    }

    public function retail_prices(): HasMany
    {
        return $this->hasMany(RetailPrice::class);
    }

    public function sites(): BelongsToMany
    {
        return $this->belongsToMany(Site::class, 'retail_prices')->withTimestamps();
    }
}
