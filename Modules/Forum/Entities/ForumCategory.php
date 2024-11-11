<?php

namespace Modules\Forum\Entities;

use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Forum\Entities\ForumQuestion;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ForumCategory extends Model
{
    use HasFactory;
  
    protected $fillable = ['title','slug','created_by','status_id','is_featured','is_course','filters'
  ];
    public $casts = [
        'filters' => 'json',
    ];


    // booted
    protected static function booted()
    {
        static::created(function ($category) { // when courses created then forget cache
            cache()->forget('forum_category');
        });

        static::updated(function ($category) { // when courses updated then forget cache
            cache()->forget('forum_category');
        });
    }

    protected static function newFactory()
    {
        return \Modules\Forum\Database\factories\ForumCategoryFactory::new();
    }

    public function questions(){
       return $this->hasMany(ForumQuestion::class, 'forum_category_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function featured()
    {
        return $this->belongsTo(Status::class, 'is_featured');
    }

    // active Question
    public function scopeActive($query)
    {
        return $query->where('status_id', 1);
    }

    // search by title
    public function scopeSearch($query, $search)
    {
        return $query->where('title', 'like', '%' . $search . '%');
    }

    public function allowedUsers()
    {
        return $this->belongsToMany(User::class, 'users_allowed_forums', 'forum_id', 'user_id');
    }
}
