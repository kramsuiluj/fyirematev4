<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Applicant;
use App\Models\Fsic;
use App\Models\Head;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
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

        $fsic = Fsic::create([
            'date' => Carbon::now(),
            'occupancy' => 'Private',
            'issuance' => 'New',
            'establishment' => 'Test Establishment',
            'description' => 'This is an example of a description.',
            'expiration' => Carbon::tomorrow(),
            'chief' => Head::firstWhere('position', 'Chief')->fullname(),
            'marshal' => Head::firstWhere('position', 'Marshal')->fullname(),
        ]);

        Payment::create([
            'fsic_id' => $fsic->id,
            'amount' => 45.50,
            'or_number' => '123456',
            'date' => Carbon::now()
        ]);

        Applicant::create([
            'fsic_id' => $fsic->id,
            'firstname' => 'John',

            'middlename' => 'Smith',
            'lastname' => 'Doe'
        ]);
    }
}
