<?php


namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ApiReturnFormatTrait;
use App\Http\Requests\frontend\student\MentoringCreateRequest;
use Modules\Event\Entities\Mentoring;
use Modules\Event\Notifications\NewMentoringRequest;
use Illuminate\Http\Request;

class MentoringController extends Controller
{
    use ApiReturnFormatTrait;

    public function addMentoringRequest(MentoringCreateRequest $request)
    {

        $mentoring                    =   new Mentoring();
        $mentoring->title             =   $request->title;
        $mentoring->phone             =   $request->phone;
        $mentoring->content           =   $request->content;
        $mentoring->mentor_id     =   $request->mentor_id;
        $mentoring->mentoring_date =   $request->mentoring_date;
        $mentoring->user_id           =   auth()->id();
        $mentoring->reference         =   \Str::uuid();

        if ($mentoring->save()) {
            // send email for the mentor
            $mentoring->mentor->notify(new NewMentoringRequest($mentoring));
            return $this->responseWithSuccess('تم تسجيل الطلب', ['id' => $mentoring->id]);
        }

        return $this->responseWithError('error', [], 400); // return error response

    }


    public function verify(Request $request, $reference)
    {

        // try {
        $reference = decrypt($reference);

        $mentoring = Mentoring::query()
            ->where('reviews', 0)
            ->with('user')
            ->firstWhere('reference', $reference);

        $res = $request->get('res');
        $userId = $request->get('u_id');

        if ($mentoring && $mentoring->user_id == $userId) {
            if ($res === 'yes') {
                $mentoring->increment('reviews', 1);
                $mentoring->mentor->increment('total_reviews', 1);
            }

            return redirect()->route('home')->with('success', 'تم نسجيل العملية بنجاح');
        } else {
            return redirect()->route('home')->with('danger', 'عملية غير صحيحة');
        }
        // } catch (\Throwable $th) {
        //     return back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        // }
    }
}
