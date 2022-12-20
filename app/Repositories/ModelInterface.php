<?php

namespace App\Repositories;

interface ModelInterface
{
    public function pagination($query, $orderBy, $page, $item_page, $pluck);
}
