<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'type_id',
        'service_id',
        'folio',
        'quantity_services',
        'dap',
        'deadline',
        'address',
        'state',
        'payment_state',
        'state_phytosanitary',
        'observation',
        'img_1',
        'img_2',
        'img_3',
        'img_4',
    ];

    /* $table->unsignedBigInteger('team_id');
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
            $table->foreign('service_id')->references('id')->on('services'); */
}
