<?php

namespace Modules\Event\Interfaces;

use Illuminate\Http\Request;

interface EventInterface
{

    public function getAll($request);

    public function all();

    public function tableHeader();

    public function model();

    public function filter($request, $data);

    public function store($request);

    public function show($id);

    public function update($request, $id);

    public function destroy($id);

    public function getEvents($q);
}
