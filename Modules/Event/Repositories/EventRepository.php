<?php

namespace Modules\Event\Repositories;

use App\Enums\OrderBy;
use App\Traits\ApiReturnFormatTrait;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Event\Entities\Event;
use Modules\Event\Interfaces\EventInterface;

class EventRepository implements EventInterface
{
    use ApiReturnFormatTrait, FileUploadTrait;

    private $model;

    public function __construct(Event $eventModel)
    {
        $this->model = $eventModel;
    }

    public function getAll($request)
    {
        try {
            $data = $this->model->query();

            $data = $this->filter($request, $data);

            $data = $data->orderBy('id', 'desc')->paginate($request->show ?? 10);

            return $data;
        } catch (\Throwable $th) {

            return false;
        }
    }

    public function filter($request, $data)
    {

        if (!empty($request->search)) {
            $search = $request->search;
            $data = $data->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        return $data;
    }

    public function tableHeader()
    {

        return [
            ___('common.ID'),
            ___('common.Title'),
            ___('common.Slug'),
            ___('ui_element.status'),
            ___('ui_element.created_at'),
            ___('ui_element.action'),
        ];
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

        DB::beginTransaction(); // start database transaction

        try {

            $target = new $this->model; // create new object of model for store data in database table
            $target->title = $request->title;
            $target->slug = Str::slug($request->title);
            $target->status = $request->status;
            $target->address = $request->address;
            $target->start_date = $request->start_date;
            $target->end_date = $request->end_date;

            $target->created_by = auth()->id();
            $target->content = $request->content ?? '';
            $target->short_description = $request->short_description ?? '';

            // Image upload
            if ($request->hasFile('image')) {
                $upload = $this->uploadFile($request->image, 'events/event', [], '', 'image');
                if ($upload['status']) {
                    $target->image_id = $upload['upload_id'];
                } else {
                    return $this->responseWithError($upload['message'], [], 400);
                }
            }



            $target->save(); // save data in database table
            DB::commit(); // commit database transaction
            return $this->responseWithSuccess(___('alert.Event created successfully.')); // return success response
        } catch (\Throwable $th) {

            DB::rollBack(); // rollback database transaction
            return $this->responseWithError($th->getMessage(), [], 400); // return error response
        }
    }

    public function show($id)
    {
        return $this->model->find($id);
    }

    public function update($request, $id)
    {

        DB::beginTransaction();
        try {
            $target = $this->model->find($id);
            if (!$target) {
                return $this->responseWithError(___('alert.Slider not found.'), [], 400);
            }

            $target->title = $request->title;
            if ($request->title != $target->title) {
                $target->slug = Str::slug($request->title);
            }

            if ($request->hasFile('image')) {
                $upload = $this->uploadFile($request->image, 'events/event', [], @$target->image_id, 'image');
                if ($upload['status']) {
                    $target->image_id = $upload['upload_id'];
                } else {
                    return $this->responseWithError($upload['message'], [], 400);
                }
            }


            $target->status = $request->status;
            $target->address = $request->address;
            $target->start_date = $request->start_date;
            $target->end_date = $request->end_date;

            $target->created_by = auth()->id();
            $target->content = $request->content ?? '';
            $target->short_description = $request->short_description ?? '';;

            $target->save();
            DB::commit();
            return $this->responseWithSuccess(___('alert.Event updated successfully.'));
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return $this->responseWithError($th->getMessage(), [], 400);
        }
    }

    public function destroy($id)
    {
        try {
            $target = $this->model->find($id);

            $target->delete();

            return $this->responseWithSuccess(___('alert.Event deleted successfully.')); // return success response
        } catch (\Throwable $th) {
            return $this->responseWithError($th->getMessage(), [], 400); // return error response
        }
    }


    public function all()
    {

        try {
            return $this->model->query()->active()->orderBy('id', OrderBy::ASC)->get();
        } catch (\Throwable $th) {

            return false;
        }
    }

    // Use this function in frontend BLog page
    public function getEvents($q)
    {

        $result = $this->model->query()->active()->with('image')->select('id', 'title', 'slug', 'content', 'address', 'image_id', 'start_date');
        if (!empty($q)) {
            $result = $result->where('title', 'like', '%' . $q . '%');
        }
        return $result->latest()->paginate(20);
    }
}
