<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('type_id')->nullable();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->string('folio')->unique();
            $table->integer('cant_services');
            $table->decimal('dap', 8, 2);
            $table->integer('deadlines');
            $table->string('address');
            $table->enum('state_phytosanitary', ['BUENO', 'REGULAR', 'MALO', 'MUERTO']);
            $table->enum('state', ['CREADA', 'EN PROCESO', 'RECHAZADA', 'REALIZADA'])->default('CREADA');
            $table->enum('payment_state', ['POR PAGAR', 'PAGADO'])->default('POR PAGAR');
            $table->longText('observation')->nullable();
            $table->string('img_1')->nullable();
            $table->string('img_2')->nullable();
            $table->string('img_3')->nullable();
            $table->string('img_4')->nullable();
            $table->timestamps();
            
            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('service_id')->references('id')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
