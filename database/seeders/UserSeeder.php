<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Class UserSeeder
 */
class UserSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'demoUser',
            'email' => 'demoUser@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('SomePass123!'),
            'remember_token' => Str::random(10),
        ]);
    }
}
