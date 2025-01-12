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
        Schema::create('order_data', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();

            $table->json('items')->nullable();
            $table->json('items_ids')->nullable();
            $table->integer('total_amount')->nullable();

            $table->date('order_date')->nullable();

            $table->enum('status',['pending','accepted','rejected'])->default('pending');

            $table->integer('warehouse_id');
            $table->integer('manager_id');
            $table->integer('staff_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_data');
    }
};
