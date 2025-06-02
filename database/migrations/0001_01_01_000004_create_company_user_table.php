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
        Schema::create("company_user", function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")
                ->references("id")
                ->on("users")
                ->cascadeOnDelete();
            $table->foreignId("company_id")
                ->references("id")
                ->on("companies")
                ->cascadeOnDelete();
            // not enum because values might change
            // and not separate table because its not needed
            $table->string("user_role");
            $table->softDeletes("deleted_at");
            $table->timestamps();

            $table->unique(["company_id", "user_id"]);
            $table->index("deleted_at");
            $table->index("user_role");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("company_user");
    }
};
