<?php

namespace Modules\Event\Entities;

use App\Models\User;
use App\Traits\Relationship\StatusRelationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Newsletter extends Model
{
    use HasFactory, StatusRelationTrait;

    /**
     * title
     * sub_title
     * status
     * content
     */
    protected $fillable = [];
    protected $casts = [];

    public const AvailableStatuses = ['in_progress', 'error', 'completed'];
}
