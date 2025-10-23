<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    // Cek index by name pakai SHOW INDEX (tanpa butuh doctrine/dbal)
    private function indexExists(string $table, string $indexName): bool
    {
        $rows = DB::select('SHOW INDEX FROM `' . $table . '` WHERE Key_name = ?', [$indexName]);
        return count($rows) > 0;
    }

    public function up(): void
    {
        $indexName = 'leads_email_created_at_index';

        // Tambah index hanya jika belum ada
        if (! $this->indexExists('leads', $indexName)) {
            Schema::table('leads', function (Blueprint $table) {
                $table->index(['email', 'created_at']); // ini otomatis akan bernama leads_email_created_at_index
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $indexName = 'leads_email_created_at_index';

        // Drop index hanya jika ada
        if ($this->indexExists('leads', $indexName)) {
            Schema::table('leads', function (Blueprint $table) use ($indexName) {
                $table->dropIndex($indexName);
            });
        }
    }
};
