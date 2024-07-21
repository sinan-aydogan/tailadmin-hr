<?php

namespace App\Models;

use App\Models\UserChildModels\EmployeeUser;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable
        = [
            'code',
            'name',
            'description',
            'department_id',
            'superior_id',
            'proxy_id',
            'is_active',
            'responsibilities',
            'qualifications',
            'skills',
            'education',
            'experience',
            'certificates',
            'language',
            'benefits',
            'working_conditions',
            'working_equipments',
            'other',
            'is_active'
        ];

    public function employees()
    {
        return $this->hasMany(EmployeeUser::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeInactive($query)
    {
        return $query->where('is_active', false);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }


    public function superior()
    {
        return $this->belongsTo(EmployeeUser::class, 'superior_id');
    }

    public function proxy()
    {
        return $this->belongsTo(EmployeeUser::class, 'proxy_id');
    }
}
