<?php

namespace Modules\Student\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\CommonHelperTrait;
use App\Http\Controllers\Controller;
use App\Traits\ApiReturnFormatTrait;
use Modules\Student\Interfaces\StudentInterface;
use Modules\Instructor\Http\Requests\SkillRequest;
use Modules\Instructor\Http\Requests\SocialMediaLinksRequest;

class SocialMediaLinkController extends Controller
{
    use ApiReturnFormatTrait, CommonHelperTrait;

    protected $student;

    public function __construct(StudentInterface $StudentInterface)
    {
        $this->student = $StudentInterface;
    }
    // start addSkill
    public function addSkill(Request $request, $id)
    {
        try {
            $data['url'] = route('admin.student.store.social', $id); // url
            $data['title'] = ___('course.social_media_links'); // title
            @$data['button'] = ___('student.Save & Update'); // button
            $data['student'] = $this->student->model()->where('user_id', $id)->first();
            $html = view('student::modal.social.edit', compact('data'))->render(); // render view
            return $this->responseWithSuccess(___('alert.data_retrieve_success'), $html); // return success response
        } catch (\Throwable $th) {
            return $this->responseWithError(___('alert.something_went_wrong_please_try_again'), [], 400); // return error response
        }
    }

    public function storeSocialMediaLink(SocialMediaLinksRequest $request, $id)
    {
        try {
            $result = $this->student->storeSocialMediaLink($request, $id);
            if ($result->original['result']) {
                return $this->responseWithSuccess($result->original['message']); // return success response
            } else {
                return $this->responseWithError($result->original['message'], [], 400); // return error response
            }
        } catch (\Throwable $th) {
            return $this->responseWithError(___('alert.something_went_wrong_please_try_again'), [], 400); // return error response
        }
    }
}
