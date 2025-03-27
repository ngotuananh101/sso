<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Seed system user
        User::create([
            'name' => 'System',
            'username' => 'system',
            'email' => 'system@localhost',
            'email_verified_at' => now(),
            'password' => Hash::make(Str::random('16')),
        ]);

        // Seed admin user
        User::create([
            'name' => 'Ngo Tuan Anh',
            'username' => 'ngotuananh2101',
            'email' => 'anhnt@ponta.dev',
            'email_verified_at' => now(),
            'password' => Hash::make('PontaDev@2025'),
            'remember_token' => null,
        ]);
    }
}
