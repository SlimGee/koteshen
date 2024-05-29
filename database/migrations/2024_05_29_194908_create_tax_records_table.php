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
        Schema::create('tax_records', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('rate');
            $table->decimal('amount');
            $table->unsignedInteger('taxable_id');
            $table->string('taxable_type');
            $table->foreignId('business_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_records');
    }
};
