<?php

namespace App\Repositories;

interface AdminPrdInterface
{
    public function pagination($model, $orderBy, $page, $item_page);
}
