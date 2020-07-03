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
            'staff_or_student_number' => '44813',
            'email' => 'umacfmm2020@gmail.com',
            'password_hash' => Hash::make('12345678'),
            'name' => 'FMM Admin',
            'contact' => '44813',
            'last_actived_at' => Carbon::now(),
            'is_admin' => true,
            'records_count' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
