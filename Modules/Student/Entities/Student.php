<?php

namespace Modules\Student\Entities;

use App\Models\Country;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Order\Entities\Enroll;
use App\Models\Upload;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['points', 'enroll_id'];

    public $casts = [
        'education' => 'json',
        'experience' => 'json',
        'skills' => 'json',
        'social_media_links' => 'json',
        'badges' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    // relation with enrollments
    public function enrollments()
    {
        return $this->hasMany(Enroll::class, 'user_id', 'user_id');
    }
    public function completeEnrollments()
    {
        return $this->hasMany(Enroll::class, 'user_id', 'user_id')->where('is_completed', 1);
    }
    public function cv_file()
    {
        return $this->belongsTo(Upload::class,'cv_file_id');
    }

    public function lastVisited()
    {
        return $this->hasOne(Enroll::class, 'user_id', 'user_id')->orderBy('visited', 'desc');
    }

    public function scopeFilter($query, $req)
    {
        $where = [];
        if (@$req->search && $req->search != 'undefined' && $req->search != 'null') {
            $query->whereHas('user', function ($query) use ($req) {
                $query->where('name', 'like', '%' . $req->search . '%');
            });
        }
        return $query;
    }

}
