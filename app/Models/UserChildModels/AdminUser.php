<?php

namespace App\Models\UserChildModels;

use App\Models\User;
use Parental\HasParent;

class AdminUser extends User
{
    use HasParent;
}
