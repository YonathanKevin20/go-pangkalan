<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('client_id')->nullable();
            $table->unsignedInteger('driver_id')->nullable();
            $table->decimal('lat_from', 12, 8)->nullable();
            $table->decimal('lng_from', 12, 8)->nullable();
            $table->decimal('lat_to', 12, 8)->nullable();
            $table->decimal('lng_to', 12, 8)->nullable();
            $table->enum('status', ['s','c','o','p'])->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
