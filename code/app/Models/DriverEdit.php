<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DriverEdit extends Model
{

    protected $table = 'driver_details_edits';

    protected $primaryKey = 'drivereditid';
    protected $fillable =['drivereditdatetime','driverid','firstname','lastname','phone','email','description','businessurl','addressline1','addressline2','town','county','postcode','approved'];
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
