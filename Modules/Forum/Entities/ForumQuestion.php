<?php

namespace Modules\Forum\Entities;

use App\Models\User;
use App\Models\Status;
use Modules\Forum\Entities\ForumReply;
use Illuminate\Database\Eloquent\Model;
use Modules\Forum\Entities\ForumAnswer;
use Modules\Forum\Entities\ForumCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ForumQuestion extends Model
{
    use HasFactory;


    protected $fillable = [
      "title",
      "slug",
      "question",
      "forum_category_id",
      "created_by",
      "updated_by",
      "status_id",
      "is_featured",


    ];

    protected static function newFactory()
    {
        return \Modules\Forum\Database\factories\ForumQuestionFactory::new();
    }

    public function category(){
        return $this->belongsTo(ForumCategory::class, 'forum_category_id');
    }

    public function answers(){
        return $this->hasMany(ForumAnswer::class, 'forum_question_id');
    }

    public function replies()
    {
        return $this->hasManyThrough(ForumReply::class, ForumAnswer::class, 'forum_question_id', 'forum_answer_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function updated_by(){
       return $this->belongsTo(User::class, 'updated_by');
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

    // course scopeFilter
    public function scopeFilter($query, $req)
    {
        $where = [];

        if (@$req->created_by) {
            $where[] = ['created_by', '=', $req->created_by];
        }

        if (@$req->search && $req->search != 'undefined' && $req->search != 'null') {
            $where[] = ['title', 'like', '%' . $req->search . '%'];
        }

        if (@$req->category) {
            $where[] = ['forum_category_id', '=', $req->category];
        }

        if (@$req->status) {
            $where[] = ['status_id', '=', $req->status];
        }
        return $query->where($where);
    }

    // Active Count For Category Filter
    public function scopeCountActive($query)
    {
        return $query->where('status_id', 1)->count();
    }
}
