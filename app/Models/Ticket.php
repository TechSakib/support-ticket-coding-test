<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    const STATUS_OPEN = 'open';
    const STATUS_REPLIED = 'replied';
    const STATUS_CLOSED = 'closed';

    const STATUS_BACKGROUNDS = [
        self::STATUS_OPEN       => 'primary',
        self::STATUS_REPLIED    => 'success',
        self::STATUS_CLOSED     => 'secondary',
    ];

    protected $appends = ['is_closed'];

    public function getIsClosedAttribute(): bool
    {
        return $this->status == self::STATUS_CLOSED;
    }

    public function threads(): HasMany
    {
        return $this->hasMany(TicketThread::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
