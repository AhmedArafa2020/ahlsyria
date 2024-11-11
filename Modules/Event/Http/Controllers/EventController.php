<?php

namespace Modules\Event\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Event\Interfaces\EventInterface;
use Illuminate\Contracts\Support\Renderable;
use Modules\Event\Http\Requests\CreateEventRequest;
use Modules\Event\Http\Requests\UpdateEventRequest;


class EventController extends Controller
{
    // constructor injection
    protected $event;

    public function __construct(EventInterface $event)
    {
        $this->event         = $event;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {

        try {

            $data['tableHeader']    = $this->event->tableHeader(); // table header
            $data['events']          = $this->event->getAll($request); // data
            $data['title']          = ___('event.Event'); // title
            return view('event::event.index', compact('data')); // view
        } catch (\Throwable $th) {
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
            $data['title']              =   ___('event.Create Event'); // title
            $data['button']             =   ___('common.create'); // button
            return view('event::event.create', compact('data'));
        } catch (\Throwable $th) {

            return redirect()->route('events.index')->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */

    public function store(CreateEventRequest $request)
    {


        // try {
        $result = $this->event->store($request);
        if ($result->original['result']) {
            return redirect()->route('events.index')->with('success', $result->original['message']);
        } else {
            return redirect()->route('events.index')->with('danger', $result->original['message']);
        }
        // } catch (\Throwable $th) {

        //     return redirect()->route('events.index')->with('danger', ___('alert.something_went_wrong_please_try_again'));
        // }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        //anas
        return view('slider::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        try {
            $data['title']              = ___('event.Edit Event'); // title
            $data['button']             = ___('common.update'); // button
            $data['event']               = $this->event->model()->find($id);
            return view('event::event.edit', compact('data'));
        } catch (\Throwable $th) {
            return redirect()->route('events.index')->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateEventRequest $request, $id)
    {
        try {
            $result = $this->event->update($request, $id);
            if ($result->original['result']) {
                return redirect()->route('events.index')->with('success', $result->original['message']);
            } else {
                return redirect()->route('events.index')->with('danger', $result->original['message']);
            }
        } catch (\Throwable $th) {
            return redirect()->route('events.index')->with('danger', ___('alert.something_went_wrong_please_try_again'));
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
            $result = $this->event->destroy($id);
            if ($result->original['result']) {
                return redirect()->route('events.index')->with('success', $result->original['message']);
            } else {
                return redirect()->route('events.index')->with('danger', $result->original['message']);
            }
        } catch (\Throwable $th) {
            return redirect()->route('events.index')->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }
}
