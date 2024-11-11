<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Status;
use App\Models\Upload;
use App\Models\Designation;
use Laravel\Sanctum\HasApiTokens;
use Modules\Student\Entities\Student;
use Modules\Course\Entities\Assignment;
use Illuminate\Notifications\Notifiable;
use Modules\Instructor\Entities\Instructor;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\ZoomMeeting\Entities\ZoomSetting;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Modules\Event\Entities\Event;
use Modules\Forum\Entities\ForumCategory;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\F;

class User extends Authenticatable implements MustVerifyEmail
{
  use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'name_ar',
    'username',
    'email',
    'date_of_birth',
    'gender',
    'email_verified_at',
    'token',
    'phone_dial',
    'phone',
    'country',
    'state',
    'location',
    'nationality',
    'education',
    'medical_specialization',
    'work_field',
    'experience_years',
    'place',
    'disability',
    'join_reason',
    'newsletter',
    'password',
    'permissions',
    'last_login',
    'status',
    'status_id',
    'image_id',
    'role_id',
    'designation_id',
    'device_token',
    'facebook_id',
    'google_id',
    'github_id',
    'linkedin_id',
    'total_reviews'
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
    'permissions' => 'array',
  ];

  public static $eventsIds = null;

  public function image(): BelongsTo
  {
    return $this->belongsTo(Upload::class);
  }

  

  public function role(): BelongsTo
  {
    return $this->belongsTo(Role::class);
  }

  public function designation(): BelongsTo
  {
    return $this->belongsTo(Designation::class);
  }



  public function instructor()
  {
    return $this->hasOne(Instructor::class);
  }

  public function assignments()
  {
    return $this->hasMany(Assignment::class, 'created_by');
  }

  public function student()
  {
    return $this->hasOne(Student::class);
  }

  public function purchaseCourses()
  {
    return $this->hasMany('Modules\Order\Entities\Enroll', 'user_id', 'id');
  }

  public function courses()
  {
    return $this->hasMany('Modules\Course\Entities\Course', 'created_by');
  }

  public function courseEnroll()
  {
    return $this->hasMany('Modules\Order\Entities\Enroll', 'instructor_id', 'id');
  }

  public function userStatus()
  {
    return $this->belongsTo(Status::class, 'status_id');
  }

  public function bookmarks()
  {
    return $this->hasMany('Modules\Course\Entities\Bookmark', 'user_id', 'id');
  }

  public function userCourseEnroll()
  {
    return $this->hasMany('Modules\Order\Entities\Enroll', 'user_id', 'id');
  }


  public function blogs()
  {
    return $this->hasMany('Modules\Blog\Entities\Blog', 'created_by');

  }

  // for zoom

  public function zoomSetting()
  {
    return $this->hasOne(ZoomSetting::class, 'user_id', 'id');
  }

  public function events()
  {
    return $this->belongsToMany(Event::class, 'event_users');
  }


  public function interestInEvent($event_id)
  {
    //cached value for performance matter
    if (!is_array(self::$eventsIds)) {
      self::$eventsIds = DB::table('event_users')->where('user_id', auth()
        ->user()->id)
        ->select('event_id')
        ->get()
        ->pluck('event_id')
        ->toArray();
    }

    return in_array($event_id, self::$eventsIds);
  }

  public function allowedForums()
  {
    return $this->belongsToMany(ForumCategory::class, 'users_allowed_forums', 'user_id', 'forum_id');
  }

  public function getPublicURlPage()
  {
    return "/profile/" . $this->username;
  }

  public function getTransWorkField()
  {
    switch ($this->work_field) {
      case 'Content Creator':
        return ___('student.Content Creator');
      case 'Web Programming':
        return ___('student.Web Programming');
      case 'Graphic Design':
        return ___('student.Graphic Design');
      default:
        return ___('student.Other');
    }
  }


  public function getTransEducation()
  {
    switch ($this->education) {
      case 'primary_school':
        return ___('student.Primary School');
      case 'middle_school':
        return ___('student.Middle School');
      case 'high_school':
        return ___('student.High School');
      case 'institute':
        return ___('student.Institute');
      case 'university':
        return ___('student.University');
      case 'higher_education':
        return ___('student.Higher Education');

        return '';
    }
  }
}
