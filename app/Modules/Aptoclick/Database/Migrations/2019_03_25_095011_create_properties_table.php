<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'properties', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('user_id')->nullable();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->unsignedInteger('property_condition_id')->nullable();
                $table->foreign('property_condition_id')->references('id')->on('property_conditions')->onDelete('cascade');
                $table->unsignedInteger('property_type_id')->nullable();
                $table->foreign('property_type_id')->references('id')->on('property_types')->onDelete('cascade');
                $table->string('slug')->nullable();
                $table->string('title');
                $table->text('description')->nullable();
                $table->decimal('sell_price', 10, 2)->nullable()->default(0);
                $table->decimal('rental_price', 10, 2)->nullable()->default(0);
                $table->decimal('maintenance_expenses', 10, 2)->nullable()->default(0);
                $table->decimal('ground_surface', 6, 2)->nullable()->default(0);
                $table->decimal('covered_surface', 6, 2)->nullable()->default(0);
                $table->tinyInteger('floors')->nullable()->default(0);
                $table->tinyInteger('rooms')->nullable()->default(1);
                $table->tinyInteger('bathrooms')->nullable()->default(1);
                $table->tinyInteger('parking')->nullable()->default(1);
                $table->tinyInteger('years')->nullable()->default(0);
                $table->boolean('elevator')->nullable()->default(0);
                $table->string('days_available')->nullable();
                $table->string('hours_available')->nullable();
                $table->boolean('featured')->nullable()->default(0);
                $table->timestamps();
                $table->softDeletes();
            }
        );
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
}
