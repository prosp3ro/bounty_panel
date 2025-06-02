<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // companies will be created by admins when they contact website administrators using contact form
        Schema::create("companies", function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->unique();
            $table->string("slug", length: 120)->unique();
            $table->string("company_name");
            $table->string("logo_path")->nullable();
            $table->string("website_url")->nullable();
            $table->string("contact_url")->nullable();
            $table->string("business_email")->nullable();
            $table->string("country")->nullable();
            $table->text("address")->nullable();
            $table->string("phone_number", length: 20)->nullable();
            $table->longText("about")->nullable();
            $table->boolean("auto_join_enabled")->default(false);
            $table->enum("plan", ["free", "pro", "enterprise"])
                ->default("free");
            $table->string("billing_customer_id")->nullable(); // "stripe_123"
            $table->softDeletes("deleted_at");
            $table->timestamps();

            $table->index("plan");
            $table->index("auto_join_enabled");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("companies");
    }
};
