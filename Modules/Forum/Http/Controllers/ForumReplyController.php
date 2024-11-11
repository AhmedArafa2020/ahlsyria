<?php

namespace Modules\Forum\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\CommonHelperTrait;
use Illuminate\Routing\Controller;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Contracts\Support\Renderable;
use Modules\Forum\Interfaces\ForumReplyInterface;
use Modules\Forum\Interfaces\ForumAnswerInterface;
use Modules\Forum\Interfaces\ForumCategoryInterface;
use Modules\Forum\Interfaces\ForumQuestionInterface;
use Modules\Forum\Http\Requests\CreateForumCommentRequest;

class ForumReplyController extends Controller
{
    use ApiReturnFormatTrait, CommonHelperTrait;

    public $forumQuestion;
    public $forumQuestionCategory;
    public $forumAnswer;

    public function __construct(
        ForumCategoryInterface $forumCategoryRepository,
        ForumQuestionInterface $forumQuestionRepository,
        ForumAnswerInterface $forumAnswerRepository,
        ForumReplyInterface $forumReplyRepository)
    {
        $this->forumQuestion                = $forumQuestionRepository;
        $this->forumQuestionCategory        = $forumCategoryRepository;
        $this->forumAnswer                  = $forumAnswerRepository;
        $this->forumReply                   = $forumReplyRepository;
    }

    /**
    * Show the form for creating a new resource.
    * @return Renderable
    */
    public function create($id)
    {
        try {
            $data['url'] = route('forum.comment.store', $id); // url
            $data['title'] = ___('forum.Add Comment');
            @$data['button'] = ___('forum.Post'); // button
            $html = view('forum::frontend.modal.comment.create', compact('data'))->render(); // render view
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
    public function store(CreateForumCommentRequest $request, $id)
    {
        try {
            $result = $this->forumReply->store($request, $id);
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
        return view('forum::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try {
            $result = $this->forumReply->destroy($id);
            if ($result->original['result']) {
                return redirect()->back()->with('success', $result->original['message']);
            } else {
                return redirect()->back()->with('danger', $result->original['message']);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    public function allReply($id)
    {
        try {
            $data['url'] = route('forum.comment.store', $id); // url
            $data['replies'] = $this->forumReply->model()->where('forum_answer_id', $id)->where('status_id', 1)->get();
            $data['title'] = ___('forum.Add Comment');

            $html = view('forum::frontend.modal.comment.view', compact('data'))->render(); // render view
            return $this->responseWithSuccess(___('alert.data_retrieve_success'), $html); // return success response
        } catch (\Throwable $th) {
            return $this->responseWithError(___('alert.something_went_wrong_please_try_again'), [], 400); // return error response
        }
    }

}
