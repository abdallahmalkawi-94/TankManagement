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
        Schema::create('system_devices', function (Blueprint $table) {
            $table->id();
            $table->string('mac_address')->nullable()->unique();
            $table->string('name');
            $table->string('location')->nullable();
            $table->foreignId('parent_id')->nullable()->references('id')->on('system_devices');
            $table->integer('value')->nullable();
            $table->boolean('is_relay')->default(false);
            $table->boolean('relay_command')->default(false);
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
        Schema::dropIfExists('system_devices');
    }
};
