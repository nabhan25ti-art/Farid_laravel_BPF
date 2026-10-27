<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('Biodata_1066', function (Blueprint $table) {
            $table->text('pengalaman')->nullable();
            $table->text('tujuan_karier')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('Biodata_1066', function (Blueprint $table) {
            $table->dropColumn(['pengalaman', 'tujuan_karier']);
        });
    }
};