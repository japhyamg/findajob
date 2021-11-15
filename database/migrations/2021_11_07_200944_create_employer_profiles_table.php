<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employer_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id');
            $table->string('companyname');
            $table->string('companyrc')->nullable();
            $table->string('logo')->nullable();
            $table->string('nationality');
            $table->text('address')->nullable();
            $table->string('website')->nullable();
            $table->string('industry');
            $table->string('noofemployers')->nullable();
            $table->string('specialities')->nullable();
            $table->text('aboutus')->nullable();
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
        Schema::dropIfExists('employer_profiles');
    }
}
