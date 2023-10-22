<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DriverPhoto extends Model
{

    protected $table = 'driver_photos';

    protected $primaryKey = 'photoid';


    /**
     * Get the driver that owns the DriverPhoto
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class, 'driverid', 'driverid');
    }
}
