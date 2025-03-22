<?php

namespace App\Models;

use App\Traits\LogAllActivity;

class Role extends \Spatie\Permission\Models\Role
{
    use LogAllActivity;
}
