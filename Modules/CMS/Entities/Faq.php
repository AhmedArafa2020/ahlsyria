<?php

namespace Modules\CMS\Entities;

use App\Models\Upload;
use App\Traits\Relationship\StatusRelationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory, StatusRelationTrait;

    protected $fillable = [];

    // booted
    protected static function booted()
    {
        static::created(function ($faq) { // when faq created then forget cache
            cache()->forget('faq');
        });

        static::updated(function ($faq) { // when faq updated then forget cache
            cache()->forget('faq');
        });

        static::deleted(function ($faq) { // when faq deleted then forget cache
            cache()->forget('faq');
        });


    }

    public function scopeSearch($query, $request)
    {
        if ($request->has('search') && !empty($request->search)) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        return $query;
    }

    public function scopeActive($query)
    {
        return $query->where('status_id', 1);
    }
}
