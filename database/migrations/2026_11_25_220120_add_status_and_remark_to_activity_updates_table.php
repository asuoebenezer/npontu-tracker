
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('activity_updates', function (Blueprint $table) {
            $table->enum('status', ['done', 'pending'])
                  ->default('pending');

            $table->text('remark')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('activity_updates', function (Blueprint $table) {
            $table->dropColumn(['status', 'remark']);
        });
    }
};
