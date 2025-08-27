<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistrationCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        for ($i = 0; $i < 10000; $i++) {
            $uuid = Str::uuid();
            $simpleCode = strtoupper(Str::random(4)) . '-' . rand(1000, 9999); // e.g. XTZP-4821

            $data[] = [
                'registration_code' => $uuid,
                'registration_code_simple' => $simpleCode,
                'status' => 0,
                'sub_plan' => 0,
                'date_of_registration' => now(),
            ];
        }

        DB::table('registration_code_tbl')->insert($data);
    }
}
