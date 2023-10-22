<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    use HasFactory;
	  protected $table = 'autos';
    
    
       protected $fillable = ['year', 'make', 'model', 'sub_model', 'vin', 'relationship_to_applicant', 'first_name_relationship', 'last_name_relationship', 'bod', 'gender', 'marital_status', 'license_status', 'license_state', 'coverage_type', 'uninsured_motorist_cover', 'current_coverage_type', 'current_insurance_company', 'current_policy_expiry_date', 'insured_Since', 'first_name', 'last_name', 'email', 'phone', 'address', 'city', 'state', 'zip','xxTrustedFormCertUrl','xxTrustedFormPingUrl'];
}
