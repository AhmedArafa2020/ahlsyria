<?php

namespace Modules\Forum\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Forum\Entities\ForumQuestion;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ForumAnswer extends Model
{
    use HasFactory;

    protected $fillable = ['forum_question_id','answer','status_id','created_by','updated_by'];

    protected static function newFactory()
    {
        return \Modules\Forum\Database\factories\ForumAnswerFactory::new();
    }

    public function question(){
        return  $this->belongsTo(ForumQuestion::class, 'forum_questions_id');
    }

    public function reply(){
        return $this->hasMany(ForumReply::class, 'forum_answer_id');
    }

    public function user(){
        return  $this->belongsTo(User::class, 'created_by');
    }

    public function updated_by(){
        return  $this->belongsTo(User::class, 'updated_by');
    }

    // active Answers
    public function scopeActive($query)
    {
        return $query->where('status_id', 1);
    }
}
