<?php

namespace Modules\Forum\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiReturnFormatTrait;
use Modules\Forum\Entities\ForumCategory;
use Modules\Forum\Entities\ForumQuestion;
use Illuminate\Contracts\Support\Renderable;
use Modules\Forum\Interfaces\ForumAnswerInterface;
use Modules\Forum\Interfaces\ForumCategoryInterface;
use Modules\Forum\Interfaces\ForumQuestionInterface;
use Modules\Forum\Http\Requests\CreateForumQuestionRequest;
use Modules\Forum\Http\Requests\UpdateForumQuestionRequest;
use App\Models\User;
class ForumQuestionController extends Controller
{

  use ApiReturnFormatTrait;

  public $forumQuestion;
  public $forumCategory;
  public $forumAnswer;

  public function __construct(
    ForumCategoryInterface $forumCategoryRepository,
    ForumQuestionInterface $forumQuestionRepository,
    ForumAnswerInterface $forumAnswerRepository
  ) {
    $this->forumQuestion = $forumQuestionRepository;
    $this->forumCategory = $forumCategoryRepository;
    $this->forumAnswer = $forumAnswerRepository;
  }
  /**
   * Display a listing of the resource.
   * @return Renderable
   */
  public function index(Request $request)
  {
    try {
      $queryBuilder = $this->forumQuestion->model()->where('status_id', 1);
      // Search
      if ($request->has('query')) {
        $query = $request->input('query');

        $queryBuilder = $queryBuilder->where(function ($queryBuilder) use ($query) {
          $queryBuilder->where('title', 'LIKE', "%{$query}%")
            ->orWhere('question', 'LIKE', "%{$query}%");
        });

        $data['query'] = $request->input('query');
      } else {
        $queryBuilder = $queryBuilder->latest();
      }
      $user = auth()->user();
      if ($user != null && $user->student != null) {
        $queryBuilder = $queryBuilder->whereHas('category', function ($cat_query) use ($user) {
          $cat_query->whereNull('filters')
            ->orWhere(function ($query) use ($user) {
              $country = str_replace(' ', '_', strtolower($user->country));
              $state = str_replace(' ', '_', strtolower($user->state));
              $work_field = str_replace(' ', '_', strtolower($user->work_field));
              $query->whereJsonContains('filters', "gender_$user->gender")
                ->orWhereJsonContains('filters', "state_$state")
                ->orWhereJsonContains('filters', "country_$country")
                ->orWhereJsonContains('filters', "work_field_$work_field");
            });
        });
        $queryBuilder = $queryBuilder->whereHas('category', function ($cat_query) use ($user) {
          $cat_query->whereHas('allowedUsers', function ($userQuery) use ($user) {
            $userQuery->where('users.id', $user->id);
          });
        });
      }

      $data['title'] = ___('forum.Forum'); // title
      $data['questions'] = $queryBuilder->paginate(15); // title
      $data['categories'] = $this->forumCategory->getActive();
      // $data['featured_questions'] = $this->forumQuestion->featured();

      $data['forum_category'] = $this->forumCategory->model()->get();
      $data['featured_questions'] = $this->forumQuestion->model();
      if ($user != null && $user->student != null) {
        $data['featured_questions'] = $data['featured_questions']->whereHas('category', function ($cat_query) use ($user) {
          $cat_query->whereHas('allowedUsers', function ($userQuery) use ($user) {
            $userQuery->where('users.id', $user->id);
          });
        });
      }
      $data['featured_questions'] = $data['featured_questions']->get();

      $data['html'] = view('forum::components.indexdata', compact('data'))->render();

      return view('forum::frontend.index', compact('data'));
    } catch (\Throwable $th) {
      throw $th;
      return redirect()->route('home')->with('danger', ___('alert.something_went_wrong_please_try_again'));
    }
  }

  public function index_course(Request $request)
  {
    try {
      $forum_category_id = ForumCategory::where('slug', $request->slug)->first()->id ?? -1;
      $queryBuilder = $this->forumQuestion->model()->where('status_id', 1)->where('forum_category_id', $forum_category_id);
      // Search
      if ($request->has('query')) {
        $query = $request->input('query');

        $queryBuilder = $queryBuilder->where(function ($queryBuilder) use ($query) {
          $queryBuilder->where('title', 'LIKE', "%{$query}%")
            ->orWhere('question', 'LIKE', "%{$query}%");
        });

        $data['query'] = $request->input('query');
      } else {
        $queryBuilder = $queryBuilder->latest();
      }

      $user = auth()->user();
      if ($user != null && $user->student != null) {
        $queryBuilder = $queryBuilder->whereHas('category', function ($cat_query) use ($user) {
          $cat_query->whereHas('allowedUsers', function ($userQuery) use ($user) {
            $userQuery->where('users.id', $user->id);
          });
        });
      }

      $data['title'] = ___('forum.Forum'); // title
      $data['questions'] = $queryBuilder->paginate(5); // title
      $data['categories'] = $this->forumCategory->getActive();
      $data['featured_questions'] = $this->forumQuestion->featured();

      $data['html'] = view('forum::components.indexdata', compact('data'))->render();

      return view('forum::frontend.index_course', compact('data'));
    } catch (\Throwable $th) {
      return redirect()->route('home')->with('danger', ___('alert.something_went_wrong_please_try_again'));
    }
  }

  public function details($slug)
  {
    try {
      $queryBuilder = $this->forumQuestion->model()->where('status_id', 1);

      $data['title'] = 'مناقشات'; // title
      $data['question'] = $this->forumQuestion->model()->where('slug', $slug)->with('user')->first();
      // dd($this->forumQuestion->model()->get());
      if ($data['question']->status_id == 2) {
        return redirect()->back()->with('danger', ___('forum.This Question is Unpublished'));
      }
      $data['answers'] = $this->forumAnswer->model()->with('reply', 'user')->where('forum_question_id', $data['question']->id)->latest()->where('status_id', 1)->paginate(20);
      // $data['featured_questions'] = $this->forumQuestion->featured();
      //  $data['featured_questions']     = $this->forumQuestion->model()->where('slug', '!=', $slug)->get();

      $data['forum_category'] = $this->forumCategory->model()->get();
      $data['featured_questions'] = $queryBuilder->where('is_featured', 11)->where('status_id', 1)->latest()->take(10)->get();
      $data['featured_users'] = $queryBuilder->where('status_id', 1)->latest()->take(10)->get();
      return view('forum::frontend.details', compact('data'));
    } catch (\Throwable $th) {
      return redirect()->route('home')->with('danger', ___('alert.something_went_wrong_please_try_again'));
    }
  }

  /**
   * Show the form for creating a new resource.
   * @return Renderable
   */
  public function create()
  {
    try {
      $data['url'] = route('forum.store'); // url
      $data['title'] = ___('forum.Create Question');
      $data['course_create'] = false;
      $data['categories'] = $this->forumCategory->getActive();
      @$data['button'] = ___('forum.Post Question'); // button
      $html = view('forum::frontend.modal.question.create', compact('data'))->render(); // render view
      return $this->responseWithSuccess(___('alert.data_retrieve_success'), $html); // return success response
    } catch (\Throwable $th) {
      return $this->responseWithError(___('alert.something_went_wrong_please_try_again'), [], 400); // return error response
    }
  }

  public function create_course($slug)
  {
    try {
      $data['url'] = route('forum.store'); // url
      $data['title'] = ___('forum.Create Question');
      $data['categories'] = $this->forumCategory->getCourse($slug);
      $data['course_create'] = true;
      @$data['button'] = ___('forum.Post Question'); // button
      $html = view('forum::frontend.modal.question.create', compact('data'))->render(); // render view
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
  public function store(CreateForumQuestionRequest $request)
  {
    try {
      $result = $this->forumQuestion->store($request);
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
      $data['question'] = $this->forumQuestion->model()->where('id', decryptFunction($id))->first();
      if (@$data['question']) {
        $data['url'] = route('forum.update', $id); // url
        $data['title'] = ___('forum.Edit Question'); // title
        $data['categories'] = $this->forumCategory->getActive();
        @$data['button'] = ___('forum.Update Question'); // button

        $html = view('forum::frontend.modal.question.update', compact('data'))->render(); // render view
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
  public function update(UpdateForumQuestionRequest $request, $id)
  {
    try {
      $result = $this->forumQuestion->update($request, $id);
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
      $result = $this->forumQuestion->destroy($id);
      if ($result->original['result']) {
        return redirect()->route('forum.index')->with('success', $result->original['message']);
      } else {
        return redirect()->back()->with('danger', $result->original['message']);
      }
    } catch (\Throwable $th) {
      return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
    }
  }

  // Ajax Search
  public function searchQuery(Request $request)
  {
    try {
      $query = $request->input('query');
      $category_filter = $request->input('category_filter');

      $queryBuilder = $this->forumQuestion->model()->where(function ($queryBuilder) use ($query) {
        $queryBuilder->where('title', 'LIKE', "%{$query}%")
          ->orWhere('question', 'LIKE', "%{$query}%");
      });

      if (!empty($category_filter)) {
        $queryBuilder->where(function ($queryBuilder) use ($category_filter) {
          $queryBuilder->whereIn('forum_category_id', $category_filter);
        });
      }


      //If you log in as a student, no Forums will appear, so I suspended them.
      /*
          $user = auth()->user();

          if ($user != null && $user->student != null) {
            $queryBuilder = $queryBuilder->whereHas('category', function ($cat_query) use ($user) {
              $cat_query->whereHas('allowedUsers', function ($userQuery) use ($user) {
                $userQuery->where('users.id', $user->id);
              });
            });
          }
    */
      $data['questions'] = $queryBuilder->where('status_id', 1)->paginate(15);
      $html = view('forum::components.indexdata', compact('data'))->render();
      $content = [
        'content' => $html,
      ];
      return $this->responseWithSuccess(___('alert.data_retrieve_success'), $content); // return success response from ApiReturnFormatTrait
    } catch (\Throwable $th) {
      return $this->responseWithError(___('alert.something_went_wrong_please_try_again'));
    }
  }

  public function manage(Request $request)
  {
    try {
      $data['tableHeader'] = $this->forumQuestion->tableHeader(); // table header
      $data['title'] = ___('frontend.Forum Questions Manage'); // title
      $data['forum_questions'] = $this->forumQuestion->model()->with('category')->filter($request)->paginate($request->show ?? 10);

      return view('forum::backend.questions.index', compact('data'));
    } catch (\Throwable $th) {
      return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
    }
  }

  public function swipeFeatured($id)
  {
    try {
      $result = $this->forumQuestion->swipeFeatured($id);

      if ($result->original['result']) {
        return redirect()->back()->with('success', $result->original['message']);
      } else {
        return redirect()->back()->with('danger', $result->original['message']);
      }
    } catch (\Throwable $th) {
      return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
    }
  }

  public function swipeActive($id)
  {
    try {
      $result = $this->forumQuestion->swipeActive($id);

      if ($result->original['result']) {
        return redirect()->back()->with('success', $result->original['message']);
      } else {
        return redirect()->back()->with('danger', $result->original['message']);
      }
    } catch (\Throwable $th) {
      return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
    }
  }



  // Creator list
  public function creatorFilter(Request $req)
  {
    Log::info($req);
    return $this->forumQuestion->where(['status' => 1])->where('name', 'LIKE', "%$req->term%")->select('id', 'name as text')->take(10)->get();
  }

  // instructor list
  public function categoryFilter(Request $req)
  {
    return User::whereNotIn('role_id', ['4'])->where(['status' => 1])->where('name', 'LIKE', "%$req->term%")->select('id', 'name as text')->take(10)->get();
  }
}
