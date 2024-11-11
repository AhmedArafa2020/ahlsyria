<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ApiReturnFormatTrait;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ProfileController extends Controller
{
    use ApiReturnFormatTrait;

    protected $user;

    // constructor injection
    public function __construct(
        User $user
    ) {
        $this->user = $user;
    }

    public function profile($username)
    {


        $user = $this->user->query()->where('username', $username)->first();
        // if ($user && $user->instructor) {
        //     $data['instructor'] = $user->instructor;
        //     return view('frontend.profile.instructor', compact('data'));
        // } else 

        if (@$user && $user->student) {
            $data['student'] = $user->student;
            $data['title'] = @$data['student']->user->name . ' - ' . ___('instructor.profile'); // title
            return view('frontend.profile.student', compact('data'));
        }

        throw new HttpException(404);
    }
}
