<?php

namespace Modules\Forum\Interfaces;

interface ForumAnswerInterface{

    public function model();

    public function store($request);

    public function destroy($id);
}
