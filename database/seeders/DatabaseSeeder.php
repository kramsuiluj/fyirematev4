<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Applicant;
use App\Models\Certificate;
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
        User::create([
            'username' => 'admin',
            'firstname' => 'Mark Julius',
            'middlename' => 'Relos',
            'lastname' => 'Maravillo',
            'position' => 'Administrator',
            'is_admin' => true,
            'password' => bcrypt('!password')
        ]);

        $chiefs = Head::factory(5)->create([
            'position' => 'Chief'
        ]);

        $marshals = Head::factory(5)->create([
            'position' => 'Marshal'
        ]);

        for ($i = 0; $i < 5; $i++) {
            $certificate = Certificate::create([
                'fsic_id' => 87974 + $i,
                'filled_date' => Carbon::now(),
                'occupancy_type' => rand(0, 1) ? 'Private' : 'Business',
                'issuance_type' => rand(0, 1) ? 'New' : 'Renewal',
                'description' => fake()->sentences(1, true),
                'valid_until' => Carbon::tomorrow(),
                'chief' => $chiefs[$i]->fullname(),
                'marshal' => $marshals[$i]->fullname(),
                'status' => 'For Inspection',
                'validity' => 'Valid'
            ]);

            Payment::create([
                'certificate_id' => $certificate->id,
                'amount' => 150,
                'or_number' => 46546 + $i,
                'date' => Carbon::now()
            ]);

            Applicant::create([
                'certificate_id' => $certificate->id,
                'establishment' => fake()->words(2, true),
                'firstname' => fake()->firstName,
                'middlename' => fake()->lastName,
                'lastname' => fake()->lastname,
                'address' => fake()->address
            ]);
        }


//
//        $fsic = Fsic::create([
//            'date' => Carbon::now(),
//            'occupancy' => 'Private',
//            'issuance' => 'New',
//            'establishment' => 'Test Establishment',
//            'description' => 'This is an example of a description.',
//            'expiration' => Carbon::tomorrow(),
//            'chief' => Head::firstWhere('position', 'Chief')->fullname(),
//            'marshal' => Head::firstWhere('position', 'Marshal')->fullname(),
//        ]);
//
//        Payment::create([
//            'fsic_id' => $fsic->id,
//            'amount' => 45.50,
//            'or_number' => '123456',
//            'date' => Carbon::now()
//        ]);
//
//        Applicant::create([
//            'fsic_id' => $fsic->id,
//            'firstname' => 'John',
//
//            'middlename' => 'Smith',
//            'lastname' => 'Doe'
//        ]);
//
//        User::factory(5)->create();
    }
}
