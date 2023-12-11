<?php

namespace App\Repositories;

interface ModelInterface
{
    public function pagination($query, $orderBy = [], $page = 1, $items = 16, $pluck = []);
}
