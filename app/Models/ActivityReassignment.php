<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityReassignment extends Model
{
    protected $fillable = [
        'activity_id',
        'admin_id',
        'previous_assignees',
        'new_assignees',
    ];

    protected function casts(): array
    {
        return [
            'previous_assignees' => 'array',
            'new_assignees' => 'array',
        ];
    }

    // Activity that was reassigned
    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }

    // Administrator who performed the reassignment
    public function administrator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
