<?php

namespace Modules\Event\Entities;

use App\Models\User;
use App\Traits\Relationship\StatusRelationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory, StatusRelationTrait;

    /** C:\xampp\htdocs\ahl-syria\Modules\Event\Entities\Event.php
     * title
     * slug
     * address
     * status
     * content
     * image_id
     * start_date
     * end_date
     * broadcasted
     * created_by
     * updated_by
     * deleted_by
     */
    protected $fillable = [
      'start_date',
      'end_date'
    ];
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
    public const AvailableStatuses = ['active', 'disabled'];
    // booted
    protected static function booted()
    {
        static::created(function ($events) { // when events created then forget cache
            cache()->forget('Events');
        });

        static::updated(function ($events) { // when events updated then forget cache
            cache()->forget('Events');
        });

        static::deleted(function ($events) { // when events deleted then forget cache
            cache()->forget('Events');
        });
    }

    // image relation with upload
    public function image(): BelongsTo
    {
        return $this->belongsTo('App\Models\Upload', 'image_id');
    }


    // active
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeNotBroadcasted($query, $val = 1)
    {
        return $query->where('broadcasted', 0);
    }

    public function broadcasted()
    {
        $this->broadcasted = 1;
        $this->save();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'event_users');
    }
}
