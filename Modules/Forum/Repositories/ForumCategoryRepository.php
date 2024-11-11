<?php

namespace Modules\Forum\Repositories;

use Illuminate\Support\Str;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Support\Facades\Cache;
use Modules\Forum\Entities\ForumCategory;
use Modules\Forum\Interfaces\ForumCategoryInterface;
use Modules\Course\Entities\Course;

class ForumCategoryRepository implements ForumCategoryInterface
{
    use ApiReturnFormatTrait, FileUploadTrait;

    private $model;

    public function __construct(ForumCategory $forumCategoryModel)
    {
        $this->model = $forumCategoryModel;
    }

    public function all()
    {
        try {
            return $this->model->get();
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function tableHeader()
    {

        return [
            ___('common.ID'),
            ___('common.Title'),
            ___('ui_element.status'),
            ___('ui_element.created_at'),
            ___('ui_element.action'),
        ];
    }

    public function model()
    {
        try {
            return $this->model;
        } catch (\Throwable $th) {
            return false;
        }

    }

    public function getActive()
    {
        try {
            $questionCategories = $this->model->where('status_id', 1); // get all home section
            $user = auth()->user();
            if($user != null && $user->student != null){
                // $questionCategories = $questionCategories->whereNull('filters');
                //     $work_field = str_replace(' ', '_', strtolower($user->work_field));
                // $questionCategories = $questionCategories->orWhereJsonContains('filters',"work_field_$work_field");
                $questionCategories = $questionCategories->whereNull('filters')
                ->orWhere(function($query) use ($user){
                    $country = str_replace(' ', '_', strtolower($user->country));
                    $state = str_replace(' ', '_', strtolower($user->state));
                    $work_field = str_replace(' ', '_', strtolower($user->work_field));
                    $query->whereJsonContains('filters',"gender_$user->gender")
                        ->orWhereJsonContains('filters',"state_$state")
                        ->orWhereJsonContains('filters',"country_$country")
                        ->orWhereJsonContains('filters',"work_field_$work_field");
                });
            }
            return $questionCategories->get();

        } catch (\Throwable $th) {
            return false;
        }

    }

    public function getCourse($slug)
    {
        try {
            $category = $this->model->where('slug',$slug)->first();
            if($category != null){
                return $category;
            }
            else{
                $course = Course::where('slug',$slug)->first();
                $target = new $this->model; // create new object of model for store data in database table
                $target->title = $course->title;
                $target->is_course = 1;
                $target->slug = $slug;
                $target->status_id = 1;
                $target->created_by = auth()->id();
                $target->save();
                return $target;
            }

        } catch (\Throwable $th) {
            return false;
        }

    }

    public function filter($filter = null)
    {
        $model = $this->model;
        if (@$filter) {
            $model = $this->model->where($filter);
        }
        return $model;
    }

    public function store($request)
    {

        if (env('APP_DEMO')) {
            return $this->responseWithError(___('alert.you_can_not_change_in_demo_mode'));
        }

        DB::beginTransaction(); // start database transaction
        try {
            $target = new $this->model; // create new object of model for store data in database table
            $target->title = $request->title;
            $target->slug = Str::slug($request->title) . '-' . Str::random(8);
            $target->status_id = $request->status_id;
            $target->created_by = auth()->id();
            if($request->filters != null){
                $target->filters = $request->filters;
            }
            $target->save(); // save data in database table
            DB::commit(); // commit database transaction
            return $this->responseWithSuccess(___('forum.Forum category created successfully.')); // return success response
        } catch (\Throwable $th) {
            DB::rollBack(); // rollback database transaction
            return $this->responseWithError($th->getMessage(), [], 400); // return error response
        }
    }

    public function show($id)
    {
        try {
            return $this->model->find($id);
        } catch (\Throwable $th) {
            return false;
        }

    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {

            if (env('APP_DEMO')) {
                return $this->responseWithError(___('alert.you_can_not_change_in_demo_mode'));
            }

            $target = $this->model->find($id);
            if (!$target) {
                return $this->responseWithError(___('forum.Forum category not found.'), [], 400);
            }
            $target->title = $request->title;
            if ($request->title != $target->title) {
                $target->slug = Str::slug($request->title) . '-' . Str::random(8);
            }
            if($request->filters != null){
                $target->filters = $request->filters;
            }
            $target->status_id = $request->status_id;
            $target->created_by = auth()->id();
            $target->save();
            DB::commit();
            return $this->responseWithSuccess(___('forum.Forum category updated successfully.'));
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->responseWithError($th->getMessage(), [], 400);
        }
    }

    public function destroy($id)
    {
        try {

            if (env('APP_DEMO')) {
                return $this->responseWithError(___('alert.you_can_not_change_in_demo_mode'));
            }

            $target = $this->model->find($id);
            $target->delete();
            return $this->responseWithSuccess(___('forum.Forum category deleted successfully.')); // return success response
        } catch (\Throwable $th) {
            return $this->responseWithError($th->getMessage(), [], 400); // return error response
        }
    }

    public function catArr()
    {
        try {
            return $this->model->where('status_id', 1)->orderBy('id', 'desc')->pluck('title', 'id')->toArray();
        } catch (\Throwable $th) {
            return false;
        }

    }
}
