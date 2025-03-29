<?php

namespace App\Models;

use App\Traits\LogAllActivity;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use LogAllActivity;

    protected $fillable = [
        'env',
        'key',
        'value',
    ];

    // Override the boot method
    protected static function boot()
    {
        parent::boot();

        // Updating the value in the .env file when the model is updated
        static::updating(function ($model) {
            $envFilePath = base_path('.env');
            $envFileContent = file_get_contents($envFilePath);
            $newEnvContent = preg_replace(
                "/^{$model->key}=(.*)$/m",
                "{$model->key}={$model->value}",
                $envFileContent
            );
            file_put_contents($envFilePath, $newEnvContent);
        });
    }
}
