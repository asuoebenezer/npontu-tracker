<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityUpdate extends Model
{
    protected $fillable = [
        'activity_id',
        'user_id',
        'update',
        'status',
        'remark',
    ];

    // Activity associated with this update
    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }

    // Staff member who submitted the update
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
