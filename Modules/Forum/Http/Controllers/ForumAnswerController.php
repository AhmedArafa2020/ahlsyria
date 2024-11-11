<?php

namespace Modules\Forum\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Forum\Interfaces\ForumAnswerInterface;
use Modules\Forum\Http\Requests\ForumAnswerPostRequest;

class ForumAnswerController extends Controller
{

    public $forumAnswer;

    public function __construct(ForumAnswerInterface $forumAnswerRepository)
    {
        $this->forumAnswer = $forumAnswerRepository;
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ForumAnswerPostRequest $request)
    {
        try {
            $result = $this->forumAnswer->store($request);
            if ($result->original['result']) {
                return redirect()->back()->with('success', $result->original['message']);
            } else {
                return redirect()->back()->with('danger', $result->original['message']);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
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
            $result = $this->forumAnswer->destroy($id);
            if ($result->original['result']) {
                return redirect()->back()->with('success', $result->original['message']);
            } else {
                return redirect()->back()->with('danger', $result->original['message']);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }
}
