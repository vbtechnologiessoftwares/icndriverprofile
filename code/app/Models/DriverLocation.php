<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DriverLocation extends Model
{

    protected $table = 'driver_locations';

    protected $primaryKey = 'driverlocationid';
    protected $fillable =['driverid','locationid'];
    public $timestamps = false;

    /**
     * Get the driver that owns the License
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class, 'driverid', 'driverid');
    }
}
