<?php

namespace Modules\Forum\Repositories;

use Illuminate\Support\Str;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Support\Facades\Auth;
use Modules\Forum\Entities\ForumQuestion;
use Modules\Forum\Interfaces\ForumQuestionInterface;
use Modules\Forum\Entities\ForumAnswer;

class ForumQuestionRepository implements ForumQuestionInterface
{
    use ApiReturnFormatTrait, FileUploadTrait;

    private $model;

    public function __construct(ForumQuestion $forumQuestion)
    {
        $this->model = $forumQuestion;
    }

    public function model()
    {
        try {
            return $this->model;

        } catch (\Throwable $th) {
            return false;
        }
    }

    public function featured()
    {
        try {
            return $this->model->where('is_featured', 11)->where('status_id', 1)->latest()->take(10)->get();

        } catch (\Throwable $th) {
            return false;
        }
    }

    public function index($request)
    {
        try {
            $queryBuilder = $this->model;
            // Search
            if($request->has('query')){
                $query = $request->input('query');

                $queryBuilder = $queryBuilder->where(function ($queryBuilder) use ($query) {
                    $queryBuilder->where('title', 'LIKE', "%{$query}%")
                        ->orWhere('question', 'LIKE', "%{$query}%");
                });

                $data['query'] = $request->input('query');
            }else{
                $queryBuilder = $queryBuilder->latest();
            }
            $user = auth()->user();
            if($user != null && $user->student != null){
                $queryBuilder = $queryBuilder->whereHas('category',function($cat_query) use ($user){
                    $cat_query->whereHas('allowedUsers', function($userQuery) use ($user) {
                        $userQuery->where('users.id', $user->id);
                    });
                });
            }

            $data['title'] = ___('forum.Forum'); // title
            $data['questions'] = $queryBuilder->paginate(5); // title
            $data['categories'] = $this->forumQuestionCategory->model()->get();
            $data['featured_questions'] = $queryBuilder->where('is_featured', 11)->where('status_id', 1)->latest()->take(10)->get();

            $data['html'] = view('forum::components.indexdata', compact('data'))->render();

            return $this->responseWithSuccess(___('forum.Forum Question created successfully.'), $data); // return success response
        } catch (\Throwable $th) {

            return $this->responseWithError($th->getMessage(), [], 400); // return error response
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
            $target->title = $request->title;
            $target->slug = Str::slug($request->title);
            $target->question = $request->question;
            $target->forum_category_id = $request->category;
            $target->created_by = Auth::id();
            $target->status_id = 1;
            $target->is_featured = 10;
            $target->save(); // save data in database table

            DB::commit(); // commit database transaction
            return $this->responseWithSuccess(___('forum.Forum Question created successfully.')); // return success response
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack(); // rollback database transaction
            return $this->responseWithError($th->getMessage(), [], 400); // return error response
        }
    }

    public function update($request, $id)
    {
        DB::beginTransaction(); // start database transaction
        try {
            $target = $this->model()->find(decryptFunction($id));
            if (!$target) {
                return $this->responseWithError(___('forum.Question not found'), [], 400); // return error response
            }
            $target->forum_category_id = $request->category;
            $target->title = $request->title;
            $target->question = $request->question;
            $target->slug = Str::slug($request->title);
            $target->update();
            DB::commit(); // commit database transaction
            return $this->responseWithSuccess(___('forum.Question updated successfully.'), $target->slug); // return success response
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

            return $this->responseWithSuccess(___('forum.Forum Question deleted successfully.')); // return success response
        } catch (\Throwable $th) {
            return $this->responseWithError($th->getMessage(), [], 400); // return error response
        }
    }

    // Admin

    public function tableHeader()
    {

        return [
            ___('forum.ID'),
            ___('forum.Title'),
            ___('forum.Category'),
            ___('forum.Created By'),
            ___('forum.Answers'),
            ___('forum.Comments'),
            ___('forum.Featured'),
            ___('forum.Status'),
            ___('forum.Action'),
        ];
    }

    public function params($params = null)
    {
        $category = $params->category ?? null;
        $creator = $params->created_by ?? null;
        $status = $params->status ?? null;
        $search = $params->search ?? null;
        return [
            'category' => $this->courseCategoryModel->active()->where('forum_category_id', $category)->first()->title ?? null,
            'creator' => $this->userModel->where('created_by', $instructor)->first()->name ?? null,
            'status' => $this->userModel->where('status_id', $status)->first()->name ?? null,
            'search' => $search,
        ];
    }

    public function filter($filter = null)
    {
        $model = $this->model;
        if (@$filter) {
            $model = $this->model->where($filter);
        }
        return $model;
    }

    public function getQuestions($request)
    {
        try {
            return $this->model->query()->latest()->filter($request)->search($request->search)->paginate($request->show ?? 10);
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function swipeFeatured($id)
    {
        try {
            $target = $this->model->find(decryptFunction($id));
            if($target->is_featured == 10){
                $target->is_featured = 11;
                $response = $this->responseWithSuccess(___('forum.Featured Question added successfully.')); // return success response
            }else{
                $target->is_featured = 10;
                $response = $this->responseWithSuccess(___('forum.Featured Question removed successfully.')); // return success response
            }
            $target->update();
            return $response;
        } catch (\Throwable $th) {
            return $this->responseWithError($th->getMessage(), [], 400); // return error response
        }
    }

    public function swipeActive($id)
    {
        try {
            $target = $this->model->find(decryptFunction($id));
            if($target->status_id == 1){
                $target->status_id = 2;
                $response = $this->responseWithSuccess(___('forum.Question inactive successfully.')); // return success response
            }else{
                $target->status_id = 1;
                $response = $this->responseWithSuccess(___('forum.Question active successfully.')); // return success response
            }
            $target->update();
            return $response;
        } catch (\Throwable $th) {
            return $this->responseWithError($th->getMessage(), [], 400); // return error response
        }
    }

    public function answers($id){
        try {
            return ForumAnswer::where('forum_questions_id', decryptFunction($id))->active()->get();
        } catch (\Throwable $th) {
            return false;
        }
    }

}
