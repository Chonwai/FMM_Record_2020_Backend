<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class NormalUserSeeder extends Seeder
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
            'staff_or_student_number' => 'mb955370',
            'email' => 'mb955370@um.edu.mo',
            'password' => Hash::make('fmm2020'),
            'name' => 'Edison',
            'contact' => '62093398',
            'last_actived_at' => Carbon::now(),
            'is_admin' => false,
            'records_count' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
