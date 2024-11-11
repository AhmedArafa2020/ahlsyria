<?php

namespace Modules\CMS\Http\Controllers;

use App\Traits\ApiReturnFormatTrait;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CMS\Http\Requests\FaqRequest;
use Modules\CMS\Http\Requests\UpdateFaqRequest;
use Modules\CMS\Interfaces\FaqInterface;

class FaqController extends Controller
{
    use ApiReturnFormatTrait;

    protected $faq;

    public function __construct(FaqInterface $faqInterface)
    {
        $this->faq = $faqInterface;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        try {
            $data['faqs'] = $this->faq->model()->search($request)->paginate($request->show ?? 10); // data
            $data['title'] = ___('common.Faq List'); // title
            return view('cms::faq.index', compact('data')); // view
        } catch (\Throwable $th) {
            throw $th;
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
            $data['title'] = ___('common.Create Faq'); // title
            $data['button'] = ___('common.Create'); // button
            return view('cms::faq.create', compact('data')); // view
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(FaqRequest $request)
    {
        try {
            $result = $this->faq->store($request);
            if ($result->original['result']) {
                return redirect()->route('admin.faq.index')->with('success', $result->original['message']);
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
        try {
            $data['faq'] = $this->faq->model()->findOrFail($id);
            if (!$data['faq']) {
                return redirect()->back()->with('danger', ___('alert.faq_not_found'));
            }
            $data['title'] = ___('common.Edit faq'); // title
            $data['button'] = ___('common.Update'); // button
            return view('cms::faq.edit', compact('data')); // view
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateFaqRequest $request, $id)
    {
        try {
            $result = $this->faq->update($request, $id);
            if ($result->original['result']) {
                return redirect()->route('admin.faq.index')->with('success', $result->original['message']);
            } else {
                return redirect()->back()->with('danger', $result->original['message']);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', ___('alert.something_went_wrong_please_try_again'));
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
            $result = $this->faq->destroy($id);
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
