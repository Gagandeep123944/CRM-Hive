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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_name');
            $table->integer('package_duration');
            $table->decimal('package_cost', 10, 2);
            $table->text('package_covered');
            $table->text('package_description');
            $table->date('from_date');
            $table->date('to_date');
            $table->string('plane_type');
            $table->decimal('couple_price', 10, 2);
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages'); 
    }
};
