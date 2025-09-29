<?php
namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;

class MoneyCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    /**
     * Cast the given value.
     * 
     * Returns the raw numeric value without currency formatting.
     * For display with MYR formatting, use a formatter in the view.
     */
    public function get($model, string $key, $value, array $attributes)
    {
        return $value !== null ? (float) $value : null;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, string $key, $value, array $attributes)
    {
        if ($value === null) {
            return null;
        }
        
        // Handle formatted strings like "1,234.56", "RM1,234.56" or "MYR1,234.56"
        if (is_string($value)) {
            // Remove currency symbols (RM/MYR), commas and other non-numeric characters except decimal point
            $value = preg_replace('/[^0-9.]/', '', $value);
        }
        
        if (!is_numeric($value)) {
            throw new InvalidArgumentException("The given value '{$value}' is not a valid money amount.");
        }
        
        // Convert to a proper numeric value and ensure it's stored as a number
        return (float) $value;
    }
}