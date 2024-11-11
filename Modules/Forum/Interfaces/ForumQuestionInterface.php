<?php

namespace Modules\Forum\Interfaces;

interface ForumQuestionInterface{
    public function model();

    public function featured();

    public function index($request);

    public function store($request);

    public function update($request, $id);

    public function destroy($id);

    // Admin
    public function tableHeader();

    public function getQuestions($request);

    public function swipeFeatured($id);

    public function swipeActive($id);

    public function answers($id);
}
