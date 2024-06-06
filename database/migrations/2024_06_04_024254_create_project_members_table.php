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
        Schema::create('project_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id');
            $table->foreignId('user_id');
            $table->enum('role', array_column(\App\Enums\ProjectMemberRole::cases(), 'name'));
            $table->enum('view', array_column(\App\Enums\ProjectView::cases(), 'name'));
            $table->string('color')->nullable();
            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('last_access')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->unique('project_id', 'user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_members');
    }
};
