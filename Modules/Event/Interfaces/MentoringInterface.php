<?php

namespace Modules\Event\Interfaces;

use Illuminate\Http\Request;

interface MentoringInterface
{

    public function getAll($request);

    public function all();

    public function tableHeader();

    public function model();

    public function filter($request, $data);



    public function show($id);

    public function getMentorings($q);
}
