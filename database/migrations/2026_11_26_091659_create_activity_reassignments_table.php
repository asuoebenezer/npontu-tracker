
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activity_reassignments', function (Blueprint $table) {
            $table->id();

            // Activity being reassigned
            $table->foreignId('activity_id')
                ->constrained()
                ->cascadeOnDelete();

            // Administrator who performed the reassignment
            $table->foreignId('admin_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            // Staff members before reassignment
            $table->json('previous_assignees');

            // Staff members after reassignment
            $table->json('new_assignees');

            // Date and time of reassignment
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_reassignments');
    }
};
