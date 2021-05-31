<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('machines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')
                  ->nullable()
                  ->constrained();
            $table->foreignId('client_id')
                  ->nullable()
                  ->constrained();
            $table->string('brand');
            $table->string('model');
            $table->string('serial_number');
            $table->date('active_since');
            $table->smallInteger('service_interval')->default(6);
            $table->date('next_service')->nullable();
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machines');
    }
}
