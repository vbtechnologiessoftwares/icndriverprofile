<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DriverMessage extends Model
{
    protected $primaryKey = 'drivermessageid';

    protected $casts = [
        'messagedatetime' => 'datetime',
        'messagestatus' => 'bool',
    ];

    public $timestamps = false;

    /**
     * Get the driver that owns the DriverMessage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class, 'driverid', 'driverid');
    }

    /**
     * Get the message that owns the DriverMessage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function message(): BelongsTo
    {
        return $this->belongsTo(Message::class, 'messageid', 'messageid');
    }

}
