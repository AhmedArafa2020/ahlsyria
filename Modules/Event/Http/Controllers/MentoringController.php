<?php

namespace Modules\Event\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Event\Interfaces\MentoringInterface;
use Illuminate\Contracts\Support\Renderable;


class MentoringController extends Controller
{
    // constructor injection
    protected $mentoring;

    public function __construct(MentoringInterface $mentoring)
    {
        $this->mentoring         = $mentoring;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {

        try {

            $data['tableHeader']    = $this->mentoring->tableHeader(); // table header
            $data['mentorings']          = $this->mentoring->getAll($request); // data
            $data['title']          = ___('event.Mentoring'); // title
            return view('event::mentoring.index', compact('data')); // view
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }
    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {

        $data['title']              = ___('event.mentoring'); // title
        $data['mentoring']               = $this->mentoring->model()->find($id);
        return view('event::mentoring.show', compact('data'));
    }
}
