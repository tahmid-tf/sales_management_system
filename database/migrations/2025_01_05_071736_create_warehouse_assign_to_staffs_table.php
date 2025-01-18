<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('warehouse_assign_to_staffs', function (Blueprint $table) {
            $table->id();
            $table->integer('staff_id');
            $table->integer('manager_id');
            $table->integer('warehouse_id');
            $table->integer('admin_id')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse_assign_to_staffs');
    }
};
