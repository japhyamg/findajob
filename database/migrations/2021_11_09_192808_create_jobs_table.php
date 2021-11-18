<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employer_id');
            $table->string('title');
            $table->string('slug');
            $table->string('functions');
            $table->string('industry');
            $table->string('location');
            $table->string('level');
            $table->string('min_qualification');
            $table->string('monthly_salary')->nullable();
            $table->string('experience');
            $table->string('deadline');

            $table->text('summary');
            $table->text('requirement');
            $table->boolean('apply_with_cover')->default(false);
            $table->boolean('is_sponsored')->default(false);

            $table->string('status')->default('draft');
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
        Schema::dropIfExists('jobs');
    }
}
