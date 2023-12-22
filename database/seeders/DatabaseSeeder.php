<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $userRole = DB::table('role')->where('id', 2)->first();
        if (!$userRole) {
            DB::table('role')->insert([
                'id' => 2,
                'name_role' => 'user',
            ]);
        }

        // Check if 'admin' role exists before inserting
        $adminRole = DB::table('role')->where('id', 1)->first();
        if (!$adminRole) {
            DB::table('role')->insert([
                'id' => 1,
                'name_role' => 'admin',
            ]);
        }
    }
}
