<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Location extends Model
{

    protected $table = 'locations_master';

    protected $primaryKey = 'locationid';


    /**
     * The drivers that belong to the Location
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function drivers(): BelongsToMany
    {
        return $this->belongsToMany(Driver::class, 'driver_locations', 'locationid', 'driverid');
    }
}
