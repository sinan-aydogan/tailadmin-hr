<?php

namespace App\Models\UserChildModels;

use App\Models\User;
use Parental\HasParent;
class ManagerUser extends User
{
    use HasParent;
}
