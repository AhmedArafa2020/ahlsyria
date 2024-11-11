<?php

namespace Modules\Forum\Repositories;

use Illuminate\Support\Str;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Support\Facades\Auth;
use Modules\Forum\Entities\ForumReply;
use Modules\Forum\Entities\ForumQuestion;
use Modules\Forum\Interfaces\ForumReplyInterface;

class ForumReplyRepository implements ForumReplyInterface
{
    use ApiReturnFormatTrait, FileUploadTrait;

    private $model;

    public function __construct(ForumReply $forumReply)
    {
        $this->model = $forumReply;
    }

    public function model()
    {
        try {
            return $this->model;

        } catch (\Throwable $th) {
            return false;
        }
    }

    public function store($request, $id)
    {
        DB::beginTransaction(); // start database transaction
        try {
            if (env('APP_DEMO')) {
                return $this->responseWithError(___('alert.you_can_not_change_in_demo_mode'));
            }

            $target = new $this->model; // create new object of model for store data in database table
            $target->forum_answer_id = $id;
            $target->comment = $request->comment;
            $target->created_by = Auth::id();
            $target->status_id = 1;
            $target->save(); // save data in database table

            DB::commit(); // commit database transaction
            return $this->responseWithSuccess(___('forum.Comment created successfully.')); // return success response
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

            return $this->responseWithSuccess(___('forum.Comment deleted successfully.')); // return success response
        } catch (\Throwable $th) {
            return $this->responseWithError($th->getMessage(), [], 400); // return error response
        }
    }

}
