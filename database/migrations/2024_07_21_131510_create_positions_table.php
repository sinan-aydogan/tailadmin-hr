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
        Schema::create('positions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code');
            $table->string('name');
            $table->string('description')->nullable();
            $table->foreignUuid('department_id')->constrained('departments');
            $table->foreignUuid('superior_id')->nullable()->constrained('users');
            $table->foreignUuid('proxy_id')->nullable()->constrained('users');
            $table->longText('responsibilities')->nullable();
            $table->longText('qualifications')->nullable();
            $table->longText('skills')->nullable();
            $table->longText('education')->nullable();
            $table->longText('experience')->nullable();
            $table->longText('certificates')->nullable();
            $table->longText('language')->nullable();
            $table->longText('benefits')->nullable();
            $table->longText('working_conditions')->nullable();
            $table->longText('working_equipments')->nullable();
            $table->longText('other')->nullable();
            $table->boolean('is_active')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
