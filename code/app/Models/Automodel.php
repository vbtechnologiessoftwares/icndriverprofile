<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Automodel extends Model
{
	  protected $table = 'automodels';

		    protected $fillable = ['name','automake_id'];
    use HasFactory;
}
