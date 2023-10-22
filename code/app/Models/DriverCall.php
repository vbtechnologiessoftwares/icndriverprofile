<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DriverCall extends Model
{

    protected $table = 'driver_calls';

    protected $primaryKey = 'callid';

    protected $casts = [
        'datetime' => 'datetime',
    ];

    public $timestamps = false;


    /**
     * Get the driver that owns the DriverCall
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class, 'driverid', 'driverid');
    }

    /**
     * Get the location that owns the DriverCall
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'locationid', 'locationid');
    }
}
