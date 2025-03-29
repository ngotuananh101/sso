<?php

namespace Database\Seeders;

use App\Models\Setting;
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
                Setting::create([
                    'env' => trim($key),
                    'key' => strtolower(trim($key)),
                    'value' => $value,
                ]);
            }
        }

        $settings = [
            // App description
            [
                'key' => 'description',
                'value' => 'Ponta SSO is a single sign-on solution that allows users to authenticate once and gain access to multiple applications without needing to log in again for each one.',
            ],
            // App keywords
            [
                'key' => 'keywords',
                'value' => 'Ponta SSO, single sign-on, authentication, access control, user management',
            ],
            // App author
            [
                'key' => 'author',
                'value' => 'PontaDev',
            ],
            // Favicon
            [
                'key' => 'favicon',
                'value' => 'https://ponta.dev/favicon.png',
            ],
            // Logo
            [
                'key' => 'logo',
                'value' => '/assets/media/logos/logo.png',
            ],
            // Default theme mode
            [
                'key' => 'default_theme_mode',
                'value' => 'system',
            ],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                ['value' => $setting['value'],]
            );
        }
    }
}
