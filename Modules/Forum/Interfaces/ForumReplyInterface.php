<?php

namespace Modules\Forum\Interfaces;

interface ForumReplyInterface{

    public function model();

    public function store($request, $id);

    public function destroy($id);
}
