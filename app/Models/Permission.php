<?php

namespace App\Models;

use App\Traits\LogAllActivity;
use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{
    use LogAllActivity;
}
