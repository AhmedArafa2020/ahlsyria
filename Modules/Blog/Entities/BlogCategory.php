<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Relationship\StatusRelationTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use HasFactory, StatusRelationTrait,SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'created_by',
        'status_id',
    ];


    // search by title
    public function scopeSearch($query, $search)
    {
        return $query->where('title', 'like', '%' . $search . '%');
    }

    public function blogs() :HasMany {
        return $this->hasMany(Blog::class,'blog_categories_id');
    }
}
