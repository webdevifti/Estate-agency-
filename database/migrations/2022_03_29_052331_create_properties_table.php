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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('property_unid');
            $table->integer('agent_id');
            $table->string('propert_name');
            $table->string('property_slug');
            $table->string('property_thumbnail')->nullable();
            $table->longText('property_description');
            $table->string('property_location');
            $table->integer('property_price');
            $table->string('property_type');
            $table->string('property_status');
            $table->string('property_area');
            $table->string('property_baths');
            $table->string('property_garages');
            $table->string('property_beds');
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
        Schema::dropIfExists('properties');
    }
};
