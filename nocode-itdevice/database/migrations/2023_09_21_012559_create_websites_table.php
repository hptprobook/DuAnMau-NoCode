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
        Schema::create('websites', function (Blueprint $table) {
            $table->id();
            $table->text('logo')->nullable();
            $table->text('support_phone')->nullable();
            $table->text('support_email')->nullable();
            $table->text('care_phone')->nullable();
            $table->text('hotline')->nullable();
            $table->text('facebook')->nullable();
            $table->text('zalo')->nullable();
            $table->text('big_banners')->nullable();
            $table->text('child_banners')->nullable();
            $table->text('deal_banners')->nullable();
            $table->text('footer_banners')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('websites');
    }
};
