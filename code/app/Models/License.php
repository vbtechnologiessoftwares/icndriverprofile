<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class License extends Model
{

    protected $table = 'driver_licences';

    protected $primaryKey = 'licenseid';
    protected $fillable = ['driverid', 'licensephoto','licensenumber','licenseexpiry','licenseauthority'];
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
    public function licenseauthoritymaster(): BelongsTo
    {
        return $this->belongsTo(Licenseauthoritymaster::class, 'licenseauthority', 'rowid');
    }
}
