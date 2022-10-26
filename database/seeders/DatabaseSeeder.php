<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Head;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'username' => 'admin',
            'firstname' => 'Mark Julius',
            'middlename' => 'Relos',
            'lastname' => 'Maravillo',
            'position' => 'Administrator',
            'is_admin' => true,
            'password' => bcrypt('!password')
        ]);

        Head::factory(5)->create([
            'position' => 'Chief'
        ]);

        Head::factory(5)->create([
            'position' => 'Marshal'
        ]);
    }
}
