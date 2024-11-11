<?php

namespace Modules\Event\Entities;

use App\Models\User;
use App\Traits\Relationship\StatusRelationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mentoring extends Model
{
    use HasFactory, StatusRelationTrait;

    /**
     * title
     * phone
     * status
     * content
     * reference
     * mentoring_date
     */
    protected $fillable = [];
    protected $casts = [
        'mentoring_date' => 'date',
    ];

    public const AvailableStatuses = ['idle', 'closed'];

    public function scopeIdle($query)
    {
        return $query->where('status', 'idle');
    }


    public function scopeNotBroadcasted($query, $val = 1)
    {
        return $query->where('broadcasted', 0);
    }

    public function broadcasted()
    {
        $this->broadcasted = 1;
        $this->status = 'closed';
        $this->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }
}
