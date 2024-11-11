<?php

namespace Modules\Forum\Repositories;

use Illuminate\Support\Str;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Support\Facades\Auth;
use Modules\Forum\Entities\ForumAnswer;
use Modules\Forum\Interfaces\ForumAnswerInterface;

class ForumAnswerRepository implements ForumAnswerInterface
{
    use ApiReturnFormatTrait, FileUploadTrait;

    private $model;

    public function __construct(ForumAnswer $forumAnswer)
    {
        $this->model = $forumAnswer;
    }

    public function model()
    {
        try {
            return $this->model;

        } catch (\Throwable $th) {
            return false;
        }
    }

    public function store($request)
    {
        DB::beginTransaction(); // start database transaction
        try {
            if (env('APP_DEMO')) {
                return $this->responseWithError(___('alert.you_can_not_change_in_demo_mode'));
            }

            $target = new $this->model; // create new object of model for store data in database table
            $target->forum_question_id = $request->quesion_id;
            $target->answer = $request->answer;
            $target->status_id = 1;
            $target->created_by = Auth::id();
            $target->save(); // save data in database table

            DB::commit(); // commit database transaction
            return $this->responseWithSuccess(___('forum.Your Answer Posted successfully.')); // return success response
        } catch (\Throwable $th) {
            DB::rollBack(); // rollback database transaction
            return $this->responseWithError($th->getMessage(), [], 400); // return error response
        }
    }

    public function destroy($id)
    {
        try {
            if (env('APP_DEMO')) {
                return $this->responseWithError(___('alert.you_can_not_change_in_demo_mode'));
            }

            $target = $this->model->find(decryptFunction($id));
            $target->delete();

            return $this->responseWithSuccess(___('forum.Answer deleted successfully.')); // return success response
        } catch (\Throwable $th) {
            return $this->responseWithError($th->getMessage(), [], 400); // return error response
        }
    }

}
