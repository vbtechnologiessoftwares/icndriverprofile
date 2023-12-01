<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EditDriverPhoto extends Model
{

    protected $table = 'driver_photos_edits';

    protected $primaryKey = 'photoid';
    protected $fillable = ['driverid','photoeditdatetime','driverid','approved','approvedbyadminid', 'driversphoto'];
    public $timestamps = false;


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
