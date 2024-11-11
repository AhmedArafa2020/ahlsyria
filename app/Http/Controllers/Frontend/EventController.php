<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Http\Request;
use Modules\Event\Interfaces\EventInterface;
use Modules\Student\Entities\Student;

class EventController extends Controller
{
    use ApiReturnFormatTrait;

    public function __construct() {}
    public function index(Request $request, EventInterface $eventRepo)
    {

        $data['title'] = ___('frontend.Events');
        $data['events']     = $eventRepo->getEvents(!empty($request->q) ? $request->q : null);

        return view('frontend.event.index', compact('data'));
    }

    public function interest($id)
    {
        $event = \Modules\Event\Entities\Event::where('id', intval($id))
            ->active()
            ->exists();
        if ($event) {
            // the user must be a student
            if (!Student::where('user_id', auth()->user()->id)->exists()) {
                return $this->responseWithError('طلب غير مصرح به');
            }
            auth()->user()->events()->sync([$id], false);
            return $this->responseWithSuccess('تم تسجيل اهتمامك');
        } else {
            return $this->responseWithError('طلب غير موجود');
        }
    }

    public function readAllNotifications()
    {

        auth()->user()
            ->unreadNotifications()
            ->update(['read_at' => now()]);

        return $this->responseWithSuccess('done');
    }
    public function show($slug)
    {
        $data['event'] = \Modules\Event\Entities\Event::where('slug', $slug)->active()->first();
        if ($data['event']) {
            $data['title'] = $data['event']->title;
            return view('frontend.event.show', compact('data'));
        } else {
            return redirect()->back()->with('danger', ___('alert.Page_not_found'));
        }
    }
}
