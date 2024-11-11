<?php

namespace Modules\CMS\Repositories;

use App\Traits\ApiReturnFormatTrait;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\DB;
use Modules\CMS\Entities\Faq;
use Modules\CMS\Interfaces\FaqInterface;

class FaqRepository implements FaqInterface
{
    use ApiReturnFormatTrait, FileUploadTrait;

    private $model;

    public function __construct(Faq $Faq)
    {
        $this->model = $Faq;
    }

    public function model()
    {
        try {
            return $this->model;

        } catch (\Throwable $th) {

            return false;
        }

    }

    public function store($request)
    {
        DB::beginTransaction();
        try {

            if (env('APP_DEMO')) {
                return $this->responseWithError(___('alert.you_can_not_change_in_demo_mode'));
            }

            $Faq = $this->model;
            $Faq->title = $request->title;
            $Faq->content = $request->content;
            $Faq->status_id = $request->status_id;
            $Faq->save();

            if ($request->hasFile('image_id')) {
                $upload = $this->uploadFile($request->image_id, 'cms/Faqs/Faq', [], '', 'image'); // upload file and resize image 35x35
                if ($upload['status']) {
                    $Faq->image_id = $upload['upload_id'];
                } else {
                    return $this->responseWithError($upload['message'], [], 400);
                }
            }
            $Faq->save();
            DB::commit();
            return $this->responseWithSuccess(___('alert.Faq store successfully.'));
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->responseWithError($th->getMessage(), [], 400);
        }
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {

            if (env('APP_DEMO')) {
                return $this->responseWithError(___('alert.you_can_not_change_in_demo_mode'));
            }

            $Faq = $this->model->find($id);
            if (!$Faq) {
                return $this->responseWithError(___('alert.Faq_not_found'), [], 400);
            }
            $Faq->title = $request->title;
            $Faq->content = $request->content;
            $Faq->status_id = $request->status_id;
            $Faq->save();

            if ($request->hasFile('image_id')) {
                $upload = $this->uploadFile($request->image_id, 'cms/Faqs/Faq', [], @$Faq->image_id, 'image'); // upload file and resize image 35x35
                if ($upload['status']) {
                    $Faq->image_id = $upload['upload_id'];
                } else {
                    return $this->responseWithError($upload['message'], [], 400);
                }
            }
            $Faq->save();
            DB::commit();
            return $this->responseWithSuccess(___('alert.Faq updated successfully.'));
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->responseWithError($th->getMessage(), [], 400);
        }
    }

    public function destroy($id)
    {
        try {

            if (env('APP_DEMO')) {
                return $this->responseWithError(___('alert.you_can_not_change_in_demo_mode'));
            }
            
            $Faq = $this->model->find($id);
            $upload = $this->deleteFile($Faq->image_id, 'delete'); // delete file from storage
            if (!$upload['status']) {
                return $this->responseWithError($upload['message'], [], 400); // return error response
            }
            $Faq->delete();
            return $this->responseWithSuccess(___('alert.Faq deleted successfully.')); // return success response
        } catch (\Throwable $th) {
            return $this->responseWithError($th->getMessage(), [], 400); // return error response
        }
    }
}
