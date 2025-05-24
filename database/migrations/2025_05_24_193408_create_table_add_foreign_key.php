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
        Schema::table('employee', function (Blueprint $table) {
            $table->unsignedBigInteger( "departament_id" )->nullable();
            $table->foreign("departament_id" )->references("id")->on("departament");
           });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_add_foreign_key');
    }
};
