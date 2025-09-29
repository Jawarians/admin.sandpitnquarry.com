<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class JobStatus extends Model
{
    protected $primaryKey = 'status';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $appends = [
        'color',
    ];

    protected $casts = [
        'status' => 'string',
    ];

    protected $fillable = [
        'creator_id',
        'rgba',
        'status',
    ];

    public function getColorAttribute()
    {
        $rgba = substr($this->rgba, 5, -1);
        $color = explode(',', $rgba);
        return array(
            'red' => (int) trim($color[0]),
            'green' => (int) trim($color[1]),
            'blue' => (int) trim($color[2]),
            'alpha' => (float) trim($color[3]),
        );
    }

    /**
     * Get jobs that have this status.
     */
    public function jobs()
    {
        // Some deployments don't have a `status` column on the jobs table.
        // Guard against that by returning an empty relation when the column
        // is missing so views that call `$status->jobs` won't trigger a
        // SQL error.
        if (! Schema::hasColumn('jobs', 'status')) {
            // Create a relation that will always be empty.
            return $this->hasMany(Job::class, 'id', 'id')->whereRaw('1=0');
        }

        return $this->hasMany(Job::class, 'status', 'status');
    }

    /**
     * Backwards-compatible accessor for templates that expect `$status->name`.
     */
    public function getNameAttribute()
    {
        return $this->status;
    }
}
