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
}
