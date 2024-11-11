<?php

namespace Modules\Event\Repositories;

use App\Enums\OrderBy;
use App\Traits\ApiReturnFormatTrait;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Event\Entities\Mentoring;
use Modules\Event\Interfaces\MentoringInterface;

class MentoringRepository implements MentoringInterface
{
    use ApiReturnFormatTrait, FileUploadTrait;

    private $model;

    public function __construct(Mentoring $mentoringModel)
    {
        $this->model = $mentoringModel;
    }

    public function getAll($request)
    {

        $data = $this->model->query();

        $data = $this->filter($request, $data);

        $data = $data->orderBy('id', 'desc')->paginate($request->show ?? 10);

        return $data;
    }

    public function filter($request, $data)
    {

        if (!empty($request->search)) {
            $search = $request->search;
            $data = $data->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
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
            ___('ui_element.status'),
            ___('ui_element.mentoring_date'),
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



    public function show($id)
    {
        return $this->model->find($id);
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
    public function getMentorings($q)
    {

        $result = $this->model->query()->with('user')->select('id', 'title', 'status', 'content', 'user_id', 'mentoring_date');
        if (!empty($q)) {
            $result = $result->where('title', 'like', '%' . $q . '%');
        }
        return $result->latest()->paginate(20);
    }
}
