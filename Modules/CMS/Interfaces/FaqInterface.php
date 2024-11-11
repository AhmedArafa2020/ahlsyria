<?php

namespace Modules\CMS\Interfaces;

interface FaqInterface
{

    public function model();

    public function store($request);

    public function update($request, $id);

    public function destroy($id);

}
