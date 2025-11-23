<?php

namespace Modules\Custom\Database\Seeders;

use App\Helpers\Common\DBUtils;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CustomDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key constraints (Temporarily)
        Schema::disableForeignKeyConstraints();

        // Truncate all tables
        $tables = ['posts', 'users'];
        if (count($tables) > 0) {
            foreach ($tables as $table) {
                DB::table($table)->truncate();
            }
        }

        Schema::enableForeignKeyConstraints();

        $this->call([
            UserSeeder::class,
            PostSeeder::class,
        ]);
    }
}
