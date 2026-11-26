<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;

#[Fillable([
    'name',
    'email',
    'password',
    'role',
    'is_active',
])]

#[Hidden([
    'password',
    'remember_token',
])]

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Attribute casting
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    // Activities created by this admin
    public function createdActivities(): HasMany
    {
        return $this->hasMany(Activity::class, 'created_by');
    }

    // Activities assigned to this staff member
    public function assignedActivities(): BelongsToMany
    {
        return $this->belongsToMany(Activity::class)
                    ->withTimestamps();
    }

    // Updates made by this user
    public function activityUpdates(): HasMany
    {
        return $this->hasMany(ActivityUpdate::class);
    }

    // Activity reassignment actions performed by this administrator
    public function activityReassignments(): HasMany
    {
        return $this->hasMany(ActivityReassignment::class, 'admin_id');
    }
}
