<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licenseauthoritymaster extends Model
{
    use HasFactory;
	  protected $table = 'licenseauthority_master';
    
    
       protected $fillable = ['rowid ','licenseauthority'];
}
