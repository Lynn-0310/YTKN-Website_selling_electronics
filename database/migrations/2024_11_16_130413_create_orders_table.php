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
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->string('country');
        $table->string('first_name');
        $table->string('last_name');
        $table->string('address');
        $table->string('city');
        $table->string('district');
        $table->string('email');
        $table->string('phone');
        $table->text('order_notes')->nullable();
        $table->decimal('total_amount', 10, 2);
        $table->enum('status', ['Pending', 'Processing', 'Completed', 'Canceled'])->default('Pending'); 
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('orders');
}

};
