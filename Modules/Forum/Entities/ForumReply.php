<?php

namespace Modules\Forum\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Forum\Entities\ForumAnswer;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ForumReply extends Model
{
    use HasFactory;
    protected $fillable = ['forum_answer_id','comment','status_id','created_by'];

    protected static function newFactory()
    {
        return \Modules\Forum\Database\factories\ForumReplyFactory::new();
    }

    public function answers(){
        return $this->belongsTo(ForumAnswer::class, 'forum_answer_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'created_by');
    }

    // active Reply
    public function scopeActive($query)
    {
        return $query->where('status_id', 1);
    }
}
