<?php

namespace App\Http\Controllers\Panel\Student;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Events\UserEmailVerifyEvent;
use App\Http\Controllers\Controller;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Student\Entities\Student;
use App\Http\Requests\frontend\student\SignUpRequest;
use App\Traits\FileUploadTrait;

class StudentAuthController extends Controller
{
    use ApiReturnFormatTrait, FileUploadTrait;

    protected $user;
    protected $student;

    public function __construct(User $user, Student $student)
    {
        $this->user = $user;
        $this->student = $student;
    }

    public function signUp()
    {

        // $user = User::find(1665);
        // $test = event(new UserEmailVerifyEvent($user));
        // dd($test,$user);
        
        
        try {
            if (auth()->check()) {
                return redirect()->route('home')->with('warning', ___('alert.You are already logged in'));
            }
            $data['title'] = ___('student.Sign Up'); // title
            return view('frontend.auth.sign_up', compact('data'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    public function signUpPost(SignUpRequest $request)
    {
        DB::beginTransaction(); // start database transaction
        try {
            if (auth()->check()) {
                return redirect()->route('home')->with('warning', ___('alert.You are already logged in'));
            }
            $user_name = preg_replace('/[^A-Za-z0-9]/', '', Str::slug($request->name, '-'));
            $user = new $this->user;
            $user->name = $request->name;
            $user->name_ar = $request->name_ar;
			      $user->gender = $request->gender;
            $user->date_of_birth = $request->date_of_birth;
            $user->country = $request->country;
            $user->state = $request->state;
            $user->education = $request->education;
            
             $user->medical_specialization = $request->medical_specialization != 'other' ? $request->medical_specialization : $request->other_medical_specialization;
            $user->work_field = $request->work_field != 'other' ? $request->work_field : $request->other_work_field;
            $user->experience_years = $request->experience_years;
          /*  $user->freelancer = $request->freelancer;
            $user->freelancer_years = $request->freelancer_years;*/
            $user->phone_dial = $request->phone_dial;
            $user->join_reason = $request->join_reason;
            $user->nationality = $request->nationality;
            $user->place = $request->place;
            $user->location = $request->location;
            $user->disability = $request->disability;
            $user->username = $user_name . '-' . Str::random(5);
            $user->email = $request->email;
            $user->phone = $request->phone;
            
            $user->newsletter = $request->newsletter != null ? 1 : 0;
            $user->password = Hash::make($request->password);
            $user->role_id = Role::STUDENT;
            $user->status_id = 4;
            //$user->email_verified_at = date("Y-m-d H:i:s");
            if ($user->save()) {
                $user->student()->create();
                if ($request->hasFile('cv_file')) {
                    $upload = $this->uploadFile($request->cv_file, 'student/profile', [], '', 'file');
                    if ($upload['status']) {
                        $user->student->cv_file_id = $upload['upload_id'];
                        $user->student->save();
                    } else {
                        return $this->responseWithError($upload['message'], [], 400);
                    }
                }
                event(new UserEmailVerifyEvent($user));
                $data['redirect_url'] = route('frontend.signIn');

                DB::commit();
                return $this->responseWithSuccess('تم تسجيل الحساب بنجاح', $data);
            }
        } catch (\Throwable $th) {
            DB::rollBack(); // rollback database transaction
            return $this->responseWithError($th->getMessage(), [], 400); // return error response

        }
    }
}
