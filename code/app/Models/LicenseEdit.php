<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LicenseEdit extends Model
{

    protected $table = 'driver_licences_edits';

    protected $primaryKey = 'licenseeditid';
    protected $fillable =['driverid','licensephoto','approved','approvedbyadminid','approveddatetime','licensenumber','licenseauthority','licenseexpiry'];
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
        return $this->belongsTo(Licenseauthoritymaster::class, 'licenseauthority', 'licenseauthority');
    }
}
