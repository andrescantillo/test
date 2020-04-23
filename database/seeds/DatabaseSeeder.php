<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'posts'
        ]);

        $this->call([
            UserSeeder::class,
            PostSeeder::class,
            
        ]);
        
    }

    protected function truncateTables(array $tables){
        DB::statement('PRAGMA foreign_keys = OFF;');
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('PRAGMA foreign_keys = ON;');
    }
}
