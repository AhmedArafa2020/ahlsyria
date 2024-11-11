<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ApiReturnFormatTrait;
use App\Traits\CommonHelperTrait;
use Illuminate\Support\Facades\Auth;
use Modules\Course\Http\Requests\AssignmentSubmitRequest;
use Modules\Course\Interfaces\AssignmentSubmitInterface;
use Modules\Order\Interfaces\EnrollInterface;
use App\Models\SiteNote;
use App\Mail\SiteNoteMail;
use Mail;

class SiteNoteController extends Controller
{
    use ApiReturnFormatTrait, CommonHelperTrait;

    public function store(){
        $note = new SiteNote();
        $note->note = request('note');
        $note->save();
        $data['redirect_url'] = route('home');
        //Mail::to('info@sygeeks.net')->send(new SiteNoteMail($note->note));
        return $this->responseWithSuccess('شكرا لتقديم ملاحظاتك ', $data);
    }
}