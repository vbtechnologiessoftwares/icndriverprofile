<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DriverPayment extends Model
{

    protected $table = 'driver_payments';

    protected $primaryKey = 'paymentid';

    protected $casts = [
        'paymentdatetime' => 'datetime',
    ];

    /**
     * Get the driver that owns the DriverPayment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class, 'driverid', 'driverid');
    }
}
