<?php

use Illuminate\Database\Seeder;
use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => Str::uuid(),
            'staff_or_student_number' => '00001',
            'email' => 'umacfmm2020@gmail.com',
            'password' => Hash::make('fmm2020'),
            'name' => 'FMM Admin',
            'contact' => '00001',
            'last_actived_at' => Carbon::now(),
            'is_admin' => true,
            'records_count' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'id' => Str::uuid(),
            'staff_or_student_number' => '44813',
            'email' => 'peterchiang@um.edu.mo',
            'password' => Hash::make('fmm2020'),
            'name' => 'Peter',
            'contact' => '44813',
            'last_actived_at' => Carbon::now(),
            'is_admin' => true,
            'records_count' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
