<?php

namespace App\Models;

use App\Models\DriverCall;
use App\Models\DriverPhoto;
use App\Models\DriverPayment;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Driver extends Authenticatable
{
    use HasFactory;
    protected $table = 'driver_details';
	protected $primaryKey = 'driverid';

    protected $fillable = ['driverid', 'username ', 'password', 'signupdate','email'];
	
	protected $guard = 'driveruser';

    public $timestamps = false;


    protected $casts = [
        'signupdate' => 'date',
        'licenseexpiry' => 'date',
        'driverstatus' => 'bool',
    ];


    /**
     * Get the photo associated with the Driver
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function photo(): HasOne
    {
        return $this->hasOne(DriverPhoto::class, 'driverid', 'driverid');
    }

    /**
     * Get all of the calls for the Driver
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function calls(): HasMany
    {
        return $this->hasMany(DriverCall::class, 'driverid', 'driverid');
    }

    /**
     * Get all of the payments for the Driver
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments(): HasMany
    {
        return $this->hasMany(DriverPayment::class,'driverid', 'driverid');
    }

    /**
     * The locations that belong to the Driver
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function locations(): BelongsToMany
    {
        return $this->belongsToMany(Location::class, 'driver_locations', 'driverid', 'locationid');
    }

    /**
     * Get all of the messages for the Driver
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages(): HasMany
    {
        return $this->hasMany(DriverMessage::class, 'driverid', 'driverid');
    }

    /**
     * Get the license associated with the Driver
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function license(): HasOne
    {
        return $this->hasOne(License::class, 'driverid', 'driverid');
    }

    /**
     * Get full name as custom attribute
     * 
     */
    public function getFullNameAttribute()
    {
        return $this->firstname." ".$this->lastname;
    }
}
