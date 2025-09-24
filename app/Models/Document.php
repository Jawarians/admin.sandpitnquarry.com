<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Document extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $keyType = 'integer';

    protected $fillable = [
        'created_at',
        'creator_id',
        'deleted_at',
        'documentable_id',
        'documentable_type',
        'label',
        'path',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'integer',
        'creator_id' => 'integer',
        'created_at' => 'datetime',
        'documentable_id' => 'string',
        'documentable_type' => 'string',
    ];

    protected static function booted(): void
    {
        static::creating(function (Document $document) {
            if (DB::table('morphs')->where('qualified_name', $document['documentable_type'])->exists()) {
                $morph = DB::table('morphs')->where('qualified_name', $document['documentable_type'])->first();
                $document['documentable_type'] = $morph->type;
            }

            if (!empty($document['bytes'])) {
                $file = base64_decode($document['bytes']);
                $safeName = Str::random(15) . '.' . $document['extension'];


                if ($document['label'] == 'customer signature') {
                    Storage::disk('documents')->put($morph->type . '/' . 'customer_signature' . '/' . $document['documentable_id'] . '/' . $safeName, $file);
                    // $document['path'] = env('SUPABASE_STORAGE_ENDPOINT') . '/storage/v1/object/public/documents/' . $morph->type . '/' . 'customer_signature' . '/' . $document['documentable_id'] . '/' . $safeName;
                    $document['path'] = env('GCS_STORAGE_API_URI') . '/' . env('GCS_BUCKET')  . '/' . $morph->type . '/' . 'customer_signature' . '/' . $document['documentable_id'] . '/' . $safeName;
                } else if ($document['label'] == 'delivery order') {
                    Storage::disk('documents')->put($morph->type . '/' . 'delivery_order' . '/' . $document['documentable_id'] . '/' . $safeName, $file);
                    //  $document['path'] = env('SUPABASE_STORAGE_ENDPOINT') . '/storage/v1/object/public/documents/' . $morph->type . '/' . 'delivery_order' . '/' . $document['documentable_id'] . '/' . $safeName;
                    $document['path'] = env('GCS_STORAGE_API_URI') .'/' . env('GCS_BUCKET')  . '/' . $morph->type . '/' . 'delivery_order' . '/' . $document['documentable_id'] . '/' . $safeName;
                } else {
                    Storage::disk('documents')->put($morph->type . '/' . $document['documentable_id'] . '/' . $safeName, $file);
                    // $document['path'] = env('SUPABASE_STORAGE_ENDPOINT') . '/storage/v1/object/public/documents/' . $morph->type . '/' . $document['documentable_id'] . '/' . $safeName;
                    $document['path'] = env('GCS_STORAGE_API_URI'). '/'. env('GCS_BUCKET')  . '/' . $morph->type . '/' . $document['documentable_id'] . '/' . $safeName;
                }

                unset($document['bytes']);
                unset($document['extension']);

 
                if ($morph->type == 'user') {
                    $document['documentable_type'] = 'customer';
                    DB::table('users')
                        ->where('id', $document['documentable_id'])
                        ->update(['profile_photo_path' => $document['path']]);
                } else if ($document['label'] == 'delivery order') {
                    $document['documentable_type'] = 'trip_detail';
                    DB::table('trip_details')
                        ->where('id', $document['documentable_id'])
                        ->update(['delivery_order' => $document['path']]);
                } else if ($document['label'] == 'customer signature') {
                    $document['documentable_type'] = 'trip_detail';
                    DB::table('trip_details')
                        ->where('id', $document['documentable_id'])
                        ->update(['customer_signature_path' => $document['path']]);
                }
            }

            return true;
        });
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'creator_id', 'id');
    }

    public function documentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function latest(): HasOne
    {
        return $this->hasOne(Document::class)->latestOfMany();
    }
}
