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
        Schema::create('helths', function (Blueprint $table) {
            $table->id();
            $table->string('relationship_to_applicant')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('student')->nullable();
            $table->string('medical_condition')->nullable();
            $table->string('any_ongoing_medical_treatment')->nullable();
            $table->string('current_coverage_type')->nullable();
            $table->string('current_insurance_company')->nullable();
            $table->string('expiration_date')->nullable();
            $table->string('insured_since')->nullable();
            $table->string('email')->nullable();
            $table->string('zip')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('other')->nullable();
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
        Schema::dropIfExists('helths');
    }
};
