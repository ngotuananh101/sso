<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends \Spatie\Activitylog\Models\Activity
{
    // override boot method
    public static function boot(): void
    {
        parent::boot();

        static::saving(function ($model) {
            if (empty($model->causer_id)) {
                $user = User::find(1);
                $model->causer()->associate($user);
            }
        });
    }
}
