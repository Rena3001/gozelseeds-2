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
        Schema::create('contact_info_smtps', function (Blueprint $table) {
            $table->id();

            // Mailer basics
            $table->string('mailer')->default('smtp');
            $table->string('host');
            $table->unsignedSmallInteger('port')->default(587);
            $table->string('encryption')->nullable(); // tls / ssl

            // From info
            $table->string('from_email');
            $table->string('from_name')->nullable();

            // Microsoft OAuth credentials
            $table->string('client_id');
            $table->text('client_secret');
            $table->string('tenant_id');

            // Status
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_info_smtps');
    }
};
