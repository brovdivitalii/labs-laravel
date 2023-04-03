<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('gas_stations', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('address');
            $table->string('owner_company');
            $table->string('owner_address');
            $table->text('fuel_list');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gas_stations');
    }
};
