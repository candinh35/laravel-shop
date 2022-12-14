<?php

namespace App\repositories\background;

use App\repositories\RepositoryInterface;

interface BackgroundRepositoryInterface extends RepositoryInterface
{
    public function getBackground();

    public function store($request);
    public function edit($id, $request);
    public function getBackgroundIndex();
    public function getBackgroundLate();
}
