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
        Schema::table('services', function (Blueprint $table) {
            $table->longText('hero_intro')->nullable()->after('excerpt');
            $table->longText('hero_goal')->nullable()->after('hero_intro');
            $table->longText('about')->nullable()->after('hero_goal');

            // ini akan berisi poin-poin (1 baris = 1 poin)
            $table->longText('highlights')->nullable()->after('about');
            $table->longText('process')->nullable()->after('highlights');
            $table->longText('results')->nullable()->after('process');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'hero_intro',
                'hero_goal',
                'about',
                'highlights',
                'process',
                'results',
            ]);
        });
    }
};
