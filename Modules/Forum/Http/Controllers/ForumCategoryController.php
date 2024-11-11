<?php

namespace Modules\Forum\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\CommonHelperTrait;
use Illuminate\Routing\Controller;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Contracts\Support\Renderable;
use Modules\Forum\Interfaces\ForumCategoryInterface;
use Modules\Forum\Http\Requests\CreateForumCategoryRequest;
use Modules\Forum\Http\Requests\UpdateForumCategoryRequest;

class ForumCategoryController extends Controller
{
    use ApiReturnFormatTrait, CommonHelperTrait;
    // constructor injection
    protected $forumCategory;

    public function __construct(ForumCategoryInterface $forumCategory)
    {
        $this->forumCategory = $forumCategory;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        try {
            $data['tableHeader'] = $this->forumCategory->tableHeader(); // table header
            $data['categories'] = $this->forumCategory->model()->search($request->search)->paginate($request->show ?? 10); // data
            $data['title'] = ___('forum.Forum Category'); // title

            if ($data['categories']) {
                return view('forum::backend.forum_category.index', compact('data')); // view
            }

            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }

        catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        try {
            $data['url'] = route('forum.category.store'); // url
            $data['title'] = ___('forum.Create Category');
            @$data['button'] = ___('forum.Add'); // button
            $html = view('forum::backend.modal.category.create', compact('data'))->render(); // render view
            return $this->responseWithSuccess(___('alert.data_retrieve_success'), $html); // return success response
        } catch (\Throwable $th) {
            return $this->responseWithError(___('alert.something_went_wrong_please_try_again'), [], 400); // return error response
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateForumCategoryRequest $request)
    {
        try {
            $result = $this->forumCategory->store($request);
            if ($result->original['result']) {
                return $this->responseWithSuccess($result->original['message']); // return success response
            } else {
                return $this->responseWithError($result->original['message'], [], 400); // return error response
            }
        } catch (\Throwable $th) {
            return redirect()->route('forum.index')->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        try {
            $data['category'] = $this->forumCategory->model()->where('id', $id)->first();
            if (@$data['category']) {
                $data['url'] = route('forum.category.update', $id); // url
                $data['title'] = ___('forum.Edit Category'); // title
                @$data['button'] = ___('forum.Update'); // button

                $html = view('forum::backend.modal.category.update', compact('data'))->render(); // render view
                return $this->responseWithSuccess(___('alert.data_retrieve_success'), $html); // return success response
            } else {
                return $this->responseWithError(___('forum.Question Not Found'), [], 400); // return error response
            }
        } catch (\Throwable $th) {
            return $this->responseWithError(___('alert.something_went_wrong_please_try_again'), [], 400); // return error response
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateForumCategoryRequest $request, $id)
    {
        try {
            $result = $this->forumCategory->update($request, $id);
            if ($result->original['result']) {
                return $this->responseWithSuccess($result->original['message']); // return success response
            } else {
                return $this->responseWithError($result->original['message'], [], 400); // return error response
            }
        } catch (\Throwable $th) {
            return $this->responseWithError(___('alert.something_went_wrong_please_try_again'), [], 400); // return error response
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try {
            $result = $this->forumCategory->destroy($id);
            if ($result->original['result']) {
                return redirect()->route('forum.category.index')->with('success', $result->original['message']);
            } else {
                return redirect()->route('forum.category.index')->with('danger', $result->original['message']);
            }
        } catch (\Throwable $th) {
            return redirect()->route('forum.category.index')->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }
}
