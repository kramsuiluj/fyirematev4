<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Applicant;
use App\Models\Certificate;
use App\Models\Chief;
use App\Models\Fsic;
use App\Models\Head;
use App\Models\Location;
use App\Models\Marshal;
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

        $endUser = User::create([
            'username' => 'jdoe123',
            'firstname' => 'John',
            'middlename' => 'Smith',
            'lastname' => 'Doe',
            'position' => 'Administrative Aide',
            'is_admin' => false,
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
                'user_id' => $endUser->id,
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

        Location::create([
            'region' => '05',
            'province' => '0505',
            'city' => '050508',
            'postal_code' => 4504
        ]);

        Chief::factory(3)->create();
        Marshal::factory(3)->create();

    }
}
