<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\FuelType;
use App\Enums\GearboxType;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('car_brands');
            $table->string('name', 100);
            $table->string('imageUrl', 255);
            $table->integer('enginePower');
            $table->integer('engineCapacity');
            $table->integer('numberDoors');
            $table->integer('airbags');
            $table->enum('fuel', FuelType::getTypesToArray())->default(FuelType::PETROL->value);
            $table->enum('gearbox', GearboxType::getTypesToArray())->default(GearboxType::MANUAL->value);
            $table->year('yearOfProduction');
            $table->boolean('abs')->default(false);
            $table->boolean('electricWindows')->default(false);
            $table->boolean('electricMirrors')->default(false);
            $table->boolean('heatedMirrors')->default(false);
            $table->boolean('centralLocking')->default(false);
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
        Schema::dropIfExists('car_models');
    }
};
