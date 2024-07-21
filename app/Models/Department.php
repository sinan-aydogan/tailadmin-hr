<?php

namespace App\Models;

use App\Models\UserChildModels\EmployeeUser;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable
        = [
            'name',
            'description',
            'manager_id',
            'is_active',
        ];

    public function manager()
    {
        return $this->belongsTo(EmployeeUser::class, 'manager_id');
    }
}
