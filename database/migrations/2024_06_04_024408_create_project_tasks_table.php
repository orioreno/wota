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
        Schema::create('project_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->index();
            $table->string('name');
            $table->text('description');
            $table->foreignId('user_id')->index();
            $table->date('due');
            $table->enum('priority', array_column(\App\Enums\ProjectTaskPriority::cases(), 'name'));
            $table->enum('status', array_column(\App\Enums\ProjectTaskStatus::cases(), 'name'));
            $table->boolean('archived')->default(false);
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_tasks');
    }
};
