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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('agent_fullname');
            $table->string('agent_profession')->nullable();
            $table->text('agent_description')->nullable();
            $table->string('agent_contact_number')->nullable();
            $table->string('agent_email');
            $table->string('agent_password');
            $table->string('agent_photo')->nullable();
            $table->string('agent_skype')->nullable();
            $table->string('agent_facebook')->nullable();
            $table->string('agent_twitter')->nullable();
            $table->string('agent_instagram')->nullable();
            $table->string('agent_linkedin')->nullable();
            $table->string('agent_verification_code');
            $table->integer('agent_is_verified')->default(0);
            $table->integer('agent_status')->default(0);
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
        Schema::dropIfExists('agents');
    }
};
