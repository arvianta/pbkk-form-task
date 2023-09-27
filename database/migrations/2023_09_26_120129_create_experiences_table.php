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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->enum('employment_type', ['Contract', 'Full-time', 'Part-time', 'Internship']);
            $table->string('company_name', 50);
            $table->string('location', 50);
            $table->enum('location_type', ['On-site', 'Hybrid', 'Remote']);
            $table->longText('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('documentation');
            $table->decimal('rating', 5, 2);

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
