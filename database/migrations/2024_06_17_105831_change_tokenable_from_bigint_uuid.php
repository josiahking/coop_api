<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Rfc4122\UuidV4;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('personal_access_tokens', function (Blueprint $table) {
            $table->uuid('tokenable_uuid')->nullable()->after('tokenable_type');
        });

        // Then, populate the new UUID column with converted values or new UUIDs
        DB::statement('UPDATE personal_access_tokens SET tokenable_uuid = :uuid', [
            'uuid' => UuidV4::uuid4(),
        ]);

        // Drop the old bigint column
        Schema::table('personal_access_tokens', function (Blueprint $table) {
            $table->dropColumn('tokenable_id');
        });

        // Rename the new UUID column to 'tokenable_id'
        Schema::table('personal_access_tokens', function (Blueprint $table) {
            $table->renameColumn('tokenable_uuid', 'tokenable_id');
        });

        // Finally, make 'tokenable_id' not nullable if it was not nullable before
        Schema::table('personal_access_tokens', function (Blueprint $table) {
            $table->uuid('tokenable_id')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personal_access_tokens', function (Blueprint $table) {
            $table->bigInteger('tokenable_id')->nullable()->after('tokenable_type');
        });

        Schema::table('personal_access_tokens', function (Blueprint $table) {
            $table->dropColumn('tokenable_uuid');
        });

        Schema::table('personal_access_tokens', function (Blueprint $table) {
            $table->uuid('tokenable_id')->nullable(false)->change();
        });
    }
};
