<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Activity extends Model
{
    protected $fillable = [
        'title',
        'description',
        'start_date',
        'due_date',
        'priority',
        'status',
        'created_by',
    ];

    // Admin who created the activity
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Staff members assigned to the activity
    public function assignedUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
                    ->withTimestamps();
    }

    // Progress updates for this activity
    public function updates(): HasMany
    {
        return $this->hasMany(ActivityUpdate::class);
    }

    // History of administrator reassignment actions
    public function reassignments(): HasMany
    {
        return $this->hasMany(ActivityReassignment::class);
    }
}
