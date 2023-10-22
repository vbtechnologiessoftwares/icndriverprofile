<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->id();
            $table->string('year')->nullable();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('sub_model')->nullable();
            $table->string('vin')->nullable();
            $table->string('relationship_to_applicant')->nullable();
            $table->string('first_name_relationship')->nullable();
            $table->string('last_name_relationship')->nullable();
            $table->string('bod')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('license_status')->nullable();
            $table->string('license_state')->nullable();
            $table->string('coverage_type')->nullable();
            $table->string('uninsured_motorist_cover')->nullable();
            $table->string('current_coverage_type')->nullable();
            $table->string('current_insurance_company')->nullable();
            $table->string('current_policy_expiry_date')->nullable();
            $table->string('insured_Since')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autos');
    }
};
