<?php

namespace App\Models\UserChildModels;

use App\Models\User;
use Parental\HasParent;

class EmployeeUser extends User
{
    use HasParent;
}
