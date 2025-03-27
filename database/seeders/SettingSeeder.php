<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $envFilePath = base_path('.env');
        $envFileContent = file_get_contents($envFilePath);
        $envs = explode("\n", $envFileContent);
        foreach ($envs as $env) {
            // Check if not empty and not a comment
            if (trim($env) !== '' && !str_starts_with(trim($env), '#')) {
                // Split the line into key and value
                [$key, $value] = explode('=', $env, 2);
                // Remove any surrounding quotes from the value
                $value = trim($value, '"');
                // Create a new setting in the database
                \App\Models\Setting::create([
                    'env' => strtolower(trim($key)),
                    'key' => trim($key),
                    'value' => $value,
                ]);
            }
        }
    }
}
